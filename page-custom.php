<?php
/*
Template Name: Custom Page Example
*/
?>








			<?php get_header(); ?>
			
			<div class="page-header">
				<?php 

				$image = get_field('header_background');
				$parent_image = get_field('header_background', wp_get_post_parent_id( $post_ID ));

				if( !empty($image) ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php elseif( !empty($parent_image) ): ?>
					<img src="<?php echo $parent_image['url']; ?>" alt="<?php echo $parent_image['alt']; ?>" />
				<?php endif; ?>	

				<?php

				$header = get_field('header_heading');
				$parent_header = get_field('header_heading', wp_get_post_parent_id( $post_ID ));

				if( !empty($header) ): ?>
					<h3 class="image-title-bar"><?php echo $header; ?></h3>
				<?php elseif( !empty($parent_header) ): ?>
					<h3 class="image-title-bar"><?php echo $parent_header; ?></h3>
				<?php endif; ?>	
			</div>


			<div class="content-wrap">
				
				<div class="content">
			
					<div class="tabs-menu"><?php bones_main_nav(); ?></div>
					<div id="inner-content" class="wrap clearfix">
				
						<div id="main" class="first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
							
								<h1 class="page-title"><?php the_title(); ?></h1>

								<section class="entry-content">
									<?php the_content(); ?>
								</section> <!-- end article section -->
							
								<footer class="article-footer">
									<p class="clearfix"><?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
								
								</footer> <!-- end article footer -->
								
								<?php comments_template(); ?>
						
							</article> <!-- end article -->
						
							<?php endwhile; ?>	
						
							<?php else : ?>
						
								<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
									</section>
									<footer class="article-footer">
										<p><?php _e("This is the error message in the page-custom.php template.", "bonestheme"); ?></p>
									</footer>
								</article>
						
							<?php endif; ?>
				
						</div> <!-- end #main -->
						
					</div> <!-- end #inner-content -->

				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
