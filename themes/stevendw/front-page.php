<?php get_header(); ?>
<?php  
  $hbanner = get_field('home_banner', HOMEID);
  if($hbanner):
    $banner = !empty($hbanner['afbeelding'])? cbv_get_image_src( $hbanner['afbeelding'] ): '';
?>
  <section class="hm-banner">
    <span class="hm-banner-overlay" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/hm-banner-overlay.png');"></span>
    <div class="hm-banner-bg inline-bg" style="background-image: url('<?php echo $banner; ?>');">
    </div>
    <div class="hm-bnr-down-scroll downAnimate scrollto" data-to="#business-element-sec">
      <span class="hm-bnr-scroll-title">scroll</span>
      <span class="hm-bnr-scroll-icon scroll-icon-Animate">
        <img src="<?php echo THEME_URI; ?>/assets/images/arrow-scroll.png" alt="">
      </span>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-banner-cntlr">
            <div class="hm-bnr-desc">
              <?php if( !empty($hbanner['titel']) ) printf( '<h1 class="hm-bnr-title fl-h1">%s</h1>', $hbanner['titel'] ); ?>
              <?php if( !empty($hbanner['beschrijving']) ) echo wpautop($hbanner['beschrijving']); ?>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </section>
<?php endif; ?>
<?php
$showhideintro = get_field('showhideintro', HOMEID);
if($showhideintro): 
$intro = get_field('intro_text', HOMEID);
if($intro):
?>
  <div id="business-element-sec" class="business-element-sec-cntlr">
    <span class="business-element-man hide-sm">
      <img src="<?php echo THEME_URI; ?>/assets/images/business-element-man.png" alt="">
    </span>
    <div class="round-icon">
      <i>
        <svg class="round-icon" width="294" height="424" viewBox="0 0 294 424" fill="#292828">
          <use xlink:href="#round-icon"></use> 
        </svg>
      </i>
    </div>
    <section class="solutions-business-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="solutions-business-cntlr">
              <div class="sec-entry-hdr">
                <?php if( !empty($intro['titel']) ) printf( '<h2 class="sec-entry-hdr-title fl-h2">%s</h2>', $intro['titel'] ); ?>
                <div class="sec-entry-hdr-desc">
                  <?php if( !empty($intro['beschrijving']) ) echo wpautop( $intro['beschrijving'] ); ?>
                </div>
              </div>
              <div class="solutions-business-grd-cntlr">
                <div class="man-xs-img show-sm">
                  <img src="<?php echo THEME_URI; ?>/assets/images/man-xs-img.png" alt="">
                </div>
                <div class="slsn-bsns-item-ditet-icon">
                  <img src="<?php echo THEME_URI; ?>/assets/images/slsn-bsns-item-dotet-icon.svg" alt="">
                  <img src="<?php echo THEME_URI; ?>/assets/images/xs-green-dotet.png" alt="">
                </div>
                <?php if( !empty($solus = $intro['solutions']) ): ?>
                <div class="slsn-bsns-grd slsnBsnsSlider clearfix">
                  <?php 
                    $i = 1; foreach( $solus as $solu ): 
                  ?>
                  <div class="slsn-bsns-item-wrap">
                    <div class="slsn-bsns-item-cntlr<?php echo ($i <= 2 )? ' slsn-bsns-item-cntlr-'.$i: ''; ?> ">
                      <div class="slsn-bsns-item">
                        <div class="slsn-bsns-item-image">
                          <?php 
                              if( !empty($solu['knop']) ) printf( '<a href="%s">', $solu['knop'] ); 
                              if( !empty($solu['afbeelding']) ) echo cbv_get_image_tag($solu['afbeelding']);
                              if( !empty($solu['knop']) ) printf( '</a>'); 
                            ?>
                        </div>
                        <div class="slsn-bsns-item-desc-cntlr">
                          <h3 class="slsn-bsns-item-title fl-h4 ">
                            <?php 
                              if( !empty($solu['knop']) ) printf( '<a href="%s">', $solu['knop'] ); 
                              if( !empty($solu['titel']) ) printf( '%s', $solu['titel'] ); 
                              if( !empty($solu['knop']) ) printf( '</a>'); 
                            ?>
                              
                            </a>
                          </h3>
                          <div class="slsn-bsns-item-desc">
                            <?php if( !empty($solu['beschrijving']) ) echo wpautop($solu['beschrijving']); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; endforeach; ?>
                </div>
            	<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>
<?php endif; ?>
    <section class="element-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="element-sec-cntlr">
              <div class="title-desc-module">
                <div class="title-desc-module-lft">
                  <h2 class="title-desc-module fl-h2">Platea sagittis <br>elementum nisi.</h2>
                </div>
                <div class="title-desc-module-rgt">
                  <div>
                    <p>Semper eu a sit elit massa est. Pellentesque lorem aliquet fames pharetra et. Nulla bibendum varius nisl, vestibulum nunc sit. Tellus enim a tellus tortor feugiat. Et egestas penatibus nec scelerisque.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <section class="footer-top-cntlr">
    <div class="footer-top-gdr elementGridSlider clearfix">
      <div class="ftr-top-grid-item-wrap">
        <div class="ftr-top-grid-item-cntlr">
          <div class="ftr-top-grid-item">
            <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/element-item-img-001.jpg');">

            </div>
            <div class="ftr-top-grid-item-btm">
              <div class="sdw-service-con">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Graphic Design</a></h3>
              </div>
              <div class="sdw-service-con-hover">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Graphic Design</a></h3>
                <div class="ftr-top-grid-item-btm-desc">
                  <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="ftr-top-grid-item-wrap">
        <div class="ftr-top-grid-item-cntlr">
          <div class="ftr-top-grid-item">
            <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/element-item-img-002.jpg');">

            </div>
            <div class="ftr-top-grid-item-btm">
              <div class="sdw-service-con">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
              </div>
              <div class="sdw-service-con-hover">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
                <div class="ftr-top-grid-item-btm-desc">
                  <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ftr-top-grid-item-wrap">
        <div class="ftr-top-grid-item-cntlr">
          <div class="ftr-top-grid-item">
            <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/element-item-img-003.jpg');">

            </div>
            <div class="ftr-top-grid-item-btm">
              <div class="sdw-service-con">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
              </div>
              <div class="sdw-service-con-hover">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
                <div class="ftr-top-grid-item-btm-desc">
                  <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ftr-top-grid-item-wrap">
        <div class="ftr-top-grid-item-cntlr">
          <div class="ftr-top-grid-item">
            <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/element-item-img-001.jpg');">

            </div>
            <div class="ftr-top-grid-item-btm">
              <div class="sdw-service-con">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Graphic Design</a></h3>
              </div>
              <div class="sdw-service-con-hover">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Graphic Design</a></h3>
                <div class="ftr-top-grid-item-btm-desc">
                  <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ftr-top-grid-item-wrap">
        <div class="ftr-top-grid-item-cntlr">
          <div class="ftr-top-grid-item">
            <div class="ftr-top-grid-item-img inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/element-item-img-002.jpg');">

            </div>
            <div class="ftr-top-grid-item-btm">
              <div class="sdw-service-con">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
              </div>
              <div class="sdw-service-con-hover">
                <h3 class="ftr-top-grid-item-title fl-h4"><a href="#">Activity Title</a></h3>
                <div class="ftr-top-grid-item-btm-desc">
                  <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>