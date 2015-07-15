</div><!-- end content -->

<footer role="contentinfo">

        <div id="info">
            <p id="copyright">©2015  <a href="/">FIT Archive On Demand</a></br>All rights reserved.</p>
			<p id="address">Seventh Avenue at 27 Street<br>New York City 10001-5992<br>212 217.7999</p>
			<p id="omeka">Proudly powered by <a href="http://omeka.org">Omeka</a></p>
        </div>
		<div id="social-meda">
			<span>Archive on Demand is an initiative of the <a href="http://www.fitnyc.edu/library.asp">FIT Library</a>.</span>
			<ul>
				<li><a href="https://www.facebook.com/FITLibrary"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/FITLibrary"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://pinterest.com/fitlibrary/"><i class="fa fa-pinterest-p"></i></a></li>
				<li><a href="http://instagram.com/fashioninstitutelibrary"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>

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
		items : 7,
		itemsDesktop : [1399,5],
		itemsDesktopSmall : [979,3],
		itemsTablet: [768,2],
		itemsMobile : false
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
