<?php
/**
 * Template Name: Contact Form (witout Sidebar)
 * The template for displaying contact form, only an example template.
 * No stylesheet or javascript includes on this example
 */
get_header(); ?>
		<div id="container">
			<div id="content" role="main">
			<?php
					while(have_posts()) {
						the_post();
						the_content();
						get_template_part('contact', 'form');
					} // end of the loop.
					?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>