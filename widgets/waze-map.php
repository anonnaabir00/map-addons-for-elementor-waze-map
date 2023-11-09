<?php

namespace MapAddonsElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Waze_Map_For_Elementor extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'waze_map';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Waze Map', 'map-addons-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fab fa-waze';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'map-addons-elementor-category' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'waze_map_controls',
			[
				'label' => __( 'Waze Map Controls', 'map-addons-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'latitude',
			[
				'label' => __( 'Latitude', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 23.796,
			]
		);

		$this->add_control(
			'longitude',
			[
				'label' => __( 'Longitude', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 5,
				'default' => 90.343,
			]
		);


		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 400,
			]
		);


		$this->add_control(
			'zoom',
			[
				'label' => __( 'Zoom', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 12,
			]
		);


		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = wp_oembed_get( $settings['url'] );

		echo '<div class="oembed-elementor-widget">';

		echo '
		<iframe src="https://embed.waze.com/iframe?
			zoom='.$settings['zoom'].'&
			lat='.$settings['latitude'].'&
			lon='.$settings['longitude'].'&
			pin=1"
			height="'.$settings['height'].'"></iframe>
		';

		echo '<h1>'.$settings['height']['size'].'</h1>';
		echo ( $html ) ? $html : $settings['url'];

		echo '</div>';

	}

}
