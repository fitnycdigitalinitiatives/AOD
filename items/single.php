<div class="item-link">
	
    <?php echo link_to_item('<div class="item-link-thumb">' . YouTube_thumbnail($item) . '<div class="overlay"></div><div class="extent"><i class="fa fa-clock-o"></i> ' . metadata('item', array('Dublin Core', 'Extent')) . '</div></div><div class="description"><h4>' . metadata($item, array('Dublin Core', 'Title')) . '</h4></div>', array('class'=>'permalink'), 'show', $item); ?>
</div>