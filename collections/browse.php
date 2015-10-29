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
<div class="grid">
<?php $number = 0; ?>
<?php foreach (loop('collections') as $collection): ?>
<?php ++$number; ?>
<?php $collectionCount = metadata('collection', 'total_items'); ?>
<div class="collection-tile">
	<div class="collection-thumb">
		<?php $item = get_records('Item', array('collection' => metadata($collection, 'id')), 1); ?>
		<?php echo link_to_items_browse(YouTube_thumbnail($item[0]), array('collection' => metadata($collection, 'id'))); ?>
		<?php echo link_to_items_browse('<div class="overlay"></div>', array('collection' => metadata($collection, 'id'))); ?>
		<?php echo link_to_items_browse('<div class="title"><h2>' . metadata('collection', array('Dublin Core', 'Title')) . '</h2></div>', array('collection' => metadata($collection, 'id'))); ?>
	</div>
</div>
<?php endforeach; ?>
<?php if (pagination_links()): ?>
	<div class="pre-footer">
		<?php echo pagination_links(); ?>
		<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
	</div>
<?php endif; ?>
</div>

<?php echo foot(); ?>