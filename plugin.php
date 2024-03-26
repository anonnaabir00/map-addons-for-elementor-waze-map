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


			 public function map_addons_elementor_category($elements_manager){
				 $elements_manager->add_category(
					'map-addons-elementor-category',
					[
						'title' => __( 'Local Business Addons', 'map-addons-elementor' ),
						'icon' => 'fa fa-plug',
					]
				);
			 }

			 public function lba_widget_styles() {
				wp_register_style( 'lba-app', plugins_url( 'includes/assets/app.css', __FILE__ ) );
			}


			public function widget_scripts() {
				// wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
			}

			private function include_widgets_files() {
				require_once( __DIR__ . '/widgets/waze-map.php' );
				require_once( __DIR__ . '/widgets/bing-maps.php' );
				require_once( __DIR__ . '/widgets/airbnb.php' );
				require_once( __DIR__ . '/widgets/dual-button.php' );
			}

			public function register_widgets() {
				$this->include_widgets_files();

				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Waze_Map_For_Elementor() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Bing_Maps() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\LBA_Airbnb() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\LBA_Dual_Button() );
			}

			public function __construct() {
				// Register widget styles
				add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'lba_widget_styles' ] );
				// Register widget scripts
				add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
				add_action( 'elementor/elements/categories_registered', [ $this, 'map_addons_elementor_category' ] );

				// Register widgets
				add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
			}
		}

		Plugin::instance();
