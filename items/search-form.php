<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller'=>'items',
                                          'action'=>'browse'));
endif;
$formAttributes['method'] = 'GET';
?>

<form <?php echo tag_attributes($formAttributes); ?>>
<!-- Search by keyword -->
    <div id="search-keywords" class="field">
        <?php echo $this->formLabel('keyword-search', __('Search for Keywords')); ?>
        <div class="inputs">
        <?php
            echo $this->formText(
                'search',
                @$_REQUEST['search'],
                array('id' => 'keyword-search', 'size' => '40')
            );
        ?>
        </div>
    </div>
<!-- Search by type -->
    <div class="field">
        <?php echo $this->formLabel('item-type-search', __('Search By Type')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'type',
                @$_REQUEST['type'],
                array('id' => 'item-type-search'),
                label_table_options(array(
                    '6' => __('Photo'),
                    '3' => __('Video'),
                    '1' => __('Story'),
                    '11' => __('Link')
                ))
            );
        ?>
        </div>
    </div>

    <!-- <div class="field">
    <?php echo $this->formLabel('spatial-coverage', __('Search by Location')); ?>
        <div class="inputs">
        <?php 
            echo $this->formSelect('spatial-coverage',
                @$_GET['spatial-coverage'],
                array('id' => 'spatial-coverage-search'),
                label_table_options(array(
                    '139' => __('UVA Academical Village'),
                    '311' => __('UVA Lawn'),
                    '61' => __('UVA Nameless Field'),
                    '363' => __('UVA Rotunda'),
                    '12' => __('UVA Thomas Jefferson Statue'),
                    '48' => __('St. Paul’s Memorial Church'),
                    '248' => __('Emancipation Park (Lee Park)'),
                    '173' => __('Justice Park (Jackson Park)'),
                    '469' => __('McGuffey Park'),
                    '316' => __('McIntire Park'),
                    '131' => __('Charlottesville Pedestrian Mall'),
                    '416' => __('Paramount Theatre'),
                    // '13' => __('Albemarle-Charlottesville Regional Jail'),
                    // '14' => __('Martha Jefferson Hospital'),
                    // '15' => __('University of Virginia Medical Center'),
                    '149' => __('Other')
                ))
            ); ?>
        </div>
    </div> -->
    
    <!-- <div id="search-narrow-by-fields" class="field">
        <div class="label"><?php echo __('Search by Location'); ?></div>
        <div class="inputs">
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field' => '', 'type' => '', 'value' => ''));
        }
        //Here is where we actually build the search form
        foreach ($search as $i => $rows): ?>
            <div class="search-entry">
                <?php
                //The POST looks like =>
                // advanced[0] =>
                //[field] = 'description'
                //[type] = 'contains'
                //[terms] = 'foobar'
                //etc
    
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => null,
                        'class' => 'advanced-search-element'
                    ),
                    label_table_options(array(
                        '81' => __('Location'))
                    )
                );
                echo $this->formSelect(
                    "advanced[$i][type]",
                    @$rows['type'],
                    array(
                        'title' => __("Search Type"),
                        'id' => null,
                        'class' => 'advanced-search-type'
                    ),
                    label_table_options(array(
                        'is exactly' => __('is exactly')
                    ))
                );
                echo $this->formSelect(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'title' => __("Search Terms"),
                        'id' => null,
                        'class' => 'advanced-search-terms'
                    ),
                    label_table_options(array(
                        '139' => __('UVA Academical Village'),
                        '311' => __('UVA Lawn'),
                        '61' => __('UVA Nameless Field'),
                        '363' => __('UVA Rotunda'),
                        '12' => __('UVA Thomas Jefferson Statue'),
                        '48' => __('St. Paul’s Memorial Church'),
                        '248' => __('Emancipation Park (Lee Park)'),
                        '173' => __('Justice Park (Jackson Park)'),
                        '469' => __('McGuffey Park'),
                        '316' => __('McIntire Park'),
                        '131' => __('Charlottesville Pedestrian Mall'),
                        '416' => __('Paramount Theatre'),
                        // '13' => __('Albemarle-Charlottesville Regional Jail'),
                        // '14' => __('Martha Jefferson Hospital'),
                        // '15' => __('University of Virginia Medical Center'),
                        '149' => __('Other'))
                    )
                );
                ?>
            </div>
        <?php endforeach; ?>
        </div>
         -->

    <!-- <div class="field">
        <?php echo $this->formLabel('collection-search', __('Search By Collection')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'collection',
                @$_REQUEST['collection'],
                array('id' => 'collection-search'),
                get_table_options('Collection')
            );
        ?>
        </div>
    </div> -->

    <?php fire_plugin_hook('public_items_search', array('view' => $this)); ?>
    <div>
        <?php if (!isset($buttonText)) $buttonText = __('Search for items'); ?>
        <input type="submit" class="submit" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText ?>">
    </div>
</form>

<?php echo js_tag('items-search'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();
    });
</script>
