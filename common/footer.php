</main>
</div>

<footer class="footer" role="contentinfo">
    <nav class="navigation" id="bottom-nav">
        <?php 
        echo link_to_home_page('Digital Collecting');
        echo public_nav_main(); ?>
    </nav>

    <div id="footer-text">
        <?php echo get_theme_option('Footer Text'); ?>
    </div>

    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>


</body>
</html>
