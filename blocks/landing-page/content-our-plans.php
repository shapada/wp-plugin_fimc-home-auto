<?php
/**
 * Block Name: Our Plans
 *
 * This is the template that displays the our plans section.
 */
$heading = get_field( 'heading' );
$text    = get_field( 'text' );
?>

<section id="our-plans">
  <div class="our-plans-header">
      <h2><?php echo esc_html( $heading ); ?></h2>
      <p><?php echo esc_html( $text ); ?></p>
  </div>
  <div class="check-availability">
      <div class="header">
          <img src="http://fimc.test/wp-content/uploads/2019/11/icon-location.png">
          <span>Check Availability in Your State:</span>
          <div class="state-select">
            <?php readfile( FIMC_CORE_ABSURL . 'template-parts/state-select.php' ); ?>
            <!-- <select class="states">
                <option>Select State</option>
            </select> -->
        </div>
      </div>
      <?php if( have_rows( 'plans' ) ): ?>
        <div class="plans">
          <?php while( have_rows( 'plans' ) ): the_row(); ?>
            <div class="plan">
                <img src="<?php echo esc_html( the_sub_field( 'icon' ) ); ?>">
                <h3><?php esc_html( the_sub_field( 'heading' ) ); ?></h3>
                <p><?php esc_html( the_sub_field( 'text' ) ); ?></p>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
  </div>
</section>