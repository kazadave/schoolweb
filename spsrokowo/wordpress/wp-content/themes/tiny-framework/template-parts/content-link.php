<?php
/**
 * Template part for displaying link post formats
 *
 * Used for both single and index/archive/search.
 *
 * @package Tiny_Framework
 * @since Tiny Framework 1.0
 */
?>

	<?php tha_entry_before(); // custom action hook ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php tinyframework_semantics( 'post' ); // Function located in: inc/semantics.php ?>>

		<?php tha_entry_top(); // custom action hook ?>

		<header>
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title screen-reader-text" itemprop="headline">', '</h1><link itemprop="mainEntityOfPage" href="' . esc_url( get_permalink() ) . '">' );
				else :
					the_title( '<h2 class="entry-title screen-reader-text" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' );
				endif;
			?>

			<?php esc_html_e( 'Link', 'tiny-framework' ); ?>
		</header>

		<div class="entry-content" itemprop="articleBody">

			<?php tinyframework_post_content(); // Function located in: inc/template-tags.php ?>

		</div><!-- .entry-content -->

		<footer class="entry-meta">

			<?php
			// Functions located in: inc/template-tags.php
				tinyframework_entry_meta();
				tinyframework_edit_link();
			?>

		</footer><!-- .entry-meta -->

		<?php tha_entry_bottom(); // custom action hook ?>

	</article><!-- #post -->

	<?php tha_entry_after(); // custom action hook ?>