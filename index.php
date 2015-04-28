<?php get_header(); ?>
<main>
    <div class="fold col-wrap ">
        <div class="column two-thirds">

            <div class="slider">

            <?php // get post loop
            $posts = get_posts(array(
                'posts_per_page'    => 8,
                'post_type'         => 'post'
            ));
            
            if( $posts ):
            ?>
            <?php $i = 0; foreach( $posts as $post ): 
            setup_postdata( $post ) ?>

            <div class="slide-post vignette cover three-s-transition full-height-minus-header-important <?php the_field('image_position'); ?>" style="background-image: url(<?php the_field('slider_image'); ?>);" >
                <div class="caption-spacer half-height-minus-header block"></div> 
                <div class="caption-spacer eighth-height-minus-header block"></div>                 
                <div class="caption">
                    <h2><a href="<?php the_permalink(); ?>"><?php if($i == 0) { ?><small class="cursive">latest &amp; greatest //</small> <?php } ?><?php the_title(); ?></a></h2>
                </div>
            </div>
            <?php $i++; endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div>
        </div>

        <div class="column third fillbox">
                    <?php if ( wp_is_mobile() ) { ?><div class="m-full"><?php } else { ?><div class="m-half"><?php } ?>
                    <div class="instagram-feed half-height-minus-header">
                        <?php instaGramFeed('6091623','6091623.1677ed0.5300f6f043414420a5c901a4a5fd06f8'); ?>
                    </div>
                </div>
                <?php if ( wp_is_mobile() ) { } else { ?>
                    <div class="m-half">
                    <div class="snapshot-wrapper half-height-minus-header neat-space">
            <?php // get post loop
            $posts = get_posts(array(
                'posts_per_page'    => 5,
                'post_type'         => 'post'
            ));
            
            if( $posts ): ?>
            <div class="acf-map">
            <?php foreach( $posts as $post ): 
            setup_postdata( $post ) ?>
            <?php $location = get_field('location'); ?>
            <?php if(get_field('location')) { ?>
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                <a href="<?php the_permalink(); ?>"><img class="map-post-image" src="<?php the_field('slider_image'); ?>" /></a>
                <a href="<?php the_permalink(); ?>"><h4 class="map-marker"><?php the_title(); ?></h4></a>
            </div>
            <?php } ?>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
            </div>
            <?php endif; ?> 
            </div>
        </div>
        <?php } ?>
    </div>
</div>
            <?php // get post loop
            $posts = get_posts(array(
                'posts_per_page'    => 8,
                'post_type'         => 'post'
            ));
            
            if( $posts ):
            ?>
            <?php $i = 0; foreach( $posts as $post ): 
            setup_postdata( $post ) ?>
                <div class="column full post-roll <?php if ( wp_is_mobile() ) { ?>taligncenter<?php } ?>"><div class="spacer">
                <?php if ( wp_is_mobile() ) { ?><div class="column full"><?php } else { ?><div class="column fourth"><?php } ?><a href="<?php the_permalink(); ?>"><img src="<?php the_field('slider_image'); ?>" /></a></div>
                <div class="column <?php if ( wp_is_mobile() ) { ?>full<?php } else { ?>three-fourths<?php } ?>">
                    <div class="spacer">
                        <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                        <?php $opentext = get_field('opening_text'); if($opentext) { ?>
                        <?php echo preg_replace('/\s+?(\S+)?$/', '', substr($opentext, 0, 201)). "..."; ?>
                        <?php } ?>
                        <div class="block">
                        <a class="button clear-fix purple" href="<?php the_permalink(); ?>">Read Now</a>
                        </div>
                    </div>
                </div>
                </div></div>
            <?php $i++; endforeach; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

</main>
<?php get_footer(); ?>