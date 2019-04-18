<?php 
$head = array('title' => __('Contribution Terms of Service'));
echo head($head);
?>

<div id="primary">
<h1><?php echo $head['title']; ?></h1>

<div class="flex-container">
    <div class="main-content">

<?php echo get_option('contribution_consent_text'); ?>

    </div>

    <?php if ($termsSummary = get_theme_option('terms_summary')): ?>
    <div class="side-bar">
        <h4>Summary of Terms*</h4>
        <?php echo $termsSummary; ?>
        <p style="font-size:0.9rem;margin:0.67em">*This summary is to help you read and understand the terms, but does not replace them. Your submission is governed by the full terms of use.</p>
    </div>
    <?php endif; ?>

</div>

</div>


<?php echo foot(); ?>

