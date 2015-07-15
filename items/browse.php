<?php
$pageTitle = __('Browse Videos');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>
<div class="sub-header">
	<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

	<?php echo item_search_filters(); ?>

	<?php echo pagination_links(); ?>

	<?php if ($total_results > 0): ?>

		<?php
		$sortLinks[__('Title')] = 'Dublin Core,Title';
		$sortLinks[__('Creator')] = 'Dublin Core,Creator';
		$sortLinks[__('Date Added')] = 'added';
		?>
		<div id="sort-links">
			<span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
		</div>

	<?php endif; ?>
</div>
<?php if ($total_results > 0): ?>
	<div class="grid">
		<?php foreach (loop('items') as $item): ?>
		<div class="item tile">

			<?php if (metadata('item', 'item_type_name') == "Moving Image"): ?>
				<div class="item-thumb">
				<?php echo link_to_item(YouTube_thumbnail(), array('class'=>'permalink')); ?>
				<?php echo link_to_item('<div class="overlay"></div>'); ?>
				<?php echo link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div>'); ?>
				</div>
			<?php elseif (metadata('item', 'has files')): ?>
				<div class="item-thumb">
				<?php echo link_to_item(item_image('square_thumbnail')); ?>
				<?php echo link_to_item('<div class="overlay"></div>'); ?>
				<?php echo link_to_item('<div class="title"><p>' . metadata('item', array('Dublin Core', 'Title')) . '</p></div>'); ?>
				</div>
			<?php endif; ?>

			<?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

		</div><!-- end class="item tile" -->
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div id="null-results">
	<p>Your search returned no results. Please try another keyword. Or try our <a href="/items/search">Advanced Search</a>.</p>
	</div>
<?php endif; ?>
<?php if ($total_results > 0): ?>
	<div class="pre-footer">
		<?php echo pagination_links(); ?>

		<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
	</div>
<?php endif; ?>
<?php echo foot(); ?>
