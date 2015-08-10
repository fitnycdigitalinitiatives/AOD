<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55c8b7772f2446eb" async="async"></script>

<div class="sub-header">
	<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
</div>
<div class="show-container">
	<div id="primary">
		<!-- Returns embedded video and then metadata -->
		<?php echo youTube_embed(); ?>
		<div class="social">
			<ul class='tabs'>
				<li><h2><a href='#share'>Share</a></h2></li>
				<li><h2><a href='#download'>Download</h2></a></h2></li>
				<li><h2><a href='#embed'>Embed</a></h2></li>
			</ul>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div id="share" class="addthis_sharing_toolbox"></div>			
			<?php echo gDrive_link(); ?>
			<div id="embed" class="embed-link">
				<?php echo youTube_embed_code(); ?>
			</div>
		</div>
		<?php echo all_element_texts('item'); ?>
	</div><!-- end primary -->

	<aside id="sidebar">
		<!-- List related items based on 1st tag -->
		<?php echo related_items('item'); ?>
		<!-- If the item belongs to a collection, the following creates a link to that collection. -->
		<?php if (metadata('item', 'Collection Name')): ?>
		<div id="collection" class="element">
			<h2><?php echo __('Channel'); ?></h2>
			<div class="element-text">
				<?php echo link_to_items_browse(metadata('item', 'Collection Name'), array('collection' => metadata(get_collection_for_item(), 'id'))); ?>
			</div>
		</div>
		<?php endif; ?>

		<!-- The following prints a list of all tags associated with the item -->
		<?php if (metadata('item', 'has tags')): ?>
		<div id="item-tags" class="element">
			<h2><?php echo __('Categories'); ?></h2>
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
