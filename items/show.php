<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div class="sub-header">
	<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
</div>
<div class="show-container">
	<div id="primary">
		<!-- Returns embedded video and then metadata -->
		<?php echo video_embed(); ?>
		<?php echo all_element_texts('item'); ?>
	</div><!-- end primary -->

	<aside id="sidebar">
		<!-- List related items based on 1st tag -->
		<?php echo related_items('item'); ?>
		<!-- If the item belongs to a collection, the following creates a link to that collection. -->
		<?php if (metadata('item', 'Collection Name')): ?>
		<div id="collection" class="element">
			<h2><?php echo __('Collection'); ?></h2>
			<div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
		</div>
		<?php endif; ?>

		<!-- The following prints a list of all tags associated with the item -->
		<?php if (metadata('item', 'has tags')): ?>
		<div id="item-tags" class="element">
			<h2><?php echo __('Tags'); ?></h2>
			<div class="element-text"><?php echo tag_string('item'); ?></div>
		</div>
		<?php endif;?>

		<!-- The following prints a citation for this item. -->
		<div id="item-citation" class="element">
			<h2><?php echo __('Citation'); ?></h2>
			<div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
		</div>
		
		<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

	</aside>
</div>
<?php echo foot(); ?>
