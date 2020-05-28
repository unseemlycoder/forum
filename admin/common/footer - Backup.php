	<div class="row margin-top50">
		<p style="text-align: center;">Copyright &copy; <?php echo date('Y',time()); ?></p>
	</div>
	</div>
	<!-- Container End -->
	<script type="text/javascript" src="<?php echo $path['siteUrl']; ?>/lib/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $path['siteUrl']; ?>/lib/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
		  selector: 'textarea',
		    plugins: [
		    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		    'searchreplace wordcount visualblocks visualchars code fullscreen',
		    'insertdatetime media nonbreaking save table contextmenu directionality',
		    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		  ]
		});
	</script>
</body>
</html>