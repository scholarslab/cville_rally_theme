<!doctype html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" sizes="32x32" href="//www.library.virginia.edu/images/icon-32.png">
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
  queue_css_file('style');
  echo head_css();
  ?>

  <?php if ($headerBackground = theme_header_background()): ?>
  <?php echo $headerBackground; ?>
  <?php endif; ?>

  <?php
      ($backgroundColor = get_theme_option('background_color')) || ($backgroundColor = "#002f6c");
      ($textColor = get_theme_option('text_color')) || ($textColor = "#FFFFFF");
      ($navbackgroundColor = get_theme_option('navbackground_color')) || ($navbackgroundColor = "#00224d");
      ($navtextColor = get_theme_option('navtext_color')) || ($navtextColor = "#FFFFFF");
      ($htextColor = get_theme_option('htext_color')) || ($htextColor = "#232d4b");
  ?>

  <style>
    #site-title, .topnav {
      background-color: <?php echo $backgroundColor; ?>;
    }
    #site-title a:link, #site-title a:visited,
    #site-title a:active, #site-title a:hover,
    .topnav a:link, .topnav a:visited {
      color: <?php echo $textColor; ?>;
    }
    .navigation, .footer, #admin-bar {
      background: <?php echo $navbackgroundColor; ?>;
    }
    .navigation a:link, .navigation a:visited,
    .navigation a:active, .navigation a:hover {
      color: <?php echo $navtextColor; ?>;
    }
    .admin-login a:link, .admin-login a:visited,
    #bottom-nav a:link, #bottom-nav a:visited {
      color: <?php echo adjustBrightness($navtextColor, -40); ?>;
    }
    .admin-login a:active, .admin-login a:hover,
    #bottom-nav a:active, #bottom-nav a:hover,
    #footer-text {
      color: <?php echo $navtextColor; ?>;
    }
    #main h1, #main h2, #main h3, #main h4,
    .item h2 a:link, .item h2 a:visited,
    .item h2 a:hover, .item h2 a:focus, div.icons a:link {
      color: <?php echo $htextColor; ?>;
    }
    div.icons svg:hover path {
      fill: <?php echo $htextColor; ?>;
    }
    #introduction p {
      background-image: linear-gradient(<?php echo hex2rgba($backgroundColor, 0.6); ?>, <?php echo hex2rgba($backgroundColor, 0.8); ?>);
      color: <?php echo $textColor; ?>;
            <?php if (get_theme_option('header_background')): ?>
            text-shadow: 0px 0px 20px #000;
            <?php endif; ?>
    }
  </style>
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
  <a href="#main" id="skipnav"><?php echo __('Skip to main content'); ?></a>
  <?php echo common('admin-bar'); ?>

  <header role="banner">
    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
    <div class="topnav" role="navigation">
      <?php echo link_to_home_page(option('site_title')); ?>
      <?php if ($logo = cville_theme_logo() && $logoUrl = get_theme_option('logo_url')): ?> 
        <a  href="<?php echo $logoUrl; ?>">
          <?php if($logo = cville_theme_logo()): ?>
            <?php echo $logo; ?>
          <?php endif;?></a>
        <?php else: ?>
          <?php if($logo = cville_theme_logo()): ?>
            <?php echo $logo; ?>
          <?php endif;?>
        <?php endif;?>
    </div> 

    <div id="site-title">
          <h1><a href="<?php echo url('/'); ?>">
              <?php if($tagline = get_theme_option('Tagline Text')): ?>
                <?php echo $tagline; ?>
              <?php endif;?>
          </a></h1>
    </div>

    <nav class="navigation" role="navigation">
        <?php echo public_nav_main(); ?>
    </nav>
  </header>
  
  <div class="wrapper">
  <main class="main-content" id="main" role="main">
    <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>