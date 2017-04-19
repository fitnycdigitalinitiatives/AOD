<div class="collection-link">
    <?php
    $title = metadata($collection, array('Dublin Core', 'Title'));
    $description = metadata($collection, array('Dublin Core', 'Description'));
	$item = get_records('Item', array('collection' => metadata($collection, 'id')), 1);
	$collectionImage = video_thumbnail($item[0])
    ?>
	<div class="collection-link-thumb">
		<?php echo link_to_items_browse($collectionImage, array('collection' => metadata($collection, 'id'))); ?>
	</div>
	<div class="description">
		<h4><?php echo link_to_items_browse($title, array('collection' => metadata($collection, 'id'))); ?></h4>
		<p><?php echo $description; ?></p>
	</div>
</div>
