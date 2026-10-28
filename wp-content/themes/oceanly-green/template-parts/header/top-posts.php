<?php
/**
 * Template part for displaying the spotlight posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Oceanly_Green
 */

$oceanly_posts = Oceanly_Green_Top_Posts::options_query();
if ( ! $oceanly_posts ) {
	return;
}

$oceanly_query = $oceanly_posts['query'];
if ( ! $oceanly_query->have_posts() ) {
	return;
}

$oceanly_top_posts = 'top-posts';
if ( $oceanly_posts['options']['hover_show'] ) {
	$oceanly_top_posts .= ' top-posts-hover';
}
?>

<div class="top-posts-wrap c-wrap">
	<div class="<?php echo esc_attr( $oceanly_top_posts ); ?>">
	<?php
	while ( $oceanly_query->have_posts() ) {
		$oceanly_query->the_post();
		?>
		<div class="top-post top-post-<?php the_ID(); ?>">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" class="top-post-img-link" tabindex="-1"><?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'top-post-img' ) ); ?></a>
			<?php } ?>
			<div class="top-post-content">
				<?php
				if ( $oceanly_posts['options']['taxonomy'] ) {
					$oceanly_categories = get_the_category( get_the_ID() );
					if ( ! empty( $oceanly_categories ) ) {
						$oceanly_category = $oceanly_categories[0];
						?>
					<div class="top-post-term"><a href="<?php echo esc_url( get_category_link( $oceanly_category->term_id ) ); ?>"><?php echo esc_html( $oceanly_category->name ); ?></a></div>
						<?php
					} else {
						$oceanly_tags = get_the_tags( get_the_ID() );
						if ( ! empty( $oceanly_tags ) ) {
							$oceanly_tag = $oceanly_tags[0];
							?>
					<div class="top-post-term"><a href="<?php echo esc_url( get_tag_link( $oceanly_tag->term_id ) ); ?>"><?php echo esc_html( $oceanly_tag->name ); ?></a></div>
							<?php
						}
					}
				}
				$oceanly_overlay   = false;
				$oceanly_has_title = ( '' !== get_the_title() );
				if ( ( $oceanly_posts['options']['title'] && $oceanly_has_title ) || ( $oceanly_posts['options']['date'] ) ) {
					$oceanly_overlay = true;
				}

				if ( $oceanly_overlay ) {
					?>
				<div class="top-post-overlay">
					<?php
				}
				if ( $oceanly_posts['options']['title'] && $oceanly_has_title ) {
					?>
					<div class="top-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<?php
				}
				if ( $oceanly_posts['options']['date'] ) {
					?>
					<div class="top-post-date"><?php echo esc_html( get_the_date() ); ?></div>
					<?php
				}
				if ( $oceanly_overlay ) {
					?>
				</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}

	wp_reset_postdata();
	?>
	</div>
</div>
