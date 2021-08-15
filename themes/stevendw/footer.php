  <?php 
  $telefoon = get_field('telefoon', 'options');
  $email = get_field('emailadres', 'options');
  $smedias = get_field('social_media', 'options');
  $clientlogos = get_field('ft_clientlogos', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
  <footer class="footer-wrp">
    <span class="ftr-wave-line">
      <img src="<?php echo THEME_URI; ?>/assets/images/ftr-wave-line.png">
    </span>
    <span class="ftr-ornament-icon">
      <i>
         <img src="<?php echo THEME_URI; ?>/assets/images/ornament-icon.png">
      </i>
    </span>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-cntlr">
            <div class="ftr-top">
              <div class="ftr-hedding">
                <h2 class="ftr-title fl-h2"><?php _e('Get in touch', 'stevendw'); ?></h2>
              </div>
              <div class="ftr-desc-cntlr">
                <div class="ftr-desc">
                <?php 
                  if( !empty($email) ) printf('<div class="ftr-mail"><a href="mailto:%s">%s</a></div> ', $email, $email);  
                  if( !empty($telefoon) ) printf('<div class="ftr-tel"><a href="tel:%s">%s</a></div>', phone_preg($telefoon),  $telefoon); 
                ?>
                </div>
                <div class="ftr-socials">
                  <ul class="reset-list">
                    <?php if( !empty($smedias['facebook_url']) ): ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedias['facebook_url']; ?>">
                        <i>
                          <svg class="facebook-icon" width="10" height="18" viewBox="0 0 10 18" fill="#fff">
                            <use xlink:href="#facebook-icon"></use> 
                          </svg>
                        </i>
                      </a>
                    </li>
                    <?php endif; ?>
                    <?php if( !empty($smedias['twitter_url']) ): ?>
                     <li>
                      <a target="_blank" href="<?php echo $smedias['twitter_url']; ?>">
                        <i>
                          <svg class="twitter-icon" width="23" height="18" viewBox="0 0 23 18" fill="#fff">
                            <use xlink:href="#twitter-icon"></use> 
                          </svg>
                        </i>
                      </a>
                    </li>
                    <?php endif; ?>
                    <?php if( !empty($smedias['linkedin_url']) ): ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedias['linkedin_url']; ?>">
                        <i>
                          <svg class="linkedin-icon" width="18" height="18" viewBox="0 0 18 18" fill="#fff">
                            <use xlink:href="#linkedin-icon"></use> 
                          </svg>
                        </i>
                      </a>
                    </li>
                    <?php endif; ?>
                    <?php if( !empty($smedias['instagram_url']) ): ?>
                    <li>
                      <a target="_blank" href="<?php echo $smedias['instagram_url']; ?>">
                        <i>
                          <svg class="instagram-icon" width="18" height="18" viewBox="0 0 18 18" fill="#fff">
                            <use xlink:href="#instagram-icon"></use> 
                          </svg>
                        </i>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="ftr-btm">
              <div class="ftr-copyright">
                <?php if( !empty( $copyright_text ) ) printf( '<p>%s</p>', $copyright_text); ?> 
              </div>

              <div class="ftr-developed-by">
                <p>built by <a target="_blank" href="https://www.conversal.be/">conversal</a></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div> 
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>