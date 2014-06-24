<?php 

	function slideshow_shortcode ( $atts,$content ) {
		$atts = extract( shortcode_atts( 
				array( 
					'height' => 500,
					'arrows' => 'on',
					'controls' => 'on',
					'automatic_animation' => 'on',
					'auto_speed' => 5000,
					'parallax' => 'off',
					'css_id' => '',
					'css_class' => '',
				),
			$atts ) 
		);
		echo '
		<div class="cycle-slideshow"
			data-cycle-speed='.$auto_speed.'
			data-cycle-slides="> div"	
		>';
		echo do_shortcode( $content );
		echo '</div>';
	}
	add_shortcode( 'et_pb_slider_artezzo','slideshow_shortcode');

	function slide_shortcode( $atts ) {

		$atts = extract( shortcode_atts( 
			array( 
				'type_slide' => '',
				'slide_link' => '#',
				'background_color' => '#ffffff',
				'slide_right' => '#',
				'slide_image_background' => '',
			),
		$atts 
		) 
		);


		switch ($type_slide) :
			case 'slide_simple':
				echo '
					<div class="slide-item"  style="background:#fcc" > 
					</div>';
				break;
			
			default:
				# code...
				break;
		endswitch;
	}

	add_shortcode('et_pb_slide_artezzo' , 'slide_shortcode');
 ?>