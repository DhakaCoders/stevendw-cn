<?php get_header(); ?>
<section class="page-banner-cntlr">
  <div class="page-banner">
    <div class="bnr-bg-overly"></div>
    <div class="page-banner-bg inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/page-bnr.png);"></div>
    <div class="page-bnr-des">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-bnr-des-inr">
              <div class="page-bnr-title-ctlr">
                <h1 class="page-bnr-title fl-h1">From the Blog</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="page-position-cntlr">
  <section class="news-overview-grids-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="news-overview-grid-sec-cntlr">
          	<?php if(  have_posts() ): ?>
            <ul class="reset-list clearfix news-overview-grid-items-cntlr">

              <li class="sdw-masonry-item">
                <div class="news-overview-grid-item">
                  <div class="news-overview-grid-img-cntlr">
                    <a class="overlay-link" href="#"></a>
                    <div class="inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/news-overview-grid-1.jpg);"></div>
                    <img src="<?php echo THEME_URI; ?>/assets/images/news-overview-grid-1.jpg" alt="">
                  </div>
                  <div class="news-overview-grid-des"> 
                    <div class="news-overview-des-inner">
                      <h2 class="fl-h4"><a href="#">Vitae volutpat rhoncus, sodales <br>sagittis enim purus.</a> </h2>
                      <p>Quis ullamcorper augue scelerisque mi tempus eget scelerisque volutpat, pulvinar. Et, et turpis malesuada nisi, tristique viverra aliquet proin ultrices.</p>
                      <div class="sdw-grid-btn">
                        <a class="fl-read-more-btn" href="#">READ MORE</a>
                      </div>
                      <div class="nod-post-date">
                        <strong class="post-date">02 <br> AUG</strong>
                        <i class="hide-sm">
                          <svg class="news-overviews-dots" width="50" height="65" viewBox="0 0 50 65" fill="#2DAB52">
                          <use xlink:href="#news-overviews-dots"></use> </svg>
                        </i>
                        <i class="show-sm">
                          <svg class="news-overviews-dots-sm" width="35" height="51" viewBox="0 0 50 65" fill="#2DAB52">
                          <use xlink:href="#news-overviews-dots-sm"></use> </svg>
                        </i>
                      </div>
                    </div>
                  </div>
                </div>  
              </li>
              
            </ul>
          </div>
          <?php 
          global $wp_query;
          if( $wp_query->max_num_pages > 1 ): 
          ?>
          <div class="fl-pagination-ctlr">
			<?php
				$big = 999999999; // need an unlikely integer
				$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

				echo paginate_links( array(
				  'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				  'type'      => 'list',
				  'prev_text' => __(''),
				  'next_text' => __(''),
				  'format'    => '?paged=%#%',
				  'current'   => $current,
				  'total'     => $wp_query->max_num_pages
				) );
			?>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <?php else: ?>
            <div class="notfound"><?php _e( 'Geen resultaat', 'ngf' ); ?>.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="left-circle hide-sm">
      <img src="<?php echo THEME_URI; ?>/assets/images/news-overview-circle-icon.jpg" alt="">
    </div>
    <div class="right-dots hide-sm">
      <img src="<?php echo THEME_URI; ?>/assets/images/news-overview-side-dots.jpg" alt="">
    </div>
  </section>
</div>
<?php get_footer(); ?>