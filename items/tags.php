<?php
$pageTitle = __('Categories');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>
<div class="sub-header">
	<h1><?php echo $pageTitle; ?></h1>
</div>

<div class="grid">
<?php foreach ($tags as $tag): ?>
<div class="collection-tile">
	<div class="collection-thumb">
		<?php $item = get_records('Item', array('tags' => $tag['name']), 1); ?>
		<?php echo link_to_items_browse(YouTube_thumbnail($item[0]), array('tags' => $tag['name'])); ?>
		<?php echo link_to_items_browse('<div class="overlay"></div>', array('tags' => $tag['name'])); ?>
		<?php echo link_to_items_browse('<div class="title"><h2>' . $tag['name'] . '</h2></div>', array('tags' => $tag['name'])); ?>
	</div>
</div>
<?php endforeach; ?>
</div>

<?php echo foot(); ?>
