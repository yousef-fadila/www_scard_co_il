	
	<!-- Start Footer -->
	<footer class="container">
		<p>כל הזכויות שמורות ל-<a href="http://www.octsol.com">octsol</a> &copy; - <a href="terms.php">תקנון האתר</a></p>
	</footer>
	<!-- End Footer -->
	
	</div>
	<!-- End Wrapper -->
	
	<?php  if(isset($_GET['u'])){
				    echo '<script>FluidNav.init("'.$_GET['u'].'")</script>' ;
				}else{
				    echo '<script>FluidNav.init("home")</script>';
				}?>
				
				<script>
				$(".toggle_list ul li .title").each(function() {
		$(this).find("a.toggle_link").text($(this).find("a.toggle_link").data("open_text"));
		if($(this).parent().hasClass("opened")) {
			$(this).parent().find(".content").show();
		}
	});
				</script>
</body>
</html>
