<?php 
	


	$template_directory = get_template_directory_uri();
	define(THEME_DIR, $template_directory.'-child');

	//include '/includes/shortcodes/core.php';
	
	$template_directory = get_template_directory();


	wp_register_script( 'jquery-cycle-2', THEME_DIR . '/assets/js/jquery.cycle2.min.js', array('jquery'), 1.0, true);
	wp_enqueue_script( 'jquery-cycle-2' );


		wp_register_script( 'admin-custom', THEME_DIR . '/assets/js/admin-custom.js', array('jquery'), 1.0, true);
		wp_enqueue_script( 'admin-custom' );

	/**
	* Registers a new post type
	* @uses $wp_post_types Inserts new post type object into the list
	*
	* @param string  Post type key, must not exceed 20 characters
	* @param array|string  See optional args description above.
	* @return object|WP_Error the registered post type object, or an error object
	*/
	function cp_banners() {

	$labels = array(
		'name'                => __( 'Banners', 'text-domain' ),
		'singular_name'       => __( 'Banner', 'text-domain' ),
		'add_new'             => _x( 'Adicionar novo Banner', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar novo Banner', 'text-domain' ),
		'edit_item'           => __( 'Editar Banner', 'text-domain' ),
		'new_item'            => __( 'Novo Banner', 'text-domain' ),
		'view_item'           => __( 'Ver Banner', 'text-domain' ),
		'search_items'        => __( 'Procurar Banners', 'text-domain' ),
		'not_found'           => __( 'Nenhum Banner encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nenhum Banner encontrado na lixeira', 'text-domain' ),
		'parent_item_colon'   => __( 'Banner pai:', 'text-domain' ),
		'menu_name'           => __( 'Banners', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title')
	);

	register_post_type( 'banners', $args );
	}

	add_action( 'init', 'cp_banners' );

	
function shortcode_banner( $atts ) {

				wp_reset_query();

		$atts = extract( shortcode_atts( 
			array( 
				'template' => '',
			),
		$atts 
		) 
		);

		switch ($template) {
			case 'banner-inicial':
				$template = "01";
				$class = "banner-inicial"; 
				$pagination = true;
				break;
			
			case 'banner-lateral-01':
				$template = "02"; 
				$class = "banner-lateral-01"; 
				$pagination = false;
				break;	

			
			case 'banner-lateral-02':
				$template = "03"; 
				$class="banner-lateral-02";
				$pagination = false;
				break;					
		}


		$args = array(
			'post_type' => 'banners', 
			'posts_per_page' => -1
			);

		$loop = new WP_Query($args);


		if($loop->have_posts()) :
	
				?>
				<div class="<?php echo $class; ?>"
					data-cycle-pager="> .pager-slideshow"
					<?php if($pagination) {?>
					data-cycle-pager-template="<strong class='item-pager'><a href=#> {{slideNum}} </a></strong>"
					<?php } ?>
				>
					<?php if($pagination) { ?>
					<div class="pager-slideshow"></div>
					<?php } ?>
					<?php while ($loop->have_posts()) : $loop->the_post();
						$type_banner = get_field('type_banner');
						if($template === $type_banner) :
					 ?>
						<img src="<?php the_field('image_banner'); ?>" class="img-responsive" />
					<?php	
						endif;
					 endwhile; ?>
				</div>
		<?php 
				

		else :
			echo '<div class="container"><div class="alert alert-danger"><p><strong>ERRO:</strong> nenhum banner foi adicionado!</p></div></div>';
		endif;

		wp_reset_query();

}
	add_shortcode( 'banner','shortcode_banner' );	

 ?>