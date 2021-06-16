<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>
<div class="category-page-wrapper">
<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide category-page-header">
		<?php //the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<h2 class="category-title"><?php single_cat_title( '',true )?></h2>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->
    <div class="category-post-wrapper">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article class="category-post-unit">
		    <?php if (has_post_thumbnail()) : ?>
                <a class="category-post-thumbnail-link" href="<?php echo get_the_permalink() ?>">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', ['class'=>'lazy'])?>
                </a>
		    <?php endif;?>
		    <div class="category-post-text">
		        <h3 class="category-post-title">
		            <a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
		        </h3>
		        <div class="category-post-meta-data">
		            <span class="category-post-author"><?php echo get_the_author(); ?></span>
		            <span class="category-post-date"><?php echo get_the_date( 'F j, Y' ) ?></span>
		            <span class="category-post-time"><?php echo get_the_date( 'g:i a' ) ?></span>
		        </div>
		        <div class="category-post-excerpt">
		            <p><?php echo wp_trim_words( get_the_content(), 15, '...' );?></p>
		        </div>
		        <a class="category-post-read-more" href="<?php echo get_the_permalink() ?>">
		            Read More » </a>
		    </div>
		</article>
	<?php endwhile; ?>
	</div>
	<div class="pagination-wrapper">
    <?php
        the_posts_pagination( array(
            'show_all' => false,
            'screen_reader_text' => " ",
            'prev_text'          => 'Previous',
            'next_text'          => 'Next',
        ) );
    ?>
    </div>

	<?php //twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>
