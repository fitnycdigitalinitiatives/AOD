<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>
<?php echo pagination_links(); ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php foreach (loop('collections') as $collection): ?>

<div class="featured-videos">
<h2><?php echo link_to_items_browse(strip_formatting(metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata($collection, 'id'))); ?></h2>
<div class="customNavigation prev">
  <a class="btn prev"><i class="fa fa-chevron-left fa-3x"></i></a>
</div>
<?php echo collection_carousel($collection); ?>
<div class="customNavigation next">
  <a class="btn next"><i class="fa fa-chevron-right fa-3x"></i></a>
</div>
</div>

<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
