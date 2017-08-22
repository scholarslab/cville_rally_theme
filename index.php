<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <?php echo $homepageText; ?>
    <?php endif; ?>
</div>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>
<?php echo foot(); ?>
