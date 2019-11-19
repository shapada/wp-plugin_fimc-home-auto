<?php
/**
 * Block Name: Powered By
 *
 * This is the template that displays the powered by section.
 **/
?>
<section id="powered-by">
    <div class="powered-by-icon">
        <h3>Powered by</h3>
        <img src="<?php esc_url( the_field( 'icon' ) ); ?>" />
    </div>
    <div class="powered-by-text"><?php esc_html( the_field( 'text' ) ); ?></div>
</section>