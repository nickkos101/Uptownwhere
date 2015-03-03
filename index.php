<?php get_header(); ?>
<main>
    <section class="post-slider">
        <?php query_posts(array('posts_per_page' => 6)); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="slide">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
            <div class="overlay left">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><a href="<?php the_permalink(); ?>">Click to Read Blog Now</a></p>
            </div>
        </div>
        <?php } ?>
    <?php endwhile; else: ?>
<?php endif; ?>
</section>
<section class="solid">
    <?php query_posts(array('posts_per_page' => 6)); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post">
        <div class="container">
            <time><?php the_date(); ?></time>
            <h3><?php the_title(); ?></h3>
            <p class="category"><?php the_category(','); ?></p>
            <div class="content">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail(array('class' => 'featured-image'));
                }  ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"><div class="btn">Continue Reading</div></a>
            </div>
        </div>
    </div>
<?php endwhile; else: ?>
<?php endif; ?>
</section>
</main>
<?php get_footer(); ?>