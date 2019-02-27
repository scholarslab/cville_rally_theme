<?php 
$head = array('title' => __('Contribution Terms of Service'));
echo head($head);
?>

<div id="primary">
<h1><?php echo $head['title']; ?></h1>

<div class="flex-container">
    <div class="main-content">
      <!-- <div class="content"> -->
<?php echo get_option('contribution_consent_text'); ?>
<!-- </div> -->
    </div>
    <div class="side-bar">
        <div class="content">
        <h3>Summary of Terms</h3>
        <ul>
            <li>You must be at least 18 years old.</li>
            <li>Submitted material must be owned and/or created by you.</li>
            <li>All submissions will be available to Library-approved researchers and can be used for teaching and research purposes.</li>
            <li>Under conditions of a lawful subpoena or court order, we may be required to turn over any submissions and related information (email address, descriptive information, etc.).</li>
        </ul>
        </div>
    </div>
</div>

</div>


<?php echo foot(); ?>

