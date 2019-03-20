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
<!-- Search by Location -->
    <div class="field">
        <div class="label"><?php echo __('Search by Location'); ?></div>
            <div class="inputs">
            <input type="hidden" name="advanced[0][element_id]" value="81">
            <input type="hidden" name="advanced[0][type]" value="is exactly">
            <?php
                    echo $this->formSelect(
                        "advanced[0][terms]",
                        @$_REQUEST['terms'],
                        array(
                            'title' => __("Search Terms"),
                            'id' => null,
                            'class' => 'advanced-search-terms'
                        ),
                        label_table_options(array(
                            'UVA Academical Village' => __('UVA Academical Village'),
                            'UVA Lawn' => __('UVA Lawn'),
                            'UVA Nameless Field' => __('UVA Nameless Field'),
                            'UVA Rotunda' => __('UVA Rotunda'),
                            'UVA Thomas Jefferson Statue' => __('UVA Thomas Jefferson Statue'),
                            'St. Paul’s Memorial Church' => __('St. Paul’s Memorial Church'),
                            'Emancipation Park (Lee Park)' => __('Emancipation Park (Lee Park)'),
                            'Justice Park (Jackson Park)' => __('Justice Park (Jackson Park)'),
                            'McGuffey Park' => __('McGuffey Park'),
                            'McIntire Park' => __('McIntire Park'),
                            'Charlottesville Pedestrian Mall' => __('Charlottesville Pedestrian Mall'),
                            'Paramount Theatre' => __('Paramount Theatre'),
                            'Albemarle-Charlottesville Regional Jail' => __('Albemarle-Charlottesville Regional Jail'),
                            'Martha Jefferson Hospital' => __('Martha Jefferson Hospital'),
                            'University of Virginia Medical Center' => __('University of Virginia Medical Center'),
                            'Other' => __('Other'))
                        )
                    );
            ?>
    </div>

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
