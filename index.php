<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($headerBackground = theme_header_background() || $introText = get_theme_option('intro_text')): ?>
<header id="introduction" role="heading">
    <?php if ($introText = get_theme_option('intro_text')): ?>
    <p><?php echo $introText; ?></p>
    <?php endif; ?>
    </header>
    <?php endif; ?>

  <div id="homepage-text" class="flex-container">
<!-- Content Box: Archive -->
  <?php if ($archiveText = get_theme_option('archive_text')): ?>
    <div class="flex-item">
      <div class="content">
        <h2>Building the Archive</h2>
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
        <h2>Donate your Materials</h2>
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
        <h2>Statement of Values</h2>
        <?php echo $valuesText; ?>
      </div>
    </div>
    <?php endif; ?>
<!-- end Content Box: Values -->

<!-- Content Box: Questions? -->
  <?php if ($contactText = get_theme_option('contact_text')): ?>
    <div class="flex-item">
      <div class="content">
        <h2>Questions?</h2>
        <?php echo $contactText; ?>
      </div>
    </div>
  <?php endif; ?>
<!-- end Content Box: Questions? -->
</div>

<article class="aside">
    <?php echo common('aside'); ?>
</article>

<!-- Featured Items -->
<?php if (get_theme_option('Display Featured Item') == 1): ?>
    <article class="aside">
    <div class="side-bar">
    <h2><?php echo __('Featured Items'); ?></h2>
    <div class="items browse">
    <div id="featured-item" class="items">
        <?php echo random_featured_items(3); ?>
    </div>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    </article>
<?php endif; ?>
<!--end featured-items-->	

<!-- Featured Collection -->
<?php if (get_theme_option('Display Featured Collection')): ?>
    <article class="aside">
    <div class="side-bar">
    <div id="featured-collection">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div>
    <p class="view-collections-link"><a href="<?php echo html_escape(url('collections')); ?>"><?php echo __('View All Collections'); ?></a></p>
    </div>
    </article>
    <?php endif; ?>	
<!-- end featured collection -->

<!-- Featured Exhibit -->
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <article class="aside">
    <div class="side-bar">
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    </div>
    </article>
    <?php endif; ?>
<!-- end featured Exhibit -->

<!-- Recent Items -->
<?php if (get_theme_option('Homepage Recent Items') == 1): ?>

    <article class="aside">
    <div class="side-bar">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <div class="items browse">
    <div id="featured-item" class="items">
    <?php echo recent_items(3); ?>
    </div>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    </article>
<?php endif; ?>
<!-- end Recent items -->




<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
