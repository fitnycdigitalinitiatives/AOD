<?php
$pageTitle = __('Channels');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="sub-header">
	<h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>
	<?php echo pagination_links(); ?>

	<?php
	$sortLinks[__('Title')] = 'Dublin Core,Title';
	$sortLinks[__('Date Added')] = 'added';
	?>
	<div id="sort-links">
		<span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
	</div>
</div>
<?php $number = 0; ?>
<?php foreach (loop('collections') as $collection): ?>
<?php ++$number; ?>
<div class="collection-videos">
<h2><?php echo link_to_items_browse(strip_formatting(metadata('collection', array('Dublin Core', 'Title'))) . '<span> (' . metadata("collection", "total_items") ', view all)</span>', array('collection' => metadata($collection, 'id'))); ?></h2>
<div class="customNavigation prev">
  <a class="btn prev-<?php echo $number; ?>"><i class="fa fa-chevron-left fa-3x"></i></a>
</div>
<?php echo collection_carousel($collection, $number); ?>
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
<?php if (pagination_links()): ?>
	<div class="pre-footer">
		<?php echo pagination_links(); ?>
		<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
	</div>
<?php endif; ?>


<?php echo foot(); ?>
