<?php get_header(); ?>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="page">
        <div class="container">
            <div class="col-wrap">
                <div class="column third">
                    <div class="sidebar">
                     <?php dynamic_sidebar( 'sidebar-1' ); ?>
                 </div>
             </div>
             <div class="column two-thirds">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>