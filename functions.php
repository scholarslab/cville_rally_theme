<?php

function filter_contribution_description($components) {
    $components['label'] = "Tell us about this deposit.";
    $components['description'] = "Please include as much information as you can. For example: What was happening at this moment? Who is involved? What else do we need to know about this moment in time?";
    return $components;
}

function filter_contribution_title($components) {
    $components['description'] = "For example, “Police in downtown Charlottesville,” “Difficult conversations,” or “What I witnessed from the Rotunda.”";
    return $components;
}

function filter_contribution_text($components) {
    $components['label'] = "Tell Your Story";
    $components['description'] = "Please include as much information as you can. For example: What was happening at this moment? Who is involved? What else do we need to know about this moment in time?";
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

