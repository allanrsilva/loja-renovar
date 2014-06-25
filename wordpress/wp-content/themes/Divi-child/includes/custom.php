<?php
/**
 * Custom functions
 */

    add_action( 'after_setup_theme', 'meu_tema_configuracoes' );
function meu_tema_configuracoes()
{
    add_image_size( 'miniatura', 145, 240, true );
    }// Unlimited Height Mode


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

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function cp_clients() {

	$labels = array(
		'name'                => __( 'Clientes', 'text-domain' ),
		'singular_name'       => __( 'Cliente', 'text-domain' ),
		'add_new'             => _x( 'Adicionar novo Cliente', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Adicionar novo Cliente', 'text-domain' ),
		'edit_item'           => __( 'Editar Cliente', 'text-domain' ),
		'new_item'            => __( 'Novo Cliente', 'text-domain' ),
		'view_item'           => __( 'Ver Cliente', 'text-domain' ),
		'search_items'        => __( 'Procurar Clientes', 'text-domain' ),
		'not_found'           => __( 'Nenhum Cliente encontrado', 'text-domain' ),
		'not_found_in_trash'  => __( 'Nenhum Cliente encontrado na lixeira', 'text-domain' ),
		'parent_item_colon'   => __( 'Cliente pai:', 'text-domain' ),
		'menu_name'           => __( 'Clientes', 'text-domain' ),
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
		'supports'            => array(
			'title'
			)
	);

	register_post_type( 'clients', $args );
}

add_action( 'init', 'cp_clients' );

function shortcode_banner( $atts ) {
		$args = array(
			'post_type' => 'banners', 
			'posts_per_page' => -1
			);

		$loop = new WP_Query($args);

		if($loop->have_posts()) :?>
			<div class="cycle-slideshow">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<img src="<?php the_field('banner'); ?>" class="img-responsive" />
				<?php endwhile; ?>
			</div>
		<?php else :
			echo '<div class="container"><div class="alert alert-danger"><p><strong>ERRO:</strong> nenhum banner foi adicionado!</p></div></div>';
		endif;

		wp_reset_query();

}
	add_shortcode( 'banner','shortcode_banner' );	

function shortcode_clients( $atts ) {

	$atts = extract( shortcode_atts( array( 
		'layout'=>'carousel' 
		),$atts ) 
	);

	$args = array(
			'post_type' => 'clientes', 
			'posts_per_page' => -1
			);

		$loop = new WP_Query($args);

		if($loop->have_posts()) :

			if($layout == 'carousel') : ?>	
			<h4 class="title-shortcode-clients">Clientes</h4>
			<ul class="<?php echo $layout; ?> elastislide-list">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<li><a href="#"><img src="<?php the_field('cliente'); ?>" class="img-carousel" width="80px" height="80px" /></a></li>
				<?php endwhile; ?>
			<?php 
				elseif($layout == 'grid'):?>
				<br>
				<br>
				<br>
				<h4 style="text-align: center;">Clientes</h4>
				<ul class="<?php echo $layout; ?>-carousel">	
					<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<li class="col-md-4"><a href="#"><img src="<?php the_field('cliente'); ?>" class="img-carousel"/></a></li>
					<?php endwhile; ?>
			<?php endif; ?>	
				
			</ul>
		<?php 
		else :
			echo '<hr><div class="container-fluid"><div class="alert alert-danger"><p><strong>ERRO:</strong> nenhum cliente foi adicionado!</p></div></div>';
		endif;

		wp_reset_query();

}
add_shortcode( 'clients','shortcode_clients' );

   /**
	* Creates a sidebar
	* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	*/
	$args = array(
		'name'          => __( 'Newsletter do rodapé', 'theme_text_domain' ),
		'id'            => 'news-footer',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="" class="widget">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);

	register_sidebar( $args );

	add_action('admin_menu', 'add_global_custom_options');

	function add_global_custom_options()
	{
	    add_options_page('Global Custom Options', 'Global Custom Options', 'manage_options', 'functions','global_custom_options');
	}

	function global_custom_options()
	{
	?>
	    <div class="wrap">
	        <h2>Página de Opções</h2>
	        <form method="post" action="options.php" class="form-horizontal">
	        	<?php wp_nonce_field('update-options') ?>
	        	<fieldset>
	        		<legend>Informações de contato e endereço</legend>
	        		<div class="row">
		        		<div class="form-group">
							<label class="control-label col-lg-2">Endereço :</label>
							<div class="col-lg-8">
								<textarea class="form-control" name="endereco-edlei" value="<?php echo get_option('endereco-edlei'); ?>"></textarea>
							</div>
		        		</div>
		        	</div>	
		        	<div class="row">
		        		<div class="form-group">
		        			<label class="control-label col-lg-2">Telefone :</label>
							<div class="col-lg-3">
								<input type="text" class="form-control" name="telefone-edlei" value="<?php echo get_option('telefone-edlei'); ?>" />
							</div>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="form-group">
		        			<label class="control-label col-lg-2">E-mail :</label>
							<div class="col-lg-3">
								<input type="text" class="form-control" name="email-edlei" value="<?php echo get_option('email-edlei'); ?>" />
							</div>
		        		</div>
		        	</div>	
		        	<div class="row">
		        		<div class="form-group">
		        			<label class="control-label col-lg-2">Link Twitter  :</label>
							<div class="col-lg-5">
								<input type="text" class="form-control" name="twitter-edlei" value="<?php echo get_option('twitter-edlei'); ?>" />
							</div>
		        		</div>
		        	</div>	
		        	<div class="row">
		        		<div class="form-group">
		        			<label class="control-label col-lg-2">Link facebbok  :</label>
							<div class="col-lg-5">
								<input type="text" class="form-control" name="facebook-edlei" value="<?php echo get_option('facebook-edlei'); ?>" />
							</div>
		        		</div>
		        	</div>	
		        	<div class="row">
		        		<div class="form-group">
		        			<label class="control-label col-lg-2">Link youtube  :</label>
							<div class="col-lg-5">
								<input type="text" class="form-control" name="youtube-edlei" value="<?php echo get_option('youtube-edlei'); ?>" />
							</div>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="form-group">
			        		<div class='col-lg-3 col-lg-offset-2'>
			        			<input type="submit" class="btn btn-primary" value="Salvar informações"/>
			        		</div>
		        		</div>
		        	</div>

		        	</fieldset>

	            <input type="hidden" name="action" value="update" />
	            
	            <input type="hidden" name="page_options" value="endereco-edlei,telefone-edlei,email-edlei,twitter-edlei,facebook-edlei,youtube-edlei" />
	        </form>
	    </div>
	<?php
	}


	remove_shortcode( 'gallery' );
	add_shortcode( 'gallery', 'custom_gallery' );

	function custom_gallery($atts) {
		global $post;
 
	    if ( ! empty( $atts['ids'] ) ) {
	        // 'ids' is explicitly ordered, unless you specify otherwise.
	        if ( empty( $atts['orderby'] ) )
	            $atts['orderby'] = 'post__in';
	        $atts['include'] = $atts['ids'];
	    }

	     extract(shortcode_atts(
	     	array(
		        'orderby' => 'menu_order ASC, ID ASC',
		        'include' => '',
		        'id' => $post->ID,
		        'itemtag' => 'dl',
		        'icontag' => 'dt',
		        'captiontag' => 'dd',
		        'columns' => 3,
		        'size' => 'medium',
		        'link' => 'file'
		    ), 
		 $atts));

		 switch ($atts['columns']) :
			case 1:
				$class = "col-lg-12";
			break;
			
			case 2:
				$class = "col-lg-6";
			break;
			
			case 3:
				$class = "col-lg-4";
			break;
			
			case 4:
				$class = "col-lg-3";
			break;

			default :
				$class = "col-lg-3";
			break;

		endswitch;

		 $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
   	    'orderby' => $orderby
    	);
 
		if ( !empty($include) )
        $args['include'] = $include;
	    else {
	        $args['post_parent'] = $id;
	        $args['numberposts'] = -1;
	    }

	    $first = true;
	    $count = 0;


   		$images = get_posts($args); ?>

   		<div class="modal fade modal-gallery" id="gallery-<?php echo $id?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close close-modal-gallery" data-dismiss="modal" aria-hidden="true">&times;</button>
			      </div>
			      <div class="modal-body">



					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
					  	<?php foreach($images as $image) :
						  	
						  	$url_image = wp_get_attachment_url($image->ID);
						 ?>

						    <div class="item <?php if($first == true) echo 'active'; $first = false; ?>">
						      	<img src="<?php echo $url_image; ?>"  alt="Integralli"  />		
						      		
						    </div>
						<?php endforeach; ?>
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					  </a>
					</div>
			      	
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<ul class="grid-produtos" id="itemContainer">

   		<?php foreach ( $images as $image ) :   


			
			$url_image = wp_get_attachment_url($image->ID);
			$extensao = substr($url_image,(strlen($url_image)-4),strlen($url_image));
						  		$url_image = substr($url_image, 0, -4);
						  		$url_image = $url_image.'-145x240'.$extensao;   

			?>  
				

				<li>
	  			<a data-toggle="modal" data-target="#gallery-<?php echo $id; ?>" data-slide-to="<?php echo $count ?>">
	  				<img src="<?php echo $url_image; ?>" alt="Integralli" class="img-responsive item-gallery" />
	  			</a>
	  			</li>


    		<?php
    		 $count = $count + 1;
    		 endforeach; 
    		?>
    					</ul>
    		<div class="holder"></div>	
    

<?php }
	