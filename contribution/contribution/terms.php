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
    <div class="side-bar">
        <h4>Summary of Terms</h4>
        <ul>
            <li>You must be at least 18 years old.</li>
            <li>Submitted material must be owned and/or created by you.</li>
            <li>You have the option of making your contribution public or private. If public, your content may be published as part of the Library’s digital collections (with or without your name displayed, depending on what you have indicated).</li>
            <li>All submissions will be available to Library-approved researchers and can be used by the Library from now on in support of its teaching and research mission.</li>
            <li>Your submission must not violate any laws. If we receive a lawful subpoena or court order, we may be required to turn over any submissions and related information (email address, descriptive information, etc.).</li>
        </ul>
    </div>
</div>

</div>


<?php echo foot(); ?>

