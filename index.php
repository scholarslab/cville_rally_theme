<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($headerBackground = theme_header_background() || $introText = get_theme_option('intro_text')): ?>
<header id="introduction" role="heading">
    <?php if ($introText = get_theme_option('intro_text')): ?>
    <p><?php echo $introText; ?></p>
    <?php endif; ?>
    </header>
    <?php endif; ?>

  <div id="homepage-text" class="flex-container">
    <div class="flex-item">
      <div class="content">
        <h2>Building the Archive</h2>
        <p>Recognizing the significance of events on the weekend of August 12, the University of Virginia Library is building an archive of materials surrounding the “Unite the Right” rally and counter-protests.</p>
        <br />
        <footer><a href="<?php echo url('/about'); ?>">About the Project</a></footer>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h2>Donate your Materials</h2>
        <p>We are interested in your personal digital submissions (including images, stories, audio, or video) from the events at UVA and in the Charlottesville area, so that we may make these materials available to students and researchers studying these events. You have the option to keep your name private if you wish.</p>
        <p>Read the <a href="http://digitalcollecting.lib.virginia.edu/rally/contribution/terms">terms and conditions</a> for submissions. </p>
        <br />
        <footer><a href="<?php echo url('/contribution'); ?>">Contribute Materials</a></footer>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h2>Statement of Values</h2>
        <p>The University of Virginia stands firmly behind the <a href="https://www2.archivists.org/advocacy/diversity-and-inclusion-initiatives">Society of American Archivists’ commitment to ensuring the diversity of archivists</a> and the archival record. Read the <a href="https://www2.archivists.org/statements/saa-council-statement-on-white-supremacists%E2%80%99-actions-in-charlottesville-virginia">SAA Council statement about events of 8/12.</a></p>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h2>Questions?</h2>
        <p>Contact us at <a href="mailto:digital_collecting@virginia.edu">digital_collecting@virginia.edu</a>. </p>
      </div>
      </div>
  </div>

<article class="aside">
    <?php echo common('aside'); ?>
</article>

<!-- Featured Item -->
<?php if (get_theme_option('Display Featured Item') == 1): ?>
    <article class="aside">
    <div class="side-bar">
    <h2><?php echo __('Featured Items'); ?></h2>
    <div class="items browse">
    <div id="featured-item" class="items">
        <?php echo random_featured_items(3); ?>
    </div>
    </div>
    </article>
<?php endif; ?>
<!--end featured-item-->	

<!-- Featured Collection -->
<?php if (get_theme_option('Display Featured Collection')): ?>
    <article class="aside">
    <div class="side-bar">
    <div id="featured-collection">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div>
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



<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
