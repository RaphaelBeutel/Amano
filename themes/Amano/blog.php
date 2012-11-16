<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
	<div class="wrapper">
		<article id="blog"> 
			
			<h1>Blog</h1><hr style="margin-bottom:40px;" /> 
			
			<?php $post_number = 0; ?>
			<?php $getPostSlug = get_query_var('blogpost'); ?>
			
			<?php query_posts( 'post_type=post' ); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( $getPostSlug == basename(get_permalink(get_the_ID())) ) { ?>
						<div id="<?php echo basename(get_permalink(get_the_ID())); ?>" class="blog open">
					<?php }else{ ?>
						<div id="<?php echo basename(get_permalink(get_the_ID())); ?>" class="blog close ">
					<?php } ?>
					<div id="title-<?php echo basename(get_permalink(get_the_ID())); ?>" class="title">
						<img id="arrow" src="<?php bloginfo('template_directory'); ?>/gfx/arrow.png">
						<h2 id="headline-<?php echo basename(get_permalink(get_the_ID())); ?>"><?php the_title(); ?></h2>
					</div>
					<div id="content-<?php echo basename(get_permalink(get_the_ID())); ?>" class="content">
						<?php echo the_content(); ?>
					</div>
					
				</div>
				<?php $post_number++; ?>
			<?php endwhile; endif; ?>
		</article>
	</div>
<?php get_footer(); ?>