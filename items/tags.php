<?php
$pageTitle = __('Categories');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>
<div class="sub-header">
	<h1><?php echo $pageTitle; ?></h1>
</div>

<?php $number = 0; ?>
<?php foreach ($tags as $tag): ?>
<?php ++$number; ?>
<div class="collection-videos">
<h2><?php echo link_to_items_browse($tag['name'] . '<span> (view all)</span>', array('tags' => $tag['name'])); ?></h2>
<div class="customNavigation prev">
  <a class="btn prev-<?php echo $number; ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
</div>
<?php echo collection_carousel($tag, $number); ?>
<div class="customNavigation next">
  <a class="btn next-<?php echo $number; ?>"><i class="fa fa-chevron-right fa-3x"></i></a>
</div>
</div>
<?php echo '<script>
jQuery(document).ready(function($) {
	var owl = $("#collection-carousel-' . $number . '");
	owl.owlCarousel({
		pagination : true,
		items : 7,
		itemsDesktop : [1399,5],
		itemsDesktopSmall : [979,3],
		itemsTablet: [768,2],
		itemsMobile : false
	});
	// Custom Navigation Events
	$(".next-' . $number . '").click(function(){
		owl.trigger("owl.next");
	})
	$(".prev-' . $number . '").click(function(){
		owl.trigger("owl.prev");
	})
});
</script>' ; ?>

<?php endforeach; ?>

<?php echo foot(); ?>
