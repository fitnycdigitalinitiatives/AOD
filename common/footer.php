</div><!-- end content -->

<footer role="contentinfo">

        <div id="info">
            <p id="copyright">©2016 Fashion Institute of Technology</br>All rights reserved.</p>
			<p id="address">Seventh Avenue at 27 Street<br>New York City 10001-5992<br>212 217.7999</p>
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

</body>

</html>
