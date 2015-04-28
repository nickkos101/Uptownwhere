<?php /* Template Name: Full-Width Page */ ?>
<?php get_header(); ?>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="page full-pg">
        <div class="container">
            <div class="col-wrap">
             <div class="column full">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>