<?php

namespace Fimc;

use \Fimc\BlocksManager;


class Core {

	/**
	 * @var \Fimc\PageTemplater
	 */
	public $page_templater;

	/**
	 * @var \Fimc\BlocksManager
	 */
	public $blocks_manager;

  
	/**
	 * Constructor.
	 *
	 * @access public
	 */
	public function __construct() {
		//$this->page_templater = PageTemplater::get_instance();
		$this->blocks_manager = new BlocksManager();

		do_action( 'fimc_init' );
	}
	/**
	 * Register hooks and actions.
	 */
	public function register() {
		$this->blocks_manager->register();

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		add_action( 'init', [ $this, 'init' ] );
		add_action( 'admin_init', [ $this, 'admin_init' ] );
	}

	/**
	 * Run actions that need to happen at init, and allow other plugins to hook into
	 * core init.
	 */
	public function init() {

		/**
		 * Allow adding plugins and themes to hook into core init.
		 */
		do_action( 'fimc_init' );
	}

	/**
	 * Admin init action, handles anything that's needed on admin init.
	 */
	public function admin_init() {}
	
	/**
	 * Register and enqueue scripts.
	 */
	public function enqueue_scripts() {
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_script(
			'fimc-core', 
			FIMC_CORE_ABSURL . "/assets/js/fimc-core{$min}.js",
			null,
			FIMC_CORE_VERSION,
			true
		);

	}
	/**
	 * Register and enqueue styles.
	 */
	public function enqueue_styles() {

		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_deregister_script( 'divi-style' );
		wp_deregister_script( 'et-shortcodes-responsive-css' );


		wp_enqueue_style(
			'fimc-core', 
			FIMC_CORE_ABSURL . "/assets/css/style.css",
			[ 'divi-style' ],
			FIMC_CORE_VERSION
		);
	}

	public function enqueue_block_editor_assets() {

	}
}