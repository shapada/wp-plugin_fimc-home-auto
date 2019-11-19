<?php

namespace Fimc\Blocks;

class BlocksManager {
  
  public function register() {
    add_action( 'acf/init', 'register_partners_blocks' );
    add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_styles' ] );
    add_filter( 'block_categories', [ $this, 'register_block_categories' ], 10, 2 );

    wp_enqueue_style( 'block-editor-styles', FIMC_CORE_ABSPATH . 'assets/css/blocks/css/block-editor-style.css', false, '1.0', 'all' );

    require_once FIMC_CORE_ABSPATH . "/blocks/register/register-partners.php";
  }

  function assign_block_categories( $categories, $post ) {
    return array_merge(
      $categories,
      [
        [ 'slug' => 'partners', 'title' => 'Partners' ],
      ]
    );
  }

  /**
   * Block registration callback to find our templates
   */
  function acf_block_render_callback( $block ) {
    // Convert name ("acf/xxx") into path friendly slug ("xxx")
    $slug = str_replace( 'acf/', '', $block['name'] );
    $cat = $block['category'];
    
    // Include a template part from within the "blocks" folder
    if ( file_exists( get_theme_file_path( "/blocks/{$cat}/content-{$slug}.php" ) ) ) {
      include( get_theme_file_path( "/blocks/${cat}/content-{$slug}.php" ) );
    }
  }



}