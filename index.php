<?php echo head(array('bodyid'=>'home')); ?>

<div id="homepage-text" class="flex-container">
<!-- Content Box: Archive -->
  <?php if ($archiveText = get_theme_option('archive_text')): ?>
    <div class="flex-item">
      <div class="content">
    <?php echo $archiveText; ?>
        <br />
        <footer><a href="<?php echo url('/about'); ?>">About the Project</a></footer>
      </div>
    </div>
    <?php endif; ?>
<!-- end Content Box: Archive -->

<!-- Content Box: Donate -->
<?php if ($donateText = get_theme_option('donate_text')): ?>
    <div class="flex-item">
      <div class="content">
        <?php echo $donateText; ?>
        <br />
        <footer><a href="<?php echo url('/contribution'); ?>">Contribute Materials</a></footer>
      </div>
    </div>
    <?php endif; ?>
<!-- end Content Box: Donate -->

<!-- Content Box: Values -->
    <?php if ($valuesText = get_theme_option('values_text')): ?>
    <div class="flex-item">
      <div class="content">
        <?php echo $valuesText; ?>
      </div>
    </div>
    <?php endif; ?>
<!-- end Content Box: Values -->

<!-- Content Box: Questions? -->
  <?php if ($contactText = get_theme_option('contact_text')): ?>
    <div class="flex-item">
      <div class="content">
        <?php echo $contactText; ?>
      </div>
    </div>
  <?php endif; ?>
<!-- end Content Box: Questions? -->

<!-- Browse Collection by Type -->
<?php if (get_theme_option('Display Browse Types') == 1): ?>
<div class="aside">
    <div class="content">
      <?php echo common('browse-types'); ?>
      </div>
</div>
<?php endif; ?>
<!-- end Browse Collection by Type -->

<!-- Featured Items -->
<?php if (get_theme_option('Display Featured Item') == 1): ?>
<div class="aside">
    <div class="content">
    <h2><?php echo __('Featured Items'); ?></h2>
    <div class="items browse">
    <div id="featured-item" class="items">
        <?php echo random_featured_items(3); ?>
    </div>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    </div>
</div>
<?php endif; ?>
<!--end featured-items-->	

<!-- Featured Collection -->
<?php if (get_theme_option('Display Featured Collection')): ?>
<div class="flex-item">
      <div class="content">
    <div id="featured-collection">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div>
    <p class="view-collections-link"><a href="<?php echo html_escape(url('collections')); ?>"><?php echo __('View All Collections'); ?></a></p>
    </div>
    </div>
    <?php endif; ?>	
<!-- end featured collection -->

<!-- Featured Exhibit -->
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <div class="flex-item">
      <div class="content">
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    </div>
    </div>
    <?php endif; ?>
<!-- end featured Exhibit -->

<!-- Recent Items -->
<?php if (get_theme_option('Homepage Recent Items') == 1): ?>
<div class="flex-item">
      <div class="content">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <div class="items browse">
    <div id="featured-item" class="items">
    <?php echo recent_items(3); ?>
    </div>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    </div>
    <?php endif; ?>
<!-- end Recent items -->

</div>
<!-- end flex-container -->

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
