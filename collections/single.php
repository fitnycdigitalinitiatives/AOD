<div class="collection record">
    <?php
    $title = metadata($collection, array('Dublin Core', 'Title'));
    $description = metadata($collection, array('Dublin Core', 'Description'));
	$item = get_records('Item', array('collection' => metadata($collection, 'id')), 1);
	$collectionImage = YouTube_thumbnail($item[0])
    ?>
    <h3><?php echo link_to($this->collection, 'show', strip_formatting($title)); ?></h3>
    <?php if ($collectionImage): ?>
        <?php echo link_to($this->collection, 'show', $collectionImage, array('class' => 'image')); ?>
    <?php endif; ?>
    <?php if ($description): ?>
        <p class="collection-description"><?php echo $description; ?></p>
    <?php endif; ?>
</div>
