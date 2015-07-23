<div class="item-link">
    <?php echo link_to_item('<div class="thumb">' . YouTube_thumbnail($item) . '<div class="overlay"></div></div><div class="description"><h4>' . metadata($item, array('Dublin Core', 'Title')) . '</h4>
		</div>', array('class'=>'permalink')); ?>
</div>

