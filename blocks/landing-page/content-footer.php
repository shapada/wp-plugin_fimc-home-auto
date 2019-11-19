<?php
/**
 * Block Name: Footer
 *
 * This is the template that displays the powered by section.
 **/
?>
<footer>
    <div class="footer-content">
        <div class="primary-text"><?php html_entity_decode( the_field('primary_text') ); ?></div>
        <div class="secondary-text"><?php html_entity_decode( the_field('secondary_text') ); ?></div>
    </div>
    <div class="footer-logo">
        <img src="<?php esc_url( the_field( 'logo' ) ); ?>" />
    </div>
</footer>