<?php echo head(array('bodyid'=>'home')); ?>

<!-- Homepage Logo -->
<div class="logo">
	<?php echo '<img src="' . img('aod_welcome.png') . '" alt="FIT Archive On Demand">'; ?>
</div>
<!--end Homepage Logo-->

<!-- Featured Items -->
<div class="featured-videos">
<h2>Featured Videos</h2>
<div class="customNavigation prev">
  <a class="btn prev"><i class="fa fa-chevron-left fa-3x"></i></a>
</div>
<?php echo carousel(); ?>
<div class="customNavigation next">
  <a class="btn next"><i class="fa fa-chevron-right fa-3x"></i></a>
</div>
</div>
<!--end featured-items-->

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
