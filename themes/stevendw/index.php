<?php 
get_header(); 
$thisID = get_option('page_for_posts');
$banner = get_field('banner', $thisID);
if($banner):
	$pagetitle = !empty($banner['titel'])?$banner['titel']:get_the_title($thisID);
	$afbeelding = !empty($banner['afbeelding'])?cbv_get_image_src($banner['afbeelding']):'';
?>
<section class="page-banner-cntlr">
  <div class="page-banner">
    <div class="bnr-bg-overly"></div>
    <div class="page-banner-bg inline-bg" style="background:url(<?php echo $afbeelding; ?>);"></div>
    <div class="page-bnr-des">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-bnr-des-inr">
              <div class="page-bnr-title-ctlr">
            	<?php if(!empty($pagetitle )) printf('<h1 class="page-bnr-title fl-h1">%s</h1>', $pagetitle); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="page-position-cntlr">
  <section class="news-overview-grids-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        	<?php if(  have_posts() ): ?>
          <div class="news-overview-grid-sec-cntlr">
          	
            <ul class="reset-list clearfix news-overview-grid-items-cntlr">
              <?php 
                  while(have_posts()): the_post(); 
                  global $post;
                  $imgID = get_post_thumbnail_id(get_the_ID());
                  $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): nieuws_placeholder();
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): nieuws_placeholder('tag');
              ?>
              <li class="sdw-masonry-item">
                <div class="news-overview-grid-item">
                  <div class="news-overview-grid-img-cntlr">
                    <a class="overlay-link" href="<?php the_permalink(); ?>"></a>
                    <div class="inline-bg" style="background-image: url(<?php echo $imgsrc; ?>);"></div>
                    <?php echo $imgtag; ?>
                  </div>
                  <div class="news-overview-grid-des"> 
                    <div class="news-overview-des-inner">
                      <h2 class="fl-h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                      <?php the_excerpt(); ?>
                      <div class="sdw-grid-btn">
                        <a class="fl-read-more-btn" href="<?php the_permalink(); ?>"><?php _e('READ MORE', 'stevendw'); ?></a>
                      </div>
                      <div class="nod-post-date">
                        <strong class="post-date"><?php echo get_the_date('d'); ?><br> <?php echo get_the_date('M'); ?></strong>
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
          <?php endwhile; ?>
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
				  'prev_text' => __('<i><svg class="pagi-left-arrow" width="18" height="30" viewBox="0 0 18 30" fill="#2DAB52"><use xlink:href="#pagi-left-arrow"></use></svg></i>'),
				  'next_text' => __('<i><svg class="pagi-right-arrow" width="18" height="30" viewBox="0 0 18 30" fill="#2DAB52"><use xlink:href="#pagi-right-arrow"></use></svg></i>'),
				  'format'    => '?paged=%#%',
				  'current'   => $current,
				  'total'     => $wp_query->max_num_pages
				) );
			?>
          </div>
          <?php endif; ?>
          <?php else: ?>
              <?php $no_results = get_field('no_results', 'options'); ?>
              <div class="notfound">
                <?php echo !empty($no_results)? $no_results: __('Geen resultaat', 'stevendw'); ?>
              </div>
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