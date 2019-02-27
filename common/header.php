<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
  <meta charset="utf-8">
  <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?>
  </title>
  <meta name="viewport" content="width=device-width">
  <?php if ($description = option('description')): ?>
  <meta name="description" content="<?php echo $description; ?>">
  <?php endif; ?>

  <?php echo auto_discovery_link_tags(); ?>

<!-- Plugin Stuff -->
  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

<!-- Stylesheets -->
  <?php
  queue_css_url('//fonts.googleapis.com/css?family=Libre-Franklin:400,500,700,400italic,700italic');
  queue_css_file('style');
  echo head_css();
  ?>

<!-- Javascripts -->
  <?php
  echo head_js();
  ?>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.lib.virginia.edu/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 33]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.lib.virginia.edu/piwik.php?idsite=33" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => 'home blog logged-in admin-bar no-bg ' . @$bodyclass)); ?>

  <header role="banner">
    <div class="topnav" role="navigation">
      <?php echo link_to_home_page('Digital Collecting'); ?>
      <a style="float:right" href="https://www.library.virginia.edu/">
        <img alt="UVa Library" src="<?php echo img('library-long-white.svg'); ?>" width="250" class="lib-long">
        <img alt="UVa Library" src="<?php echo img('liblogo.png'); ?>" width="80" class="lib-short">
      </a>
    </div> 
    <div id="site-title">
          <a href="<?php echo url('/'); ?>">
            <!-- <span class="library-title"><?php echo option('site_title'); ?></span> -->
              <?php if($tagline = get_theme_option('Tagline Text')): ?>
                <?php echo $tagline; ?>
              <?php endif;?>
            </span>
          </a>
    </div>
    <nav class="navigation" role="navigation">
        <?php echo public_nav_main(); ?>
    </nav>
  </header>
  
  <div class="wrapper">
  <main class="main-content" id="main" role="main">
    <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>