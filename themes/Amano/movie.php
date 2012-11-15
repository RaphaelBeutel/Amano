<?php /* Template Name: Index */ ?>
<?php get_header(); ?>
		<div class="wrapper">
			<article id="movie">
				
				<h1>Filme</h1><hr /> 
				<?php query_posts( 'post_type=movie' ); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<div id="<?php the_ID(); ?>" class="movie">
						<h2><?php the_title(); ?></h2><br>
						
						<?php $thumbnailSRC = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<img src="<?php echo $thumbnailSRC; ?>">
						
						<div>
							<?php the_content(); ?>
						</div>
					</div>
					
				<?php endwhile; endif; ?>
			</article>
		</div>
<?php get_footer(); ?>