<?php
namespace MapAddonsElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Bing_Maps extends Widget_Base {

    public function get_name() {
        return 'bing_maps';
    }

    public function get_title() {
        return __('Bing Maps', 'map-addons-elementor');
    }

    public function get_icon() {
        return 'fa fa-map-marker';
    }

    public function get_categories() {
        return ['map-addons-elementor-category'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'bing_map_embed_controls',
            [
                'label' => __('Bing Maps', 'map-addons-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'latitude',
            [
                'label' => __('Latitude', 'map-addons-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 23.796,
            ]
        );

        $this->add_control(
            'longitude',
            [
                'label' => __('Longitude', 'map-addons-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 5,
                'default' => 90.343,
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => __('Height', 'map-addons-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 400,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<div class="bing-maps-elementor-widget">';
        echo '
            <iframe width="100%" height="' . $settings['height'] . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.bing.com/maps/embed?h=' . $settings['height'] . '&w=1600&cp=' . $settings['latitude'] . '~' . $settings['longitude'] . '&lvl=12&typ=d&sty=r&src=SHELL&FORM=MBEDV8"></iframe>
        ';
        echo '</div>';
    }
}