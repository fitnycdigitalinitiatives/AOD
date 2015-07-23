<?php echo head(array('bodyid'=>'home')); ?>

<!-- Homepage Logo -->
<div class="logo">
	<?php echo '<img src="' . img('AOD_logo.png') . '" alt="FIT Archive On Demand">'; ?>
</div>
<!--end Homepage Logo-->

<!-- Featured Items -->
<div class="featured-videos">
<h2><?php echo link_to_items_browse('Featured Videos <span>(see all)</span>', array('featured' => 1)); ?></h2>
<div class="customNavigation prev">
  <a class="btn prev"><i class="fa fa-chevron-left fa-3x"></i></a>
</div>
<?php echo carousel(); ?>
<div class="customNavigation next">
  <a class="btn next"><i class="fa fa-chevron-right fa-3x"></i></a>
</div>
</div>
<?php echo '<script>
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
		owl.trigger("owl.next");
	})
	$(".prev").click(function(){
		owl.trigger("owl.prev");
	})
});
</script>' ; ?>
<!--end featured-items-->

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
