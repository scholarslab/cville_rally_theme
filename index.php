<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($headerBackground = theme_header_background() || $homepageText = get_theme_option('Homepage Text')): ?>
<header id="introduction" role="heading">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>
    </header>
    <?php endif; ?>

  <div id="homepage-text" class="flex-container">
    <div class="flex-item">
      <div class="content">
        <h3>Building the Archive</h3>
        <p>Recognizing the significance of events on the weekend of August 12, the University of Virginia Library is building an archive of materials surrounding the “Unite the Right” rally and counter-protests.</p>
        <br />
        <footer><a href="<?php echo url('/about'); ?>">About the Project</a></footer>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h3>Donate your Materials</h3>
        <p>We are interested in your personal digital submissions (including images, stories, audio, or video) from the events at UVA and in the Charlottesville area, so that we may make these materials available to students and researchers studying these events. You have the option to keep your name private if you wish.</p>
        <p>Read the <a href="http://digitalcollecting.lib.virginia.edu/rally/contribution/terms">terms and conditions</a> for submissions. </p>
        <br />
        <footer><a href="<?php echo url('/contribution'); ?>">Contribute Materials</a></footer>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h3>Statement of Values</h3>
        <p>The University of Virginia stands firmly behind the <a href="https://www2.archivists.org/advocacy/diversity-and-inclusion-initiatives">Society of American Archivists’ commitment to ensuring the diversity of archivists</a> and the archival record. Read the <a href="https://www2.archivists.org/statements/saa-council-statement-on-white-supremacists%E2%80%99-actions-in-charlottesville-virginia">SAA Council statement about events of 8/12.</a></p>
      </div>
    </div>
    <div class="flex-item">
      <div class="content">
        <h3>Questions?</h3>
        <p>Contact us at <a href="mailto:digital_collecting@virginia.edu">digital_collecting@virginia.edu</a>. </p>
      </div>
      </div>
  </div>

<article class="aside">
    <?php echo common('aside'); ?>
</article>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
