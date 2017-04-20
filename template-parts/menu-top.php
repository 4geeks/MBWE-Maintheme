<?php 

function getVenuesFromCategory($slug)
{
    $args = array(
        'post_type' => 'venue',
        'tax_query' => array(
            array(
                'taxonomy' => 'promoted-venue',
                'field'    => 'slug',
                'terms'    => $slug,
            ),
        ),
        'posts_per_page'=>6
        ); 
    $query = new WP_Query( $args );
    $venues = array();
    foreach ($query->posts as $venue) {
        $venue = array(
            "title" => get_post_meta( $venue->ID, 'wpcf-venue-name', true),
            "permalink" => get_permalink($venue->ID)
        );
        array_push($venues,$venue);
    }
    return $venues;
}

$decorations = get_terms( 'idea-type', array(
    "parent" => 165//Decorations
) );

$otherIdeas = get_terms( 'idea-type', array(
    "parent" => 168//Other ideas
) );

?>
<div id="top-menu-general" class="not-for-phone">
    
    <div id="main-navbar" class="collapse navbar-collapse js-navbar-collapse container-fluid">
        <!--
        <ul class="nav navbar-nav navbar-right visible-lg-inline-block">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Are you one of our brides?</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">The Tasting</a></li>
                    <li><a href="#">The Private Photo-shoot</a></li>
                    <li><a href="#">About your wedding</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Contact your event designer</a></li>
                </ul>
            </li>
        </ul>
        -->
        <ul class="nav navbar-nav" style="width: 730px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                    <img id="navbar-logo" src="<?php bloginfo('template_url'); ?>/img/logo_bmw_new.png" />
                </a>
            </div>
            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle mega-dropdown-header" data-toggle="dropdown">Pick your venue <span class="caret"></span></a>              
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">The Club of Knights</li>                            
                            <div id="menCollection" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"><img src="http://new.bestmiamiweddings.com/wp-content/uploads/sites/3/2016/04/Wedding-0400-1.jpg" class="img-responsive" alt="product 1"></a>
                                </div><!-- End Item -->
                              </div><!-- End Carousel Inner -->
                              <!-- Controls -->
                            </div><!-- /.carousel -->
                            <li class="divider"></li>
                            <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-venues-locations' ) ); ?>">View all venues <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                        </ul>
                    </li>
                    <li class="col-sm-9">
                    	<div class="dropdown-intro-message">
                    		<h3>Pick from the most beautiful venue selection in Miami, classic and modern wedding venues approved by Best Miami Weddings.</h3>
                    	</div>
                        <ul class="col-sm-4 dropdown-box">
                            <li class="dropdown-header">Ballroom Venues</li>
                            <?php 
                                $venues = getVenuesFromCategory('ballrooms');
                                foreach ($venues as $venue) {
                            ?>
                            <li><a href="<?php echo $venue["permalink"]; ?>"><?php echo $venue["title"]; ?></a></li>
                            <?php } ?>
                        </ul>
                        <ul class="col-sm-4 dropdown-box">
                            <li class="dropdown-header">Outdoor Venues</li>
                            <?php 
                                $venues = getVenuesFromCategory('outdoor');
                                foreach ($venues as $venue) {
                            ?>
                            <li><a href="<?php echo $venue["permalink"]; ?>"><?php echo $venue["title"]; ?></a></li>
                            <?php } ?>                         
                        </ul>
                        <ul class="col-sm-4 dropdown-box">
                            <li class="dropdown-header">Other Venues</li>
                            <?php 
                                $venues = getVenuesFromCategory('other');
                                foreach ($venues as $venue) {
                            ?>
                            <li><a href="<?php echo $venue["permalink"]; ?>"><?php echo $venue["title"]; ?></a></li>
                            <?php } ?>                        
                        </ul>
                    </li>
                </ul>               
            </li>
            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle mega-dropdown-header" data-toggle="dropdown">Plan your wedding <span class="caret"></span></a>                
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Wedding Catering</li>                            
                            <div id="menCollection" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/catering/catering1.jpg" class="img-responsive" alt="product 1"></a>
                                </div><!-- End Item -->
                              </div><!-- End Carousel Inner -->
                              <!-- Controls -->
                            </div><!-- /.carousel -->
                            <li class="divider"></li>
                            <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-catering-menu' ) ); ?>">View menu <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                        </ul>
                    </li>
                    <li class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 dropdown-intro-message" >
                                <h3>Give only world-class to your guests, you wedding will make you shine.</h3>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="col-sm-4 dropdown-box">
                                <li class="dropdown-header">Food & Beverage</li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-catering-menu' ) ); ?>#starters">Starters</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-catering-menu' ) ); ?>#main">Main</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-catering-menu' ) ); ?>#sides">Sides</a></li>
                                <li><a href="<?php echo get_permalink( get_page_by_path( 'wedding-catering-menu' ) ); ?>#thebar">The Bar</a></li>
                            </ul>
                            <ul class="col-sm-4 dropdown-box">
                                <li class="dropdown-header">Browse Decorations</li>
                                <?php foreach ($decorations as $deco) { ?>
                                    <li><a href="<?php echo esc_url( get_term_link( $deco ) ); ?>"><?php echo $deco->name; ?></a></li>
                                <?php } ?>
                            </ul>
                            <ul class="col-sm-4 dropdown-box">
                                <li class="dropdown-header">Much more</li>
                                <?php foreach ($otherIdeas as $idea) { ?>
                                    <li><a href="<?php echo esc_url( get_term_link( $idea ) ); ?>"><?php echo $idea->name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>               
            </li>
            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle mega-dropdown-header" data-toggle="dropdown">Get Inspired <span class="caret"></span></a>                
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="col-sm-2">
                    	<h3>From our weddings...</h3>
                        <ul>
                            <li><a href="http://blog.bestmiamiweddings.com/category/wedding-gallery/venues/">Venues</a></li>
                            <li><a href="http://blog.bestmiamiweddings.com/category/wedding-gallery/dress/">Dress</a></li>
                            <li><a href="http://blog.bestmiamiweddings.com/category/wedding-gallery/decor/">Decor</a></li>
                            <li><a href="http://blog.bestmiamiweddings.com/category/wedding-gallery/cusine/">Cuisine</a></li>
                            <li><a href="http://blog.bestmiamiweddings.com/category/wedding-gallery/other/">Weddings</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-10 plan-your-wedding">
                    	<h3>Have a #BestMiamiWedding inspired from our blog...</h3>
                        <ul class="dropdown-box col-sm-4">
                            <li class="dropdown-header">Before the wedding</li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/before-the-wedding/top-five-miami-wedding-venues/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2015/10/Vizcaya-wedding.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Top Five Miami Wedding Venues</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/before-the-wedding/choose-catering-menu-for-wedding/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/01/RV4_5334.jpg'); background-size: contain;"></div>
                                    <p class="article-title">How to Choose a Catering Menu for Your Wedding in Miami</p>
                                </a>
                            </li>                            
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/before-the-wedding/top-5-christian-churches-in-miami/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/08/Screen-Shot-2016-08-04-at-1.35.36-PM-300x208.png'); background-size: contain;"></div>
                                    <p class="article-title">Top 5 Christian Churches in Miami</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/before-the-wedding/find-the-perfect-wedding-dress-color-just-for-you/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/06/wedding-725431.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Find The Perfect Wedding Dress Color Just For You!</p>
                                </a>
                            </li>    
                            <li class="divider"></li>
                            <li><a href="http://blog.bestmiamiweddings.com">Browse more articles<span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                        </ul>
                        <ul class="dropdown-box col-sm-4">
                            <li class="dropdown-header">During the wedding</li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/during-the-wedding/aisle-runner-messages-of-love/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/06/wedding-runner.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Aisle Runner: Messages Of Love</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/during-the-wedding/top-10-songs-to-play-at-your-wedding-this-2016/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/06/technology-974413.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Top 10 Songs To Play At Your Wedding</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/during-the-wedding/waffle-bar-party-for-a-wedding-in-miami/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/05/Waffke-e1464122631451.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Waffle Bar Party for a Wedding in Miami</p>
                                </a>
                            </li>                            
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/during-the-wedding/why-every-wedding-in-miami-should-use-a-water-cooler-to-dispense-your-alcohol/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/05/Jack-Daniels-Watercooler.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Why Every Miami Wedding Should Use A Water Cooler For The Alcohol</p>
                                </a>
                            </li>
                            <li class="divider"></li>
                        </ul>
                        <ul class="dropdown-box col-sm-4">
                            <li class="dropdown-header">After the wedding</li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/after-the-wedding/top-10-honeymoon-destinations/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2015/11/Maui_Hawaii_beach.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Top 10 Honeymoon Destinations</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/05/Madten.jpg">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/05/Jack-Daniels-Watercooler.jpg'); background-size: contain;"></div>
                                    <p class="article-title">Party planning: Flip Cup After-Party</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/after-the-wedding/wedding-checklist-after-your-wedding-day/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/11/Screen-Shot-2016-11-18-at-11.15.57-AM.png'); background-size: contain;"></div>
                                    <p class="article-title">Wedding Checklist: After Your Wedding Day</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.bestmiamiweddings.com/after-the-wedding/the-best-honeymoon-destinations-for-the-next-year-on-a-budget/">
                                    <div class="article-img" style="background: url('http://blog.bestmiamiweddings.com/wp-content/uploads/sites/2/2016/12/Screen-Shot-2016-12-09-at-4.24.15-PM.png'); background-size: contain;"></div>
                                    <p class="article-title">Honeymoon Destinations on a Budget</p>
                                </a>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>               
            </li>
            <li class="dropdown dropdown-company">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>                
                <ul class="dropdown-menu">
                    <li id="dropdown-about" class="col-sm-6">
                        <a href="<?php echo get_permalink( get_page_by_path( 'about-us' ) ); ?>">About Us</a>
                    </li>
                    <li id="dropdown-press" class="col-sm-6">
                        <a href="<?php echo get_permalink( get_page_by_path( 'press-awards' ) ); ?>">Press & Awards</a>
                    </li>
                    <li id="dropdown-testimonials" class="col-sm-6">
                        <a href="<?php echo get_permalink( get_page_by_path( 'testimonials' ) ); ?>">Testimonials</a>
                    </li>
                    <li id="dropdown-contact" class="col-sm-6">
                        <a href="<?php echo get_permalink( get_page_by_path( 'contact-us' ) ); ?>">Contact Us</a>
                    </li>
                </ul>               
            </li>
        <?php if (is_page('gallery') || is_page('gallery-event') || is_singular("venue") || is_singular("church")){ ?>
            <li id="secondary-menu">
                <?php get_template_part( 'template-parts/part', 'top-venue-nomobile' ); ?>
            </li>
        <?php } else {?>
            <li id="empty-menu">&nbsp;</li>
        <?php } ?>
        </ul>
    </div><!-- /.nav-collapse -->
</div><!-- /.nav-collapse -->
