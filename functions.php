<?php

function filter_contribution_description($components) {
    $components['label'] = "Tell us about this deposit.";
    $components['description'] = "Lorem ipsum dolor sit amet.";
    return $components;
}
