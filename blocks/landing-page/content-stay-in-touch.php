<?php
/**
 * Block Name: Stay In Touch
 *
 * This is the template that displays the stay in touch section.
 **/
?>
<section id="stay-in-touch">
  <div class="stay-in-touch-content">
    <span><?php the_field( 'heading' ); ?></span> <?php the_field( 'text' ); ?></div>
    <form>
      <input type="text" class="email-address" placeholder="Email Address" />
      <button type="button"><?php the_field( 'button_text' ); ?></button>
    </form>
</section>