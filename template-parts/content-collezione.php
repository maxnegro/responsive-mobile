<?php
/**
 * Content Single Template
 *
 * The template used for displaying single posts
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<?php responsive_mobile_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php responsive_mobile_entry_top(); ?>
	<?php // get_template_part( 'template-parts/post-meta' ); ?>
	<div class="jumbotron" style="height: 300px; background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(<?= get_the_post_thumbnail_url() ?>); background-blend-mode: normal; background-size: cover; background-attachment: fixed;">
	<h1 style="color: #ffffff;"><?php the_title(); ?></h1>
	</div>
	<?php
	// Added filter to get featured_image option working.
	$featured_image = apply_filters( 'responsive_mobile_featured_image', '1' );
	if ( has_post_thumbnail() && $featured_image ) {
		// the_post_thumbnail('full', ['class' => 'img-responsive aligncenter']);
	} ?>

	<div class="post-entry">
		<div>
		<?php the_content(); ?>
		</div>
	</div><!-- .post-entry -->

	<div class="clearfix" style="margin-top: 20px"> </div>

		<div class="well well-lg">
			<h2>Informazioni per le visite</h2>
			<!-- <div class="container"> -->
				<div class="row">
			<?php
			$mm_icon = [
				'orari' => 'fas fa-clock',
				'prezzi' => 'fas fa-euro',
				'telcellulare' => 'fas fa-mobile',
				'telfisso' => 'fas fa-phone',
				'email' => 'fas fa-envelope',
				'web' => 'fas fa-globe',
				'facebook' => 'fab fa-facebook',
				'instagram' => 'fab fa-instagram',
				'fulladdress' => 'fas fa-map-marker'
			];
			$custom = get_post_custom();
			$custom["mostradimostre_main_fulladdress"][0] = sprintf("%s - %s %s %s",
				$custom['mostradimostre_main_indirizzo'][0],
				$custom['mostradimostre_main_cap'][0],
				$custom['mostradimostre_main_citta'][0],
				empty($custom['mostradimostre_main_provincia'][0]) ? "" : "(" . strtoupper($custom['mostradimostre_main_provincia'][0]) . ")"
			);
			foreach (array_keys($mm_icon) as $campo) {
				if (!empty($custom['mostradimostre_main_'.$campo][0])) {
					printf('<aside class="col-sm">');
					printf('<div class="iconbox">');
					printf('<div class="icon-wrap"><i class="%s"></i></div> ', $mm_icon[$campo]);
					// printf('<div class="icon-wrap"><span class="glyphicon glyphicon-%s" aria-hidden="true"></span></div> ', $mm_icon[$campo]);
					switch ($campo) {
						case 'email':
							printf('<div class="text-wrap"><p><a href="mailto:%s">%s</a></p></div>', $custom['mostradimostre_main_'.$campo][0], $custom['mostradimostre_main_'.$campo][0]);
							break;
						case 'web':
						case 'facebook':
						case 'instagram':
							printf('<div class="text-wrap"><p><a href="%s" rel="nofollow" target="_blank">%s</a></p></div>', $custom['mostradimostre_main_'.$campo][0], $custom['mostradimostre_main_'.$campo][0]);
							break;
						default:
							printf('<div class="text-wrap"><p>%s</p></div>', $custom['mostradimostre_main_'.$campo][0]);
					}
					printf("</div>\n");
					printf("</aside>\n");
				}
			}
			if (!empty($custom['mostradimostre_main_fulladdress'][0])) {
				printf('<div>');
				printf('<iframe style="width: 100%%; height: 480px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=%s&z=14&output=embed"></iframe>', $custom['mostradimostre_main_fulladdress'][0]);
				printf('</div>');
			}
			?>
				</div>
			<!-- </div> -->
		</div>
	<?php
		wp_link_pages( array(
			'before' => '<div class="pagination">' . __( 'Pages:', 'responsive-mobile' ),
			'after'  => '</div>',
		) );
	?>
	<?php get_template_part( 'template-parts/post-data' ); ?>
	<?php responsive_mobile_entry_bottom(); ?>
</article><!-- #post-## -->
<?php responsive_mobile_entry_after(); ?>