<?php if ( is_active_sidebar( 'promotion-widgets' ) && is_single() ) : ?>
  <div class="promotions">
    <?php dynamic_sidebar( 'promotion-widgets' ); ?>
  </div>
<?php endif; ?>