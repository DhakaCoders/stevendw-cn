<?php 
get_header(); 
$desc = get_field('page_404', 'options');
$btitle = $desc['banner_titel'];
$banner = $desc['afbeelding'];
if($banner || $btitle):
  $pagetitle = !empty($btitle)?$btitle:get_the_title();
  $afbeelding = !empty($banner)?cbv_get_image_src($banner):'';
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
                <h1 class="page-bnr-title fl-h1"><?php echo $pagetitle; ?></h1>
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
  <section class="page-404-sec-wrp">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-404-dsc-wrp">
            <h2 class="title-404">404!</h2>
            <?php 
              if( !empty($desc['titel']) ) printf('<span>%s</span>', $desc['titel']); 
              if( !empty($desc['beschrijving']) ) echo wpautop($desc['beschrijving']); 
            ?>
            <div class="page-404-btn clearfix">
              <a class="fl-green-btn" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'HOME', 'stevendw'  ); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>