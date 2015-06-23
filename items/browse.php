<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

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
<div class="grid">
<?php foreach (loop('items') as $item): ?>
<div class="item tile">

	<?php if (metadata('item', 'item_type_name') == "Moving Image"): ?>
        <?php echo link_to_item(YouTube_thumbnail(), array('class'=>'permalink')); ?>
		<h4><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title'))); ?></h4>
    <?php elseif (metadata('item', 'has files')): ?>
        <?php echo link_to_item(item_image('square_thumbnail')); ?>
		<h4><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title'))); ?></h4>
    <?php endif; ?>

    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

</div><!-- end class="item tile" -->
<?php endforeach; ?>
</div>
<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
