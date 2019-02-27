<?php

function filter_contribution_description($components) {
    $components['label'] = "Description";
    $components['description'] = "Please include as much information as you can. For example: What was happening at this moment? Who is involved? What else do we need to know about this moment in time?";
    return $components;
}

function filter_contribution_title($components) {
    $components['description'] = "For example, “Police in downtown Charlottesville” or “What I witnessed from the Rotunda.”";
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
    $contributedItem = get_db()->getTable('ContributionContributedItem')->findByItem($record);
    
    if ($contributedItem->anonymous != 0) {
        $text = 'Anonymous';
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
    $contribItem = get_db()->getTable('ContributionContributedItem')->findByItem($item);
    if ($contribItem->anonymous) {
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