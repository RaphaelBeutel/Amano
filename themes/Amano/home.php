<?php /* Template Name: Index */ ?>
<?php get_header(); ?>

		<?php query_posts( 'post_type=start&posts_per_page=1&orderby=rand' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div id="home">
				<?php $thumbnailSRC = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?php echo($thumbnailSRC); ?>">
				
				<div class="text americancaptain">
					<?php the_content(); ?>
				</div>
			</div>
			
		<?php endwhile; endif; ?>
		
<?php get_footer(); ?>