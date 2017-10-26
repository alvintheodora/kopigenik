<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
		
		<!-- Navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid container-navbar">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri() . '/images/kopigenikbanner.png'; ?>"></a>

                </div>
                <div class="collapse navbar-collapse navbarKu" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navBurger"><a class="navbarKu" href="\subscribe">SUBSCRIBE</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\beans">BEANS</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\videos">VIDEOS</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\about-us">OUR STORY</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\faq">FAQ</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\blog">BLOG</a></li>                        
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar-fixed clear -->
        <div class="after-navbar" style="margin-bottom: 60px;"></div>
		
		<div class="header-image" style="background-image: url(<?php if (get_header_image() != '') : ?><?php header_image(); ?><?php else : ?><?php echo get_template_directory_uri() . '/images/bg.jpg'; ?><?php endif; ?>);"></div>
	
		<div class="header section-inner">
		
			<?php if ( get_theme_mod( 'hitchcock_logo' ) ) : ?>
			
		        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_theme_mod( 'hitchcock_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
		        </a>
		
			<?php else : ?>
		
				<h1 class="blog-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
				</h1>
				
			<?php endif; ?>
			
			<?php if ( get_bloginfo('description') ) : ?>
			
				<p class="blog-description"><?php echo bloginfo('description'); ?></p>
			
			<?php endif; ?>
			
			<?php if ( has_nav_menu( 'social' ) ) : ?>
			
				<ul class="social-menu">
							
					<?php 
						wp_nav_menu(
							array(
								'theme_location'	=>	'social',
								'container'			=>	'',
								'container_class'	=>	'menu-social',
								'items_wrap'		=>	'%3$s',
								'menu_id'			=>	'menu-social-items',
								'menu_class'		=>	'menu-items',
								'depth'				=>	1,
								'link_before'		=>	'<span class="screen-reader-text">',
								'link_after'		=>	'</span>',
								'fallback_cb'		=>	'',
							)
						);
					?>
					
				</ul> <!-- /social-menu -->
			
			<?php endif; ?>
			
		</div> <!-- /header -->