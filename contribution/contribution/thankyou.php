<?php echo head(); ?>
<div id="primary">
	<h1><?php echo __("Thank you!"); ?></h1>
	<p><?php echo __("Your submission was successful! Thank you. Feel free to %s." , contribution_link_to_contribute(__('make another contribution')));  ?>
	</p>
</div>
<?php echo foot(); ?>
