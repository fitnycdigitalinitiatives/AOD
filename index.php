<?php echo head(array('bodyid'=>'home')); ?>

<!-- Homepage Logo -->
<div class="logo">
	<?php echo '<img src="' . img('AOD_logo.png') . '" alt="FIT Archive On Demand">'; ?>
</div>
<!--end Homepage Logo-->

<!-- Featured Items -->
<div class="featured-videos">
<h2>Featured Videos</h2>
<?php echo carousel(); ?>
</div>
<!--end featured-items-->

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
