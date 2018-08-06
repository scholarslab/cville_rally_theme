<aside id="sidebar" class="threecol last" role="complementary">
  <?php if (!is_contribution_form()): ?>
  <div class="container">
    <div id="sidebar-area-top">
      <a href="<?php echo url('contribution'); ?>" id="contribution-button">Contribute Materials</a>
        <a href="<?php echo url('items'); ?>" id="browse-items-nav">Browse the Collection</a>
        <div id="recent-items">
    <h2><?php echo __('Recent Items'); ?></h2>
    <?php echo recent_items('3'); ?>
</div><!--end recent-items -->
    </div>

  </div>
    <?php endif; ?>
</aside><!-- /#sidebar -->
