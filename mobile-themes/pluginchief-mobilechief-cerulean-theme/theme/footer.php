
	</div><!-- Container -->

	<br/>

	<!-- Footer
	================================================== -->
	<footer class="footer">

		<?php
		$footer_text = plchf_msb_get_site_option('text','_footer_text_');
		if ($footer_text != '') {
			$footer_text = $footer_text;
		} else {
			$footer_text = '©2012 PluginChief.com';
		}
		?>

		<br/>
		<p><?php echo $footer_text; ?></p>

	</footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/jquery.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/fitvid.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-button.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-typeahead.js"></script>

    <?php plchf_msb_theme_footer(); ?>

  </body>
</html>