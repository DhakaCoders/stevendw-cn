<?php 
get_header(); 
$thisID = get_the_ID();
$imgID = get_post_thumbnail_id($thisID);
$banner = !empty($imgID)? cbv_get_image_src($imgID): banner_placeholder();
?>
<section class="page-banner-cntlr has-post-date">
  <div class="page-banner">
    <div class="bnr-bg-overly"></div>
    <div class="page-banner-bg inline-bg" style="background:url(<?php echo $banner; ?>);"></div>
    <div class="page-bnr-des">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-bnr-des-inr">
              <div class="page-bnr-title-ctlr">
                <h1 class="page-bnr-title fl-h2"><?php the_title(); ?></h1>
                <div class="page-bnr-post-date">
                  <strong class="post-date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></strong>
                  <i class="hide-sm">
                    <svg class="page-bnr-post-date-icon-svg" width="50" height="35" viewBox="0 0 50 35" fill="#2DAB52">
                    <use xlink:href="#page-bnr-post-date-icon-svg"></use> </svg>
                  </i>
                  <i class="show-sm">
                    <svg class="page-bnr-post-date-icon-xs-svg" width="35" height="51" viewBox="0 0 35 51" fill="#2DAB52">
                    <use xlink:href="#page-bnr-post-date-icon-xs-svg"></use> </svg>
                  </i>
                </div>
              </div>
              <div class="sdw-back-btn-ctlr">
                <a href="javascript:history.go(-1)">
                  <?php _e('Back to OVerview', 'stevendw'); ?>
                  <i class="back-btn-icon">
                    <svg class="back-btn-arrow-svg" width="85" height="10" viewBox="0 0 85 10" fill="#ACAFB0">
                    <use xlink:href="#back-btn-arrow-svg"></use> </svg>
                  </i>
                  <!-- <i class="back-btn-icon-hover">
                    <svg class="back-btn-arrow-hover-svg" width="85" height="10" viewBox="0 0 85 10" fill="#ACAFB0">
                    <use xlink:href="#back-btn-arrow-hover-svg"></use> </svg>
                  </i> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="innerpage-con-wrap">
  <div class="innerpage-lft-img">
    <img src="<?php echo THEME_URI; ?>/assets/images/inr-lft-img.jpg">
  </div>
  <article class="default-page-con" id="news-details"> 
    <div class="block">
      <div class="dfp-social-media-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                <div class="dfp-social-media-module-inr">
                  <div class="dfp-social-media-title">
                    <strong><?php _e('Share article', 'stevendw'); ?>:</strong>
                  </div>
                  <div class="dfp-social-media">
                    <ul class="reset-list clearfix">
                      <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>">
                          <i>
                            <svg class="facebook-icon" width="10" height="18" viewBox="0 0 10 18" fill="#141414">
                            <use xlink:href="#facebook-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&text=<?php echo get_the_title(); ?>">
                          <i>
                            <svg class="twitter-icon" width="23" height="18" viewBox="0 0 23 18" fill="#141414">
                            <use xlink:href="#twitter-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>">
                          <i>
                            <svg class="linkedin-icon" width="18" height="18" viewBox="0 0 18 18" fill="#141414">
                            <use xlink:href="#linkedin-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php while ( have_rows('inhoud') ) : the_row();  ?>
    <?php 
      if( get_row_layout() == 'introductietekst' ){ 
      $fctitle = get_sub_field('titel');
    ?>
    <div class="block">
      <div class="dfp-promo-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php if( !empty($fctitle) ):?>
              <div class="block-850">
                <div class="dfp-promo-module-des">
                  <?php printf('<strong class="dfp-promo-module-title fl-h1">%s</strong>', $fctitle); ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    }elseif( get_row_layout() == 'afbeelding' ){ 
      $afbeelding = get_sub_field('fc_afbeelding');
      $layout = get_sub_field('afbeelding_layout');
    ?>
    <?php if( $layout == 'box' ): ?>
    <div class="block">
      <div class="dfp-full-img-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                <?php echo !empty($afbeelding)? cbv_get_image_tag($afbeelding): ''; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div class="block">
      <div class="dfp-promo-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="dfp-one-img-plate-bx">
                <?php echo cbv_get_image_tag($afbeelding); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php 
    }elseif( get_row_layout() == 'teksteditor' ){ 
      $beschrijving = get_sub_field('fc_teksteditor');
    ?>
    <div class="block">
      <div class="dfp-text-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                <?php if( !empty( $beschrijving ) ) echo wpautop($beschrijving); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    }elseif( get_row_layout() == 'afbeelding_tekst' ){ 
      $fc_afbeelding = get_sub_field('fc_afbeelding');
      $imgsrc = cbv_get_image_src($fc_afbeelding);
      $imgtag = cbv_get_image_tag($fc_afbeelding);
      $fc_tekst = get_sub_field('fc_tekst');
      $positie_afbeelding = get_sub_field('positie_afbeelding');
      $imgposcls = ( $positie_afbeelding == 'right' ) ? ' fl-dft-rgtimg-lftdes' : '';
    ?>
      <div class="block">
        <div class="fl-dft-overflow-module">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block-850">
                  <div class="fl-dft-lftimg-rgtdes clearfix<?php echo $imgposcls; ?>">
                    <div class="fl-dft-lftimg-rgtdes-lft">
                      <div class="inline-bg" style="background-image: url(<?php echo $imgsrc; ?>);"></div>
                      <?php echo $imgtag; ?>
                    </div>
                    <div class="fl-dft-lftimg-rgtdes-rgt">
                      <?php echo wpautop($fc_tekst); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php 
    }elseif( get_row_layout() == 'galerij' ){ 
      $galleries = get_sub_field('fc_afbeeldingen');
      $inline_image = get_sub_field('show_inline_afbeelding');
      $lightbox = get_sub_field('lightbox');
      $kolom = get_sub_field('kolom'); 
      $hasinline_class = ($inline_image)?'has-inline-bg ':'';
      if($galleries):
    ?>
    <div class="block">
      <div class="dfp-gallery-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                <div class="<?php echo $hasinline_class; ?>gallery-wrap clearfix">
                    <div class="gallery gallery-columns-2">
                      <?php foreach( $galleries as $image ): ?>
                      <figure class="gallery-item">
                        <div class="gallery-icon portrait">
                        <?php 
                          if( $lightbox ){
                            echo "<a data-fancybox='gallery' href='{$image['url']}'>";
                            echo '<div class="gallery-icon-img inline-bg" style="background: url('.cbv_get_image_src( $image['id'], 'dfpageg1' ).');"></div>';
                            echo cbv_get_image_tag( $image['id'], 'dfpageg1' );
                            echo "</a>";
                          }else{
                            echo '<div class="gallery-icon-img inline-bg" style="background: url('.cbv_get_image_src( $image['id'], 'dfpageg1' ).');"></div>';
                            echo cbv_get_image_tag( $image['id'], 'dfpageg1' );
                          }
                        ?>
                        </div>
                      </figure>
                      <?php endforeach; ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
      <?php }elseif( get_row_layout() == 'fcsolutions' ){
      $fc_solutions = get_sub_field('fc_solutions');
      if($fc_solutions):
      ?>
      <div class="block">
        <div class="dfp-grd-module">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="dfp-grd-module-inr dfpGrdSlider clearfix">
                  <?php foreach($fc_solutions as $fc_sols): ?>
                  <div class="dfp-grd-item">
                    <div class="slsn-bsns-item">
                      <div class="slsn-bsns-item-image mHc">
                        <?php 
                          if( !empty($fc_sols['knop']) ) printf( '<a href="%s">', $fc_sols['knop'] ); 
                          if( !empty($fc_sols['fc_afbeelding']) ) echo cbv_get_image_tag($fc_sols['fc_afbeelding']);
                          if( !empty($fc_sols['knop']) ) printf( '</a>'); 
                        ?>
                      </div>
                      <div class="slsn-bsns-item-desc-cntlr">
                        <div class="mHc1">
                          <h3 class="slsn-bsns-item-title fl-h4 ">
                            <?php 
                              if( !empty($fc_sols['knop']) ) printf( '<a href="%s">', $fc_sols['knop'] ); 
                              if( !empty($fc_sols['titel']) ) printf( '%s', $fc_sols['titel'] ); 
                              if( !empty($fc_sols['knop']) ) printf( '</a>'); 
                            ?>
                          </h3>
                        </div>
                        <div class="slsn-bsns-item-desc">
                          <?php if( !empty($fc_sols['fc_tekst']) ) echo wpautop($fc_sols['fc_tekst']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <?php }elseif( get_row_layout() == 'platea_sagittis' ){
      $fc_titel = get_sub_field('fc_titel');
      $fc_tekst = get_sub_field('fc_tekst');
      ?>
      <div class="block">
        <div class="dfp-title-des-module">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="dfp-title-des-module-inr">
                  <div class="title-desc-module">
                    <div class="title-desc-module-lft">
                      <?php if( !empty($fc_titel) ) printf( '<h2 class="title-desc-module fl-h2">%s</h2>', $fc_titel ); ?>
                    </div>
                    <div class="title-desc-module-rgt">
                      <?php if( !empty($fc_sols['fc_tekst']) ) echo wpautop($fc_sols['fc_tekst']); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'table' ){
      $fc_table = get_sub_field('fc_tafel');
      $fc_titel = !empty(get_sub_field('fc_titel'))?get_sub_field('fc_titel'):'';
      ?>
      <div class="block">
        <div class="dfp-table-module">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block-850">
                  <?php
                    cbv_table($fc_table, $fc_titel);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }elseif( get_row_layout() == 'gap' ){
      $fc_gap = get_sub_field('fc_gap');
      $hidexs = get_sub_field('hide_mobile');
      $hideclass = $hidexs?' class="hide-sm"':'';
      ?>
      <div class="block">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div style="height:<?php echo $fc_gap; ?>px"<?php echo $hideclass; ?>></div>
        </div>
      </div>
      </div>
      </div>
      <?php }elseif( get_row_layout() == 'horizontal_line' ){ ?>
      <div class="block">
        <div class="dfp-text-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php endwhile; ?>
    <div class="block">
      <div class="dfp-social-media-module btm-social-media">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-850">
                <div class="dfp-social-media-module-inr">
                  <div class="dfp-social-media-title">
                    <strong><?php _e('Share article', 'stevendw'); ?>:</strong>
                  </div>
                  <div class="dfp-social-media">
                    <ul class="reset-list clearfix">
                      <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                          <i>
                            <svg class="facebook-icon" width="10" height="18" viewBox="0 0 10 18" fill="#141414">
                            <use xlink:href="#facebook-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&text=<?php echo get_the_title(); ?>" target="_blank">
                          <i>
                            <svg class="twitter-icon" width="23" height="18" viewBox="0 0 23 18" fill="#141414">
                            <use xlink:href="#twitter-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank">
                          <i>
                            <svg class="linkedin-icon" width="18" height="18" viewBox="0 0 18 18" fill="#141414">
                            <use xlink:href="#linkedin-icon"></use> </svg>
                          </i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</section>
<?php 
$newsg = get_field('related_nieuws', $thisID);
$newsobj = $newsg['selecteernieuws'];
if( empty($newsobj) ){
    $samterms = get_the_terms(get_the_ID(), 'category');
    $slugs = array();
    foreach( $samterms as $samterm ){
      $slugs[] = $samterm->slug;
    }
    $newsobj = get_posts( array(
      'post_type' => 'post',
      'posts_per_page'=> 2,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc',
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $slugs,
        )
      )

    ) );
    
}
if($newsobj):
?>
<section class="sdw-related-product-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sdw-related-product-sec-inr">
          <div class="sec-entry-hdr">
            <h2 class="sec-entry-hdr-title fl-h2"><?php echo !empty($newsg['titel'])? $newsg['titel']:__('Related Articles', 'stevendw'); ?></h2>
          </div>
          <div class="sdw-related-pro-grds relatedProGrdSlider clearfix">
            <?php 
              foreach( $newsobj as $news ):
              global $post;
              $imgID = get_post_thumbnail_id($news->ID);
              $rimgsrc = !empty($imgID)? cbv_get_image_src($imgID): nieuws_placeholder();
              $rimgtag = !empty($imgID)? cbv_get_image_tag($imgID): nieuws_placeholder('tag');
            ?>
            <div class="sdw-related-pro-grd-item">
              <div class="news-overview-grid-item">
                <div class="news-overview-grid-img-cntlr">
                  <a class="overlay-link" href="<?php echo get_permalink($news->ID); ?>"></a>
                  <div class="inline-bg" style="background-image: url(<?php echo $rimgsrc; ?>');"></div>
                  <?php echo $rimgtag; ?>
                </div>
                <div class="news-overview-grid-des"> 
                  <div class="news-overview-des-inner">
                    <h2 class="fl-h4"><a href="<?php echo get_permalink($news->ID); ?>"><?php echo $news->post_title; ?></a> </h2>
                    <?php echo wpautop($news->post_excerpt); ?>
                    <div class="sdw-grid-btn">
                      <a class="fl-read-more-btn" href="<?php echo get_permalink($news->ID); ?>"><?php _e('READ MORE', 'stevendw'); ?></a>
                    </div>
                    <div class="nod-post-date">
                      <strong class="post-date"><?php echo get_the_date('d', $news->ID); ?><br> <?php echo get_the_date('M', $news->ID); ?></strong>
                      <i>
                        <svg class="news-overviews-dots" width="50" height="65" viewBox="0 0 50 65" fill="#2DAB52">
                        <use xlink:href="#news-overviews-dots"></use> </svg>
                      </i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>