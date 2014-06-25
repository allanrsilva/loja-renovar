<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<?php 
			echo do_shortcode( '[banner template="banner-inicial"]' );
		?>
		<div class="chamada-home"></div>
		<div class="banners-laterais">
			<?php echo do_shortcode( '[banner template="banner-lateral-01"]' ); ?>
			<?php echo do_shortcode( '[banner template="banner-lateral-02"]' ); ?>
		</div>
		<div class="content-home">
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php
	get_footer();
?>