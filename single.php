<?php get_header(); ?>
<main class="blog-post">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="column <?php if ( wp_is_mobile() ) { ?>full<?php } else { ?>two-thirds<?php } ?>">
    <div class="slide-post vignette cover three-s-transition full-height-minus-header-important <?php the_field('image_position'); ?>" style="background-image: url(<?php the_field('slider_image'); ?>);" >
    </div>
    <div class="adjust-upwards page-curl shadow-top-bottom shadow-right">
      <div class="caption">
        <h2><small class="cursive">Now Reading //</small> <?php the_title(); ?></h2>
      </div>
    </div>
  </div>
  <?php if ( wp_is_mobile() ) { } else { ?>
  <div class="column third">
    <div class="snapshot-wrapper full-height-minus-header">
      <div class="acf-map">
        <?php $location = get_field('location'); ?>
        <?php if($location) : ?>
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          <a href="<?php the_permalink(); ?>"><img class="map-post-image" src="<?php the_field('slider_image'); ?>" /></a>
          <a href="<?php the_permalink(); ?>"><h4 class="map-marker"><?php the_title(); ?></h4></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php } ?>
<div id="main" class="column <?php if ( wp_is_mobile() ) { ?>full<?php } else { ?>two-thirds<?php } ?>">
  <div class="spacer dashed-bottom">
    <?php if ( wp_is_mobile() ) { } else { ?>
    <div class="column half">
      <div class="fb-like" data-share="true" data-width="100%" data-show-faces="true"></div>
    </div>
    <?php } ?>
    <div class="column <?php if ( wp_is_mobile() ) { ?>full<?php } else { ?>half<?php } ?> talignright">
      <date><?php the_date(); ?></date>
      <?php if($location) : ?>
      <div class="clear-fix">
        <i class="fa fa-map-marker"></i>
        <p class="address cursive"><?php echo $location['address']; ?></p>
      </div>
    <?php endif; ?>
    <?php $photographer = get_field('photographer'); ?>
    <?php if($photographer) : ?>
    <div class="clear-fix">
      <i class="fa fa-camera-retro"></i>
      <p class="photographer cursive"> 
        <?php if($photographer == 'Inspyre Group') : ?>
        <a href="http://inspyregroup.com" target="_blank" title="San Diego Web Design &amp; Photography">
        <?php endif; ?>
        <?php echo $photographer; ?>
        <?php if($photographer == 'Inspyre Group') : ?>
      </a>
    <?php endif; ?>
  </p>
</div>
<?php endif; ?>
</div>

</div>
<div class="cute-spacer">
  <?php $opentext = get_field('opening_text'); if($opentext) { echo $opentext; } ?>
  <?php $imagetext = get_sub_field('photo_paragraph'); if($imagetext) { echo $opentext; } else {}?>
  <?php if( have_rows('image_uploads')) : while( have_rows('image_uploads') ) : the_row(); ?>
  <?php $image_src = get_sub_field('image'); $paragraph_text = get_sub_field('photo_paragraph'); ?>
  <?php if($image_src) : ?>
  <a href="<?php echo $image_src; ?>" data-lightbox="Uptown Where" data-title="<?php the_title(); ?>"><img class="main-images" src="<?php echo $image_src; ?>" /></a>
<?php endif; ?>
<?php if($paragraph_text) : ?>
  <?php echo $paragraph_text; ?>
<?php endif; ?>
<?php endwhile; endif; ?>
<?php $closetext = get_field('closing_text'); if($closetext) { echo $closetext; } ?>
<?php $shoplook = get_field('shop_the_look'); if($shoplook) : ?>
  <div class="shop-look full-dash spacer">
    <h4 class="thin row-padding cursive">Shop The Look</h4>
    <?php while( have_rows('shop_the_look') ) : the_row();?>
    <div class="column half row-padding underline">
      <div class="column-spacer white-bg full-border shop-box">
      <?php $productlocation = get_sub_field('product_location') ; if($productlocation) : ?>
      <h6 class="underline cursive"><?php the_sub_field('product_location'); ?></h6>
    <?php endif; ?>
    <?php $producturl = get_sub_field('product_url') ; if($producturl) : ?>
    <div id="preview-container"><a class="preview" href="<?php the_sub_field('product_url'); ?>"></a></div>
  <?php endif; ?>
</div>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
</div>
</div>
<div class="column <?php if ( wp_is_mobile() ) { ?>full<?php } else { ?>third<?php } ?>">
  <div class="off-white spacer-grande dashed-left">
    <h4 class="cursive thin row-padding underline">My Latest Posts</h4>
      <?php // get post loop
      $this_post = get_the_id();
      $posts = get_posts(array(
        'posts_per_page'    => 10,
        'post_type'         => 'post',
        'post__not_in' => array($this_post)
        ));

      if( $posts ):
        ?>
      <?php $i = 0; foreach( $posts as $post ): 
      setup_postdata( $post ) ?>
      <div class="row-spacer row-padding underline">
        <?php $locationloop = get_field('location'); ?>
        <?php $slider_image_src = get_field('slider_image'); ?>
        <?php if($slider_image_src) : ?>
        <a href="<?php the_permalink(); ?>"><div class="vignette"><div class="image-block cover three-s-transition <?php the_field('image_position'); ?>" style="background-image:url(<?php echo $slider_image_src; ?>);"></div></div></a>
      <?php endif; ?>
      <div class="column two-thirds">
        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
        <?php if($locationloop) : ?>
        <div class="related">
          <h6 class="cursive" ><small><i class="fa fa-map-marker"></i> <?php echo $locationloop['address']; ?></small></h6>
        </div>
      <?php endif; ?>
    </div>
    <div class="column third talignright">
      <h6 class="cursive" ><small><?php the_date(); ?></small></h6>
    </div>
  </div>
  <?php $i++; endforeach; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
</div>
  <div id="sticker" class="page-curl2 shadow-bottom2">
    <div class="off-white spacer-grande dashed-left dashed-bottom">
      <div class="row-padding underline overline share-buttons">
        <h4 class="thin inline-block right-spacer-large"><small><i>share:</i></small></h4><?php echo do_shortcode('[ssba]'); ?>
      </div>
      <h4 class="cursive thin row-spacer">Write a note...</h4>
      <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="2" data-colorscheme="light">
      </div>
    </div>
  </div>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>