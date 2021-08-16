<?php 
get_header(); 
$thisID = get_the_ID();
$imgID = get_post_thumbnail_id($thisID);
$banner = !empty($imgID)? cbv_get_image_src($imgID): banner_placeholder();
?>
<section class="page-banner-cntlr">
  <div class="page-banner">
    <div class="bnr-bg-overly"></div>
    <div class="page-banner-bg inline-bg" style="background:url(<?php echo $banner; ?>);"></div>
    <div class="page-bnr-des">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-bnr-des-inr">
              <div class="page-bnr-title-ctlr">
                <h1 class="page-bnr-title fl-h1"><?php the_title(); ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="innerpage-con-wrap">
  <div class="innerpage-lft-img hide-sm">
    <img src="<?php echo THEME_URI; ?>/assets/images/inr-lft-img.jpg">
  </div>
  <article class="default-page-con"> 
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
                  <?php printf('<strong class="dfp-promo-module-title fl-h2">%s</strong>', $fctitle); ?>
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
      <?php }elseif( get_row_layout() == 'fc_cases' ){
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
                      <div>
                        <?php if( !empty($fc_sols['fc_tekst']) ) echo wpautop($fc_sols['fc_tekst']); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
        $dieobj = get_sub_field('selecteer_cases');
        if( empty($dieobj) ){
          $dieobj = get_posts( array(
            'post_type' => 'cases',
            'posts_per_page'=> 4,
            'orderby' => 'date',
            'order'=> 'desc'

          ) );
            
        }
        if($dieobj):
      ?>
      <div class="block">
        <div class="dfp-pro-slider-module">
          <div class="footer-top-cntlr">
            <div class="footer-top-gdr elementGridSlider clearfix">
              <?php 
                foreach( $dieobj as $die ):
                global $post;
                $imgID = get_post_thumbnail_id($die->ID);
                $rimgsrc = !empty($imgID)? cbv_get_image_src($imgID): diensten_placeholder();
              ?>
              <div class="ftr-top-grid-item-wrap">
                <div class="ftr-top-grid-item-cntlr">
                  <div class="ftr-top-grid-item">
                    <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo $rimgsrc; ?>');">

                    </div>
                    <div class="ftr-top-grid-item-btm">
                      <div class="sdw-service-con">
                        <h3 class="ftr-top-grid-item-title fl-h4"><a href="<?php echo get_the_permalink($die->ID); ?>"><?php echo get_the_title($die->ID); ?></a></h3>
                      </div>
                      <div class="sdw-service-con-hover">
                        <h3 class="ftr-top-grid-item-title fl-h4"><a href="<?php echo get_the_permalink($die->ID); ?>"><?php echo get_the_title($die->ID); ?></a></h3>
                        <div class="ftr-top-grid-item-btm-desc">
                          <?php echo wpautop(get_the_excerpt($die->ID)); ?>
                        </div>
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
      <?php endif; ?>
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
  </article>
</section>  
<?php get_footer(); ?>