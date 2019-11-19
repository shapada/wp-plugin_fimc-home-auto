<?php

namespace Fimc;

class BlocksManager {
    public function __construct() {}

    public function register() {
      add_action( 'acf/init', [ $this, 'register_blocks' ]);
      add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_assets' ] );
      add_filter( 'block_categories', [ $this, 'register_block_categories' ], 10, 2);

       // wp_enqueue_style( 'block-editor-styles', FIMC_CORE_ABSPATH . 'assets/css/blocks/css/block-editor-style.css', false, '1.0', 'all' );
    }

    public function register_block_categories( $categories, $post ) {
        return array_merge(
            $categories,
            [
                ['slug' => 'landing-page', 'title' => 'Landing Page'],
            ]
        );
    }

    /**
     * Block registration callback to find our templates
     */
    public function acf_block_render_callback( $block ) {
      var_dump( $block ); die();
        // Convert name ("acf/xxx") into path friendly slug ("xxx")
        $slug = str_replace( 'acf/', '', $block['name'] );
        $cat = $block['category'];

        // Include a template part from within the "blocks" folder
        if ( file_exists( $FIMC_CORE_ABSPATH . "/blocks/{$cat}/content-{$slug}.php" ) ) {
            include FIMC_CORE_ABSPATH . '/blocks/${cat}/content-{$slug}.php';
        }
    }

    public function register_blocks()
    {
        if ( function_exists('acf_register_block_type') ) {
            // Partners
            acf_register_block_type( [
                'name' => 'jumbotron',
                'title' => 'Jumbotron',
                'description' => 'The jumbotron section.',
                'render_callback' => [ $this, 'acf_block_render_callback' ],
                'mode' => 'auto',
                'category' => 'landing-page',
                'post_types' => array('page'),
                'icon' => 'tagcloud',
            ] );
        }
    }
}
