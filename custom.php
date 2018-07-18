<?php
require_once dirname(__FILE__) . '/functions.php';

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Description'),
    'filter_contribution_description'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Title'),
    'filter_contribution_title'
);

add_filter(
    array('ElementForm', 'Item', 'Item Type Metadata', 'Text'),
    'filter_contribution_text'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Date'),
    'filter_contribution_date'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Spatial Coverage'),
    'filter_contribution_coverage'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Contributor'),
    'filter_contribution_contributor'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Abstract'),
    'filter_contribution_abstract'
);

add_filter(
    array('ElementForm', 'Item', 'Dublin Core', 'Creator'),
    'filter_contribution_creator'
);

add_filter(
    array('Display','Item','Dublin Core', 'Creator'),
    'filter_for_anonymity'
);

add_filter(
    array('Display','Item','Dublin Core', 'Contributor'),
    'filter_for_anonymity'
);

add_filter(
    'item_citation',
    'filter_item_citation'
);
