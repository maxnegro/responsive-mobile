<?php
/**
 * Post Meta Template
 *
 * The template used for displaying post meta data for the posts
 *
 * @package      ${PACKAGE}
 * @license      license.txt
 * @copyright    ${YEAR} ${COMPANY}
 * @since        ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<header class="entry-header">
	<?php if( is_single() ) {
		the_title( '<h1 class="entry-title post-title">', '</h1>' );
	} else {
		the_title( sprintf( '<h1 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
	} ?>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-meta">
			<?php responsive_post_meta_data(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link">
					<span class="mdash">&mdash;</span>
					<?php comments_popup_link( __( 'No Comments &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
				</span>
			<?php endif; ?>
		</div><!-- .post-meta -->
	<?php endif; ?>

</header><!-- .entry-header -->