<?php
	$footerTitle1 = get_post_meta($post->ID, 'footer1_title', true);
	$footerTitle2 = get_post_meta($post->ID, 'footer2_title', true);
	$footerTitle3 = get_post_meta($post->ID, 'footer3_title', true);
?>			

			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="row">
					<div id="divFooter1" class="col-md-12">
						<div class="col-md-offset-1 col-md-4">
							<div class="social">
								<span class="copyright">FOLLOW US</span>        
								<div class="social-icon instagram">
									<a href="https://www.instagram.com/bestmiamiweddings/" target="_blank"><i class="fa fa-instagram"></i></a>
								</div>
								<div class="social-icon twitter">
									<a href="https://twitter.com/bestmiaweddings" target="_blank"><i class="fa fa-twitter"></i></a>
								</div>
								<div class="social-icon facebook">
									<a href="https://www.facebook.com/BestMiamiWeddings/" target="_blank"><i class="fa fa-facebook"></i></a>
								</div>
								<div class="social-icon youtube">
									<a href="https://www.youtube.com/channel/UCgv-DOYllKT1ihDbKli8NzQ" target="_blank"><i class="fa fa-youtube"></i></a>
								</div>
							</div>
						</div>
						<div class="col-md-offset-2 col-md-5">
							<div class="newsletter">
								<div class="col-md-12">
									<span>NEWSLETTER</span>
								</div>
								<div class="col-md-12">
									<input type="text" id="inputnewsletter" placeholder="Your Email Addres..."/>
									<button class="btn btn-info">Suscribe!</button>								
								</div>
							</div>
						</div>
					</div>
					<div id="divFooter2" class="col-md-12">
						<div id="div-angle-double" class="col-md-offset-5 col-md-2 fa fa-angle-double-up">
						</div>
						<div class="col-md-offset-1 col-md-6">
							<div class="links">
								<div id="div-links-title" class="col-md-12">
									<span><em>Our website in a blink:</em></span>
								</div>
								<div id="div-line" class="col-md-12 line2">
								</div>
								<div class="col-md-4">
									<div id="div-links-content" class="col-md-12">
										<span><?php echo $footerTitle1; ?></span>
									</div>
									<div class="col-md-12">
										<?php 										
											$menu_name = 'footer1'; 
										    $menu_items = wp_get_nav_menu_items($menu_name);
										    if ($menu_items != false){									 
											    $menu_list = '<ul id="menu-' . $menu_name . '" class="ul-menu">';
											    foreach ( (array) $menu_items as $key => $menu_item ) {
											        $title = $menu_item->title;
											        $url = $menu_item->url;
											        $menu_list .= '<li class="fa fa-angle-right"><a href="' . $url . '">' . $title . '</a></li>';
											    }
											    $menu_list .= '</ul>';
											    echo $menu_list;
											}
										?>
									</div>
								</div>
								<div class="col-md-4 margin-left-links">
									<div id="div-links-content" class="col-md-12">
										<span><?php echo $footerTitle2; ?></span>
									</div>
									<div class="col-md-12">
										<?php 										
											$menu_name = 'footer2'; 
										    $menu_items = wp_get_nav_menu_items($menu_name);
										    if ($menu_items != false){									 
											    $menu_list = '<ul id="menu-' . $menu_name . '" class="ul-menu">';
											    foreach ( (array) $menu_items as $key => $menu_item ) {
											        $title = $menu_item->title;
											        $url = $menu_item->url;
											        $menu_list .= '<li class="fa fa-angle-right"><a href="' . $url . '">' . $title . '</a></li>';
											    }
											    $menu_list .= '</ul>';
											    echo $menu_list;
											}
										?>
									</div>
								</div>
								<div class="col-md-4 margin-left-links">
									<div id="div-links-content" class="col-md-12">
										<span><?php echo $footerTitle3; ?></span>
									</div>
									<div class="col-md-12">
										<?php 										
											$menu_name = 'footer3'; 
										    $menu_items = wp_get_nav_menu_items($menu_name);	
										    if ($menu_items != false){								 
											    $menu_list = '<ul id="menu-' . $menu_name . '" class="ul-menu">';
											    foreach ( (array) $menu_items as $key => $menu_item ) {
											        $title = $menu_item->title;
											        $url = $menu_item->url;
											        $menu_list .= '<li class="fa fa-angle-right"><a href="' . $url . '">' . $title . '</a></li>';
											    }
											    $menu_list .= '</ul>';
											    echo $menu_list;
											}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="logos">
								<div class="col-md-6 img-logo"></div>
								<div class="col-md-6 img-logofe"></div>
								<div class="col-md-6 img-aw1"></div>
								<div class="col-md-6 img-aw2"></div>
							</div>
						</div>
					</div>
				</div>










			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
