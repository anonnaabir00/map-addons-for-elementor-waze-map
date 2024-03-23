<?php
		namespace MapAddonsElementor;

		/**

		 * Main Plugin class
		 * @since 1.0ß
		 */
		class Plugin {

			private static $_instance = null;

			public static function instance() {
				if ( is_null( self::$_instance ) ) {
					self::$_instance = new self();
				}
				return self::$_instance;
			}

			/**
			 * widget_scripts
			 *
			 * Load required plugin core files.
			 *
			 * @since 1.2.0
			 * @access public
			 */


			 public function map_addons_elementor_category($elements_manager){
				 $elements_manager->add_category(
					'map-addons-elementor-category',
					[
						'title' => __( 'Local Business Addons', 'map-addons-elementor' ),
						'icon' => 'fa fa-plug',
					]
				);
			 }


			public function widget_scripts() {
				// wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
			}

			/**
			 * Include Widgets files
			 *
			 * Load widgets files
			 *
			 * @since 1.2.0
			 * @access private
			 */
			private function include_widgets_files() {
				require_once( __DIR__ . '/widgets/waze-map.php' );
				require_once( __DIR__ . '/widgets/bing-maps.php' );
				require_once( __DIR__ . '/widgets/airbnb.php' );
			}

			/**
			 * Register Widgets
			 *
			 * Register new Elementor widgets.
			 *
			 * @since 1.2.0
			 * @access public
			 */
			public function register_widgets() {
				// Its is now safe to include Widgets files
				$this->include_widgets_files();

				// Register Widgets
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Waze_Map_For_Elementor() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Bing_Maps() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\LBA_Airbnb() );
			}

			/**
			 *  Plugin class constructor
			 *
			 * Register plugin action hooks and filters
			 *
			 * @since 1.2.0
			 * @access public
			 */
			public function __construct() {

				// Register widget scripts
				add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
				add_action( 'elementor/elements/categories_registered', [ $this, 'map_addons_elementor_category' ] );

				// Register widgets
				add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
			}
		}

		// Instantiate Plugin Class
		Plugin::instance();
