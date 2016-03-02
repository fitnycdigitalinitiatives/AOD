</div><!-- end content -->

<footer role="contentinfo">

        <div id="info">
            <p id="copyright">©2016 <a href="/">FIT Archive On Demand</a></br>All rights reserved.</p>
			<p id="address">Seventh Avenue at 27 Street<br>New York City 10001-5992<br>212 217.7999</p>
        </div>
		<div id="social-media">
			<p>Archive on Demand is an initiative of the <a href="http://www.fitnyc.edu/library.asp">FIT Library</a></p>
			<ul>
				<li><a href="https://www.facebook.com/FITLibrary"><i class="fa fa-facebook fa-3x"></i></a></li>
				<li><a href="https://twitter.com/FITLibrary"><i class="fa fa-twitter fa-3x"></i></a></li>
				<li><a href="http://pinterest.com/fitlibrary/"><i class="fa fa-pinterest-p fa-3x"></i></a></li>
				<li><a href="http://instagram.com/fashioninstitutelibrary"><i class="fa fa-instagram fa-3x"></i></a></li>
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
    AOD.mobileSelectNav();
});
</script>

</body>

</html>
