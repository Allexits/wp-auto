<footer class="footer">
    <div class="container">
      <div class="footer__inner">
        <a class="logo" href="#">
        <?php $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
          <img class="logo__img" src="<?php echo $custom_logo__url[0];?>" alt="logo">
        </a>

        <div class="social footer__social">
          <a class="social__link" href="#">
            <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/instagram.svg" alt="instagram icon">
          </a>
          <a class="social__link" href="#">
            <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/telegram.svg" alt="telegram icon">
          </a>
          <a class="social__link" href="#">
            <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/whatsapp.svg" alt="whatsapp icon">
          </a>
          <a class="social__link" href="#">
            <img class="social__img" src="<?php bloginfo('template_url'); ?>/assets/images/icon/facebook.svg" alt="facebook icon">
          </a>
        </div>

        <a class="footer__copy" href="/privacy-policy">
          Политика конфиденциальности
        </a>
      </div>
    </div>
  </footer>
  <?php wp_footer();?>
</body>

</html>