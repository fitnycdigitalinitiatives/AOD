<?php
$pageTitle = __('Search Items');
echo head(array('title' => $pageTitle,
           'bodyclass' => 'items advanced-search'));
?>
<div class="sub-header">
	<h1><?php echo $pageTitle; ?></h1>
</div>
<div class="advanced-search-container">
	<?php echo $this->partial('items/search-form.php',
		array('formAttributes' =>
			array('id'=>'advanced-search-form'))); ?>
</div>
<?php echo foot(); ?>
