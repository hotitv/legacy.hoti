<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>          
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <![endif]-->              
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js" type="text/javascript"></script>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts.js" type="text/javascript"></script>
</head>
<body>

<?php $shortname = "premium"; ?>

<?php if(get_option($shortname.'_custom_background_color','') != "") { ?>
	<style type="text/css">
	  body { background-color: <?php echo get_option($shortname.'_custom_background_color',''); ?>; }
	</style>
<?php } ?>

<div id="main_container">

	<div id="sidebar">

		<?php if(get_option($shortname.'_custom_logo_url','') != "") { ?>
		  <a href="<?php bloginfo('url'); ?>"><img src="<?php echo stripslashes(stripslashes(get_option($shortname.'_custom_logo_url',''))); ?>" class="logo" alt="logo" style=""/></a>
		<?php } else { ?>
		  <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.jpg" class="logo" alt="logo" /></a>
		<?php } ?>            
			<ul id="menu2" class="menu" style="">		<li id="menu-item-744" class="menu-item menu-alone">		<a href="http://hoti.tv/g/electronica/">Menu</a></li></ul>
<!--	
		<ul>
			<li><a href="#">HOME</a></li>
			<li><a href="#">ABOUT</a></li>
			<li><a href="#">BLOG</a></li>
			<li><a href="#">CONTACT</a></li>
		</ul>-->
		<?php wp_nav_menu('menu=header_menu&container=false&menu_id=menu'); ?>

		<!--
		<ul>
			<li><a href="#">GRAPHIC DESIGN</a></li>
			<li><a href="#">ARCHITECTURE</a></li>
			<li><a href="#">TYPOGRAPHY</a></li>
			<li><a href="#">WEB DESIGN</a></li>
		</ul>-->
		<?php wp_nav_menu('menu=category_menu&container=false&menu_id=cat_menu'); ?>
		
		<div class="clear"></div>
		
		<div class="side_text_cont">
			<?php echo stripslashes(stripslashes(get_option($shortname.'_side_text',''))); ?>
		</div><!--//side_text_cont-->
		
		<div class="side_social">
			<?php if(get_option($shortname.'_twitter_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_twitter_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-icon.jpg" /></a>
			<?php } ?>
			
			<?php if(get_option($shortname.'_facebook_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_facebook_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook-icon.jpg" /></a>
			<?php } ?>
			
			<?php if(get_option($shortname.'_google_plus_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/google-plus-icon.jpg" /></a>
			<?php } ?>
			
			<?php if(get_option($shortname.'_dribbble_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_dribbble_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/dribbble-icon.jpg" /></a>
			<?php } ?>
			
			<?php if(get_option($shortname.'_pinterest_link','') != "") { ?>
				<a href="<?php echo get_option($shortname.'_pinterest_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pinterest-icon.jpg" /></a>
			<?php } ?>
			<div class="clear"></div>
		</div><!--//side_social-->
	</div><!--//sidebar-->
	
	<div id="content_cont">	