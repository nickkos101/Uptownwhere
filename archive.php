<?php get_header(); ?>
<main class="blog-post">
    <?php $current_category = single_cat_title("", false); ?>
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
    <?php query_posts(array('posts_per_page' => 6, 'post_status'=>'publish', 'category_name' => $current_category, 'paged' => $paged)); ?>
    <div class="column two-thirds">
        <div class="snapshot-wrapper full-height-minus-header">
        <?php if ( have_posts() ) : ?>
           <div class="acf-map">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php $location = get_field('location'); ?>
            <?php if($location) : ?>
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
              <a href="<?php the_permalink(); ?>"><img class="map-post-image" src="<?php the_field('slider_image'); ?>" /></a>
              <a href="<?php the_permalink(); ?>"><h4 class="map-marker"><?php the_title(); ?></h4></a>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php rewind_posts(); ?>
            </div>
            <div class="adjust-upwards page-curl shadow-top-bottom shadow-right">
                <div class="caption"><h2><?php echo $current_category; ?></h2></div>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="column third">
        <div class="fillbox full-height-minus-header">
            <div class="instagram-feed half-height-minus-header">
                <?php instaGramFeed('6091623','6091623.1677ed0.5300f6f043414420a5c901a4a5fd06f8'); ?>
         </div>
            <div class="slider">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="slide-post vignette cover three-s-transition half-height-minus-header <?php the_field('image_position'); ?>" style="background-image: url(<?php the_field('slider_image'); ?>);" > 
                <div class="caption-spacer eighth-height-minus-header block"></div>    
                <div class="caption-spacer eighth-height-minus-header block"></div>  
                <div class="caption-spacer eighth-height-minus-header block"></div>             
                <div class="small-caption">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                </div>
            </div> 
  <?php endwhile; ?>
<?php rewind_posts(); ?>
            </div>
    </div>
</div>

                <?php while ( have_posts() ) : the_post(); ?>
                <div class="column full post-roll"><div class="spacer">
                <div class="column third"><a href="<?php the_permalink(); ?>"><img src="<?php the_field('slider_image'); ?>" /></a></div>
                <div class="column two-thirds">
                    <div class="spacer">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php $opentext = get_field('opening_text'); if($opentext) { ?>
                        <?php echo preg_replace('/\s+?(\S+)?$/', '', substr($opentext, 0, 201)). "..."; ?>
                        <?php } ?>
                        <div class="block">
                        <a class="button clear-fix purple" href="<?php the_permalink(); ?>">Read Now</a>
                        </div>
                    </div>
                </div>
                </div></div>
                <?php endwhile; ?>


</main>
<?php get_footer(); ?>