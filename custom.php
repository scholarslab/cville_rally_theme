<?php
require_once dirname(__FILE__) . '/functions.php';

add_filter(array('ElementForm', 'Item', 'Dublin Core', 'Description'), 'filter_contribution_description');

