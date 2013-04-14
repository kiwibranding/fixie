<?php get_header(); ?>

	<h1><?php echo get_bloginfo( 'name' ); ?></h1>
	<p class="description"><?php echo get_bloginfo( 'description' ); ?></p>

<?php if ( have_posts() ): ?>
	<div class="books">

		<?php while ( have_posts() ): the_post(); ?>
			<div class="book-block">
				<div class="book-block-inner">
					<a href="<?php the_permalink(); ?>" class="book">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'book-cover' );
						} else {
							echo '<img src="' . get_template_directory_uri() . '/images/missing-book-cover.png" alt="missing cover image">';
						}
						?>
					</a>

					<div class="book-info">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						Last updated:
						<time><?php echo human_time_diff( get_the_modified_time( 'U' ) ); ?> ago</time>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</div>
<?php endif; ?>

<?php get_footer(); ?>