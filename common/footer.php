</div><!-- end content -->

<footer role="contentinfo">

        <div id="info">
			<a href="http://www.fitnyc.edu/"><img src="<?php echo img('FITSUNY1_white.png'); ?>" alt="Fashion Institute of Technology - State University of New York"></a>
            <p id="copyright">©2016 Fashion Institute of Technology</br>All rights reserved.</p>
        </div>
		<div id="social-media">
			<p>Archive on Demand is an initiative of the FIT Library</p>
			<ul>
				<li><a href="http://www.fitnyc.edu/library/"><i class="fa fa-home fa-3x"></i></a></li>
				<li><a href="https://www.facebook.com/FITLibrary"><i class="fa fa-facebook fa-3x"></i></a></li>
				<li><a href="https://twitter.com/FITLibrary"><i class="fa fa-twitter fa-3x"></i></a></li>
				<li><a href="http://pinterest.com/fitlibrary/"><i class="fa fa-pinterest-p fa-3x"></i></a></li>
				<li><a href="https://www.instagram.com/fitnyclibrary/"><i class="fa fa-instagram fa-3x"></i></a></li>
			</ul>
		</div>

    <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

</footer>

</div><!--end wrap-->

<script type="text/javascript">
jQuery(document).ready(function () {
    Omeka.showAdvancedForm();
    Omeka.skipNav();
    Omeka.megaMenu("#top-nav");
    AOD.dropDown();
});
</script>
<?php if (@$bodyclass == "items show"): ?>
<?php echo '<!-- Go to www.addthis.com/dashboard to customize your tools -->'; ?>
<?php echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#async=1#pubid=ra-55c8b7772f2446eb"></script>'; ?>
<?php echo 
'<script type="text/javascript">
    // Call this function once the rest of the document is loaded
    function loadAddThis() {
        addthis.init()
    }
</script>'; ?>
<?php endif; ?>

</body>

</html>
