<?php /* Template Name: Filme */ ?>
<?php get_header(); ?>
		<div class="wrapper">
			<article id="movie">
				
				<h1>Filme</h1><hr /> 
				<?php query_posts( 'post_type=movie' ); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<div id="<?php the_ID(); ?>" class="movie">
						<h2><?php the_title(); ?></h2><br>
						
						<div class="embed">
							<?php echo get_post_meta( get_the_ID(), 'movie_embed_code', true ); ?>
						</div>
						
						<div class="text">
							<?php the_content(); ?>
						</div>
					</div>
					
				<?php endwhile; endif; ?>
			</article>
		</div>
<?php get_footer(); ?>