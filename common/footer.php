</div><!-- end content -->

<footer role="contentinfo">

        <div id="custom-footer-text">
            <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
            <p><?php echo $footerText; ?></p>
            <?php endif; ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
        </div>

        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>

    <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

</footer>

</div><!--end wrap-->

<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
    Omeka.skipNav();
    Omeka.megaMenu("#top-nav");
    Seasons.mobileSelectNav();
});
</script>
<script>
jQuery(document).ready(function($) {
	var owl = $("#featured-carousel");
	owl.owlCarousel({
		pagination : true,
		items : 8, //8 items above 1000px browser width
		itemsDesktop : [1600,6], //5 items between 1000px and 901px
		itemsDesktopSmall : [979,3], // betweem 900px and 601px
		itemsTablet: [768,2], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
	// Custom Navigation Events
	$(".next").click(function(){
		owl.trigger('owl.next');
	})
	$(".prev").click(function(){
		owl.trigger('owl.prev');
	})
});
</script>

</body>

</html>
