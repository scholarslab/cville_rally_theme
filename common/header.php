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

  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>
<?php
  queue_css_file('style');
  echo head_css();
  echo head_js();
  ?>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => 'home blog logged-in admin-bar no-bg ' . @$bodyclass)); ?>

<div id="wrap" role="document">
     <div class="container top-container">
      <div class="row top-row">
        <nav class="eightcol" id="top-nav">
          <h3 class="visuallyhidden">U.Va. Links</h3>
          <ul>
            <li><?php echo link_to_home_page('Home'); ?></li>
            <li><a href="http://www.virginia.edu">U.Va. Home</a></li>
            <li><a href="http://lib.virginia.edu">U.Va. Library</a></li>
          </ul>
        </nav>
        <div class="sixcol last"></div>
      </div>
    </div>

    <div class="container header-container"><div class="row header-row clearfix">
      <header id="top-banner" class="twelvecol" role="banner">
        <div class="container">
          <h1 class="ninecol" id="main-title">
          <a href="<?php echo url('/'); ?>">
            <span class="donor-title"><?php echo option('site_title'); ?></span>
            <span class="library-title">
              <?php if($tagline = get_theme_option('Tagline Text')): ?>
                <?php echo $tagline; ?>
              <?php endif;?>
            </span>
        </a></h1>
        <a class="threecol last" id="logo" href="http://lib.virginia.edu">
            <img src="<?php echo img('liblogo.png'); ?>" width="198" height="90" alt="Test">
        </a>
      </div>
    </header>
  </div></div><!-- /.row /.container -->
<div class="container content-container">
  <div class="row content-row clearfix">
      <div id="content" class="row">
          <div id="main" class="ninecol" role="main">
            <div class="container">
                <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
