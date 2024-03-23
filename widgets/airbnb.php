<?php
namespace MapAddonsElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class LBA_Airbnb extends Widget_Base {

    public function get_name() {
        return 'airbnb';
    }

    public function get_title() {
        return __('Airbnb', 'map-addons-elementor');
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
                'label' => __('Airbnb', 'map-addons-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'property_id',
            [
                'label' => __('Property ID', 'map-addons-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 283638,
            ]
        );

        $this->add_control(
			'show_reviews',
			[
				'label' => esc_html__( 'Hide Reviews', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'map-addons-elementor' ),
				'label_off' => esc_html__( 'Hide', 'map-addons-elementor' ),
				'return_value' => 'data-hide-reviews="true"',
				'default' => '',
			]
		);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $property_id = $settings['property_id'];
        $show_reviews = $settings['show_reviews'];
        
        ?>
        <div>
        <div class="airbnb-embed-frame" 
        data-id="<?php echo $property_id;?>" 
        data-view="home" 
        data-hide-price="true"
        <?php echo $show_reviews;?>
        style="height: 350px; margin: 0px;">
        <script async="" src="https://www.airbnb.co.uk/embeddable/airbnb_jssdk"></script>
        </div>
        </div>
        <?php
    }
}