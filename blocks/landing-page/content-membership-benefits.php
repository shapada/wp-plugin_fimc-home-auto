<?php
/**
 * Block Name: Membership Benefits
 *
 * This is the template that displays the feature partners.
 */
$heading    = get_field( 'heading' );
$text       = get_field( 'text' );
$icons        = get_field( 'icons' );
?>
<section id="benefits">
      <div class="benefits-text">
          <h2><?php echo esc_html( $heading ); ?></h2>
          <p><?php echo esc_html( $text ); ?></p>
      </div>
      <div class="benefits-icons">
        <?php if( have_rows( 'icons' ) ): ?>
          <ul>
            <?php while( have_rows( 'icons' ) ): the_row();  ?>
              <?php  
                $icon = get_sub_field( 'icon' );
                $heading = get_sub_field( 'heading' );
              ?>
              <li>
                <img src="<?php echo esc_url( $icon['url'] ); ?>">
                <?php echo esc_html( $heading ); ?>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
  </section>
