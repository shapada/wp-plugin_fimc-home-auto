<?php

namespace Fimc;

class BlocksManager {
    public function __construct() {}

    public function register() {
      add_action( 'acf/init', [ $this, 'register_blocks' ]);
      add_filter( 'block_categories', [ $this, 'register_block_categories' ], 10, 2);
      
      //add_action( 'enqueue_block_editor_assets', [ $this, 'block_editor_assets' ] );
    // wp_enqueue_style( 'block-editor-styles', FIMC_CORE_ABSPATH . 'assets/css/blocks/css/block-editor-style.css', false, '1.0', 'all' );
    }

    public function register_block_categories( $categories, $post ) {
        return array_merge(
            $categories,
            [
                [ 'slug' => 'landing-page', 'title' => 'Landing Page' ],
            ]
        );
    }

    /**
     * Block registration callback to find our templates
     */
    public function acf_block_render_callback( $block ) {
        $slug = str_replace( 'acf/', '', $block['name'] );
        $cat = $block['category'];

        
        if ( file_exists( FIMC_CORE_ABSPATH . "/blocks/{$cat}/content-{$slug}.php" ) ) {
            var_dump( $cat ); die();
            include FIMC_CORE_ABSPATH . "/blocks/${cat}/content-{$slug}.php";
        }
    }

    public function register_blocks()
    {
        if ( function_exists('acf_register_block_type') ) {
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

            acf_register_block_type( [
              'name' => 'membership-benefits',
              'title' => 'Membership Benefits',
              'description' => 'The membership benefits section.',
              'render_callback' => [ $this, 'acf_block_render_callback' ],
              'mode' => 'auto',
              'category' => 'landing-page',
              'post_types' => array( 'page' ),
              'icon' => 'tagcloud',
          ] );

          acf_register_block_type( [
            'name' => 'our-plans',
            'title' => 'Our Plans',
            'description' => 'The our plans section.',
            'render_callback' => [ $this, 'acf_block_render_callback' ],
            'mode' => 'auto',
            'category' => 'landing-page',
            'post_types' => array( 'page' ),
            'icon' => 'tagcloud',
        ] );

        acf_register_block_type( [
          'name' => 'powered-by',
          'title' => 'Powered By',
          'description' => 'The powered by section.',
          'render_callback' => [ $this, 'acf_block_render_callback' ],
          'mode' => 'auto',
          'category' => 'landing-page',
          'post_types' => array('page'),
          'icon' => 'tagcloud',
      ] );
        }
    }
}
