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

<!-- Search by Collection -->
    <div class="field">
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
    </div>

<!-- Search by narrow-by-fields -->
    <div id="search-narrow-by-fields" class="field">
        <div class="two columns alpha label"><label><?php echo __('Narrow by Specific Fields'); ?></label>
        <button type="button" class="add_search"><?php echo __('Add a Field'); ?></button>
        </div>
        <div class="five columns omega inputs">
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field'=>'','type'=>'','value'=>''));
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
                    "advanced[$i][joiner]",
                    @$rows['joiner'],
                    array(
                        'title' => __("Search Joiner"),
                        'id' => null,
                        'class' => 'advanced-search-joiner'
                    ),
                    array(
                        'and' => __('AND'),
                        'or' => __('OR'),
                    )
                );
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => null,
                        'class' => 'advanced-search-element'
                    ),
                    get_table_options('Element', null, array(
                        'record_types' => array('Item', 'All'),
                        'sort' => 'orderBySet')
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
                        'contains' => __('contains'),
                        'does not contain' => __('does not contain'),
                        'is exactly' => __('is exactly'),
                        'is not exactly' => __('is not exactly'),
                        'is empty' => __('is empty'),
                        'is not empty' => __('is not empty'),
                        'starts with' => __('starts with'),
                        'ends with' => __('ends with'),
                        'matches' => __('matches'),
                        'does not match' => __('does not match'),
                    ))
                );
                echo $this->formText(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'size' => '20',
                        'title' => __("Search Terms"),
                        'id' => null,
                        'class' => 'advanced-search-terms'
                    )
                );
                ?>
                <button type="button" class="remove_search red button" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <!--- end narrow-by-fields --->

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

