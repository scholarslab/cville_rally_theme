
    
<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;
echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>

<div id="primary">
    <!-- <?php if (!$is_home_page): ?>
    <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p> -->
    <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
    <!-- <?php endif; ?> -->

  <div class="flex-container">
    <div class="main-content">
      <?php
      $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
      echo $this->shortcodes($text);
      ?>
    </div>
    
    <div class="side-bar">
    <?php echo common('aside'); ?>
    </div>

</div>

<?php echo foot(); ?>