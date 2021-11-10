<?php

function filter_contribution_description($components) {
    $components['label'] = "Description";
    $components['description'] = "Please include as much information as you can. For example: What was happening at this moment? Who is involved? What else do we need to know about this moment in time?";
    return $components;
}

function filter_contribution_title($components) {
    $components['description'] = "Provide a short title for your contributed item";
    return $components;
}

function filter_contribution_text($components) {
    $components['label'] = "Tell Your Story";
    $components['description'] = "";
    return $components;
}

function filter_contribution_date($components) {
    $components['description'] = "When did this occur?";
    return $components;
}

function filter_contribution_coverage($components) {
    $components['description'] = "Where did this occur?";
    return $components;
}

function filter_contribution_contributor($components) {
    $components['description'] = '';
    return $components;
}

function filter_contribution_abstract($components) {
    $components['label'] = "What else do we need to know about this? ";
    $components['description'] = "";
    return $components;
}

function filter_contribution_creator($components) {
    $components['label'] = "Your name (Required)";
    $components['description'] = "";
    return $components;
}

/**
 * Checks if current view is the Contribution Form.
 */
function is_contribution_form() {
    $request = Zend_Controller_Front::getInstance()->getRequest();
    $module = $request->getModuleName();
    $action = $request->getActionName();

    if ($module == 'contribution' && $action == 'contribute') {
        return true;
    }

    return false;

}

function filter_for_anonymity($text, $args) {
    $record = $args['record'];
    if (plugin_is_active('Contribution')) {
        $contributedItem = get_db()->getTable('ContributionContributedItem')->findByItem($record);
        if ($contributedItem->anonymous != 0) {
            $text = 'Anonymous';
        }
    }

    return $text;

}

/**
 * Replicates Omeka's default item_citation output, but checks
 * if the item was submitted under the condition of anonymity.
 * If so, the creator name is replaced with 'Anonymous'. If not,
 * the DC:Creator name is used instead of the submitter's
 * username.
 */
function filter_item_citation($citation, $args) {
    $citation = '';
    $item = $args['item'];
    $isAnonymous = false;
    if (plugin_is_active('Contribution')) {
        $contribItem = get_db()->getTable('ContributionContributedItem')->findByItem($item);
        $isAnonymous = $contribItem->anonymous;
    }

    if ($isAnonymous) {
        $creator = 'Anonymous';
    } else {
        $creators = metadata($item, array('Dublin Core', 'Creator'), array('all' => true));
        // Strip formatting and remove empty creator elements.
        $creators = array_filter(array_map('strip_formatting', $creators));
        if ($creators) {
            switch (count($creators)) {
                case 1:
                    $creator = $creators[0];
                    break;
                case 2:
                    /// Chicago-style item citation: two authors
                    $creator = __('%1$s and %2$s', $creators[0], $creators[1]);
                    break;
                case 3:
                    /// Chicago-style item citation: three authors
                    $creator = __('%1$s, %2$s, and %3$s', $creators[0], $creators[1], $creators[2]);
                    break;
                default:
                    /// Chicago-style item citation: more than three authors
                    $creator = __('%s et al.', $creators[0]);
            }
        }
    }
    $citation .= "$creator, ";

    if ($title = metadata($item, 'display_title')) {
        $citation .= "&#8220;$title,&#8221; ";
    }
    if ($siteTitle = option('site_title')) {
        $citation .= "<em>$siteTitle</em>, ";
    }
    $accessed = format_date(time(), Zend_Date::DATE_LONG);
    $url = '<span class="citation-url">'.html_escape(record_url($item, null, true)).'</span>';
    /// Chicago-style item citation: access date and URL
    $citation .= __('accessed %1$s, %2$s.', $accessed, $url);

    return $citation;
}

// adjust brightness
// Adapted from a solution by Torkil Johnsen.

// @param string $color
// @param int $steps
// @link http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php


function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

/**
 * Get the theme's logo image tag.
 *
 * @package Omeka\Function\View\Head
 * @uses get_theme_option()
 * @return string|null
 */
function cville_theme_logo()
{
    $logo = get_theme_option('Logo');
    if ($logo) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($logo, 'theme_uploads'));
        return '<img src="' . $uri . '" alt="' . get_theme_option('logo_alt') . '" class="logo" />';
    }

}

/**
 * Get the theme's shortcut icon tag.
 *
 * @package Omeka\Function\View\Head
 * @uses get_theme_option()
 * @return string|null
 */
function cville_theme_icon()
{
    $icon = get_theme_option('shortcut_icon');
    if ($icon) {
        $storage = Zend_Registry::get('storage');
        $uri = $storage->getUri($storage->getPathByType($icon, 'theme_uploads'));
        return '<link rel="shortcut icon" sizes="32x32" href="' . $uri . '" />';
    }

}