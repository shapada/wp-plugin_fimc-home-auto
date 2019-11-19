<?php

namespace Fimc;


class Core {

	/**
	 * @var \Fimc\PageTemplater
	 */
	public $page_templater;

  
	/**
	 * Constructor.
	 *
	 * @access public
	 */
	public function __construct() {
		$this->page_templater = PageTemplater::get_instance();

		do_action( 'fimc_init' );
	}
	/**
	 * Register hooks and actions.
	 */
	public function register() {
		//add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
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
			FIMC_ABSURL . "/assets/js/fimc-core{$min}.js",
			array( 'fimc-vendor-core', 'jquery' ),
			FIMC_VERSION,
			true
		);
		wp_enqueue_script(
			'fimc-vendor-core', 
			FIMC_ABSURL . "/assets/js/fimc-vendor-core{$min}.js",
			array( 'jquery' ),
			FIMC_VERSION,
			true
		);
	}
	/**
	 * Register and enqueue styles.
	 */
	public function enqueue_styles() {
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		
		wp_enqueue_style(
			'fimc-core', 
			FIMC_ABSURL . "/assets/css/style.css",
			array(),
			FIMC_VERSION
		);
	}
}