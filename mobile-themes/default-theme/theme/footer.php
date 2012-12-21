</div>
	<footer class="footer">
		<?php
			$footer_text = plchf_msb_get_site_option('text','_footer_text_');
				if ($footer_text != '') {
					$footer_text = $footer_text;
				} else {
					$footer_text = '©2012 PluginChief.com';
				}
		?>
		<p><?php echo $footer_text; ?></p>
	</footer>
    </div>
    <?php  plchf_msb_theme_footer(); ?>
  </body>
</html>