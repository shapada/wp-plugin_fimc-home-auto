<?php
/**
 * Block Name: Jumbotron
 *
 * This is the template that displays the feature partners.
 */

 $heading    = get_field( 'heading' );
 $text       = get_field( 'text' );
 $img        = get_field( 'image' );
 $button_text = get_field( 'button_text' ); 
 ?>

<section id="jumbotron" <?php echo ! empty( $img ) ? 'style="background-image: ' . esc_url( $img['url'] ) . ' no-repeat center bottom;"' : ''  ?>>
    <div class="jumbotron-content">
        <h2 class="jumbotron-heading"><?php echo esc_html( $heading ); ?></h2>
        <p class="jumbotron-text"><?php echo esc_html( $text ); ?></p>
        <button class="jumbotron-button"><?php echo esc_html( $button_text ); ?></button>
    </div>
</section>