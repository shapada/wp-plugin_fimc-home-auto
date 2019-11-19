<?php
/**
 * Block Name: Navigation
 *
 * This is the template that displays the feature partners.
 */

 $logo = get_field( 'logo' );
 $text = get_field( 'text' );
?>
<header>
  <nav class="navbar">
      <a href="#" class="navbar-brand">
          <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="">
      </a>
      <div class="here-to-help">
        <?php echo html_entity_decode( $text ); ?>
      </div>
  </nav>
</header>