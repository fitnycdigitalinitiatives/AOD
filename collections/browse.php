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
<?php $collectionCount = metadata('collection', 'total_items'); ?>
<div class="collection-videos">
<h2><?php echo link_to_items_browse(strip_formatting(metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata($collection, 'id'))); ?></h2>
<?php $item = get_records('Item', array('collection' => metadata($collection, 'id')), 1); ?>
<?php echo YouTube_thumbnail($item[0]); ?>
</div>
<?php endforeach; ?>
<?php if (pagination_links()): ?>
	<div class="pre-footer">
		<?php echo pagination_links(); ?>
		<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
	</div>
<?php endif; ?>


<?php echo foot(); ?>
