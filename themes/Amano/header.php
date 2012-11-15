<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php the_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/reset.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/grid.css">
        
        <script language="JavaScript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
   		<?php wp_head(); ?>
    </head>
    <body>
    	<div class="wrapper">
	    	<header>
	    		<nav id="main">
	    			<ul>
	    				<?php if( is_home() ) { ?>
	    					<li><a href="<?php echo bloginfo('url'); ?>" class="americancaptain active">Start</a></li>
	    				<?php }else{ ?>
	    					<li><a href="<?php echo bloginfo('url'); ?>" class="americancaptain">Start</a></li>
	    				<?php } ?>
	    				
	    				<?php if( get_the_ID() == "6" ) { ?>
	    					<li><a href="<?php echo get_permalink(6); ?>" class="americancaptain active">Amano</a></li>
	    				<?php }else{ ?>
	    					<li><a href="<?php echo get_permalink(6); ?>" class="americancaptain">Amano</a></li>
	    				<?php } ?>
	    				
	    				<?php if( get_the_ID() == "8" ) { ?>
	    					<li><a href="<?php echo get_permalink(8); ?>" class="americancaptain active">Filme</a></li>
	    				<?php }else{ ?>
	    					<li><a href="<?php echo get_permalink(8); ?>" class="americancaptain">Filme</a></li>
	    				<?php } ?>
	    				
	    				<?php if( get_the_ID() == "10" ) { ?>
	    					<li><a href="<?php echo get_permalink(10); ?>" class="americancaptain active">Blog</a></li>
	    				<?php }else{ ?>
	    					<li><a href="<?php echo get_permalink(10); ?>" class="americancaptain">Blog</a></li>
	    				<?php } ?>
	    			</ul>
	    		</nav>
			</header>
		</div>