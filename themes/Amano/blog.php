<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
	<div class="wrapper">
		<article id="blog">
			
			<h1>Blog</h1><hr style="margin-bottom:40px;" /> 
			
			<?php $post_number = 0; ?>
			
			<?php query_posts( 'post_type=post' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if ( $post_number == 0 ) { ?>
					<div id="<?php the_ID(); ?>" class="blog close open">
				<?php }else{ ?>
					<div id="<?php the_ID(); ?>" class="blog close ">
				<?php } ?>
					<div id="title-<?php the_ID(); ?>" class="title">
						<img id="arrow" src="<?php bloginfo('template_directory'); ?>/gfx/arrow.png">
						<h2><?php the_title(); ?></h2>
					</div>
					<div id="content-<?php the_ID(); ?>" class="content">
						<?php echo the_content(); ?>
					</div>
					
				</div>
				<?php $post_number++; ?>
			<?php endwhile; endif; ?>
		</article>
	</div>
<?php get_footer(); ?>