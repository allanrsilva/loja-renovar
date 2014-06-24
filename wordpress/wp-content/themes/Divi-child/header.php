<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<title><?php elegant_titles(); ?></title>
		<?php elegant_description(); ?>
		<?php elegant_keywords(); ?>
		<?php elegant_canonical(); ?>

		<?php do_action( 'et_head_meta' ); ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php $template_directory_uri = get_template_directory_uri(); ?>
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
		<![endif]-->

		<script type="text/javascript">
			document.documentElement.className = 'js';
		</script>

		<?php wp_head(); ?>
	</head>
	<body>
	<div class="container">
		<?php
			if ( is_page_template( 'page-template-blank.php' ) ) {
				return;
			}

			$et_secondary_nav_items = et_divi_get_top_nav_items();
			$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

		?>
		<nav class="nav-top">
			<div class="nav-top-menu">
				<?php echo wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );?>
			</div>
			<div class="call-to-action">
				<a href="#" title="Conheça nossos cursos">Cursos</a>
			</div>
			<div class="nav-top-social">
				<?php
					if ( ! $et_contact_info_defined && true === $show_header_social_icons ) {
						get_template_part( 'includes/social_icons', 'header' );
					} else if ( $et_contact_info_defined && true === $show_header_social_icons ) {
						ob_start();

						get_template_part( 'includes/social_icons', 'header' );

						$duplicate_social_icons = ob_get_contents();

						ob_end_clean();

						printf(
							'<div class="et_duplicate_social_icons">
								%1$s
							</div>',
							$duplicate_social_icons
						);
					}
				?>
			</div>
		</nav>
	</div>
	<header>
		<div class="container clearfix">
			<?php
				$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
					? $user_logo
					: $template_directory_uri . '/images/logo.png';
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" />
				</a>
				<?php
					if ( ! $et_top_info_defined ) {
						et_show_cart_total( array(
							'no_text' => true,
						) );
					}
					?>

					<?php if ( false !== et_get_option( 'show_search_icon', true ) ) : ?>
					<div id="et_top_search">
						<span id="et_search_icon"></span>
						<form role="search" method="get" class="et-search-form et-hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
							printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
								esc_attr_x( 'Search &hellip;', 'placeholder', 'Divi' ),
								get_search_query(),
								esc_attr_x( 'Search for:', 'label', 'Divi' )
							);
						?>
						</form>
					</div>
					<?php endif; // true === et_get_option( 'show_search_icon', false ) ?>

					<?php do_action( 'et_header_top' ); ?>
		</div>				
	</header>
		<?php et_show_cart_total();?>
	