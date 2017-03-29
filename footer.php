<?php
	//$footerTitle1 = get_post_meta($post->ID, 'footer1_title', true);
	//$footerTitle2 = get_post_meta($post->ID, 'footer2_title', true);
	//$footerTitle3 = get_post_meta($post->ID, 'footer3_title', true);
	$actualURL = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
?>			

			<!-- footer -->
			<footer class="footer" role="contentinfo">

				<div class="row fix-margin-row">
					<div id="divFooter1" class="col-md-12 col-sm-12">
						<div class="col-md-offset-1 col-md-5 col-sm-12">
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
								<div class="social-icon pinterest">
					              <a href="https://www.pinterest.com/bestmiaweddings/" target="_blank"><i class="fa fa-pinterest"></i></a>
					            </div>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-5 col-sm-12">
							<div class="newsletter">
								<!-- <div class="col-md-12 margin-bottom3">
									<span>NEWSLETTER</span>
								</div> -->


								<div style="text-align: center;">
								  <form method="POST" action="https://fetesevents.activehosted.com/proc.php" id="_form_20_" class="_form _form_20 _inline-form _inline-style _dark" novalidate>
								    <input type="hidden" name="u" value="20" />
								    <input type="hidden" name="f" value="20" />
								    <input type="hidden" name="s" />
								    <input type="hidden" name="c" value="0" />
								    <input type="hidden" name="m" value="0" />
								    <input type="hidden" name="act" value="sub" />
								    <input type="hidden" name="v" value="2" />
								    <input type="hidden" name="field[16]" value="<?php echo $actualURL; ?>" />
								    <div class="_form-content">
								      <div class="_form_element _x42816285 _inline-style _clear">
								        <div class="_form-title" style="text-align: center;">
								          Sign up to our newsletter
								        </div>
								      </div>
								      <div class="_form_element _x12877897 _inline-style col-sm-7" style="text-align: right; padding: 5px;">								        
								        <input type="text" id="inputnewsletter" name="email" placeholder="Type your email" required/>
								      </div>
								      <div class="_button-wrapper _inline-style col-md-4 col-sm-4" style="text-align: left; padding: 5px;">
								        <button id="_form_20_submit" class="_submit" type="submit">
								          Suscribe!
								        </button>
								      </div>
								      <div class="_clear-element">
								      </div>
								    </div>
								    <div class="_form-thank-you" style="display:none;">
								    </div>
								  </form>
								</div>







								<!-- <div class="col-md-12">
									<input type="text" id="inputnewsletter" placeholder="Your Email Addres..."/>
									<button class="btn btn-info">Suscribe!</button>								
								</div> -->
							</div>
						</div>
					</div>
					<div id="divFooter2" class="col-md-12 col-sm-12">
						<div id="div-angle-double" class="col-md-offset-5 col-md-2 fa fa-angle-double-up">
						</div>
						<div class="col-md-offset-1 col-md-10 col-lg-7">
							<div class="links">
								<div class="col-sm-4">
									<div id="div-links-content" class="col-md-12">
										<span>The Company</span>
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
								<div class="col-sm-4 margin-left-links">
									<div id="div-links-content" class="col-md-12">
										<span>Wedding Gallery</span>
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
								<div class="col-sm-4 margin-left-links">
									<div id="div-links-content" class="col-md-12">
										<span>Our services</span>
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
						<div class="col-md-12 col-lg-4 footer-logo">
							<div class="row">
								<div class="col-xs-12 img-logo text-center">&nbsp;</div>
								<div class="col-xs-12 text-center">
									<p><strong>Work with the best, our reputation precede us </strong></p>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
									<p>Average 4.8 rating within all available review systems, <a href="<?php echo get_home_url().'/testimonials' ?>">learn more.</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>


			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		<script>
	        // conditionizr.com
	        // configure environment tests
	        window.onload=function(){conditionizr.config({
	        	assets: '<?php echo get_template_directory_uri(); ?>',
	        	tests: {}
	        })};
	    </script>

		<script async type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">window.onload=function(){stLight.options({publisher: "6bd32747-7619-46d4-b054-5aa58b166233-051c", doNotHash: false, doNotCopy: false, hashAddressBar: false})};</script>
	</body>
</html>
