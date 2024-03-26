<?php
namespace MapAddonsElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class LBA_Dual_Button extends Widget_Base {

    public function get_name() {
        return 'dual_button';
    }

    public function get_title() {
        return __('Dual Button', 'map-addons-elementor');
    }

    public function get_icon() {
        return 'fa fa-map-marker';
    }

    public function get_categories() {
        return ['map-addons-elementor-category'];
    }

    public function get_style_depends() {
        return ['lba-app'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'button_01',
            [
                'label' => esc_html__( 'Button 01', 'map-addons-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'button_01_text',
			[
				'label' => esc_html__( 'Text', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button 01', 'map-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'map-addons-elementor' ),
			]
		);

        $this->add_control(
			'button_01_link',
			[
				'label' => esc_html__( 'Link', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'button_01_icon',
			[
				'label' => esc_html__( 'Icon', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

        $this->add_control(
			'button_01_id',
			[
				'label' => esc_html__( 'Custom ID', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        
        $this->end_controls_section();


        $this->start_controls_section(
            'button_02',
            [
                'label' => esc_html__( 'Button 02', 'map-addons-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'button_02_text',
			[
				'label' => esc_html__( 'Text', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Button 02', 'map-addons-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'map-addons-elementor' ),
			]
		);

        $this->add_control(
			'button_02_link',
			[
				'label' => esc_html__( 'Link', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'button_02_icon',
			[
				'label' => esc_html__( 'Icon', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);

        $this->add_control(
			'button_02_id',
			[
				'label' => esc_html__( 'Custom ID', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
        
        $this->end_controls_section();

        // Style Controls (Common)

        $this->start_controls_section(
            'button_common_styles',
            [
                'label' => esc_html__( 'Common Styles', 'map-addons-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'button_gap',
			[
				'label' => esc_html__( 'Button Gap', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        // Style Controls (Button 01)

        $this->start_controls_section(
            'button_01_style',
            [
                'label' => esc_html__( 'Button 01', 'map-addons-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_01_typography',
				'selector' => '{{WRAPPER}} .lba_db_btn1',
			]
		);

        $this->start_controls_tabs(
            'button_01_style_tabs'
        );
        
        $this->start_controls_tab(
            'button_01_normal',
            [
                'label' => esc_html__( 'Normal', 'map-addons-elementor' ),
            ]
        );

        $this->add_control(
			'button_01_text_color',
			[
				'label' => esc_html__( 'Text Color', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn1' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_01_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .lba_db_btn1',
			]
		);
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_01_hover',
            [
                'label' => esc_html__( 'Hover', 'map-addons-elementor' ),
            ]
        );

        $this->add_control(
			'button_01_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn1:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_01_bg_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .lba_db_btn1:hover',
			]
		);
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

        $this->add_control(
			'button_01_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_01_border',
				'selector' => '{{WRAPPER}} .lba_db_btn1',
			]
		);

        $this->add_responsive_control(
			'button_01_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_01_margin',
			[
				'label' => esc_html__( 'Margin', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_01_padding',
			[
				'label' => esc_html__( 'Padding', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 4,
					'right' => 4,
					'bottom' => 4,
					'left' => 4,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();

        // Style Controls (Button 02)

        $this->start_controls_section(
            'button_02_style',
            [
                'label' => esc_html__( 'Button 02', 'map-addons-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_02_typography',
				'selector' => '{{WRAPPER}} .lba_db_btn2',
			]
		);

        $this->start_controls_tabs(
            'button_02_style_tabs'
        );
        
        $this->start_controls_tab(
            'button_02_normal',
            [
                'label' => esc_html__( 'Normal', 'map-addons-elementor' ),
            ]
        );

        $this->add_control(
			'button_02_text_color',
			[
				'label' => esc_html__( 'Text Color', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn2' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_02_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .lba_db_btn2',
			]
		);
        
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_02_hover',
            [
                'label' => esc_html__( 'Hover', 'map-addons-elementor' ),
            ]
        );

        $this->add_control(
			'button_02_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn2:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_02_bg_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .lba_db_btn2:hover',
			]
		);
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

        $this->add_control(
			'button_02_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_02_border',
				'selector' => '{{WRAPPER}} .lba_db_btn2',
			]
		);

        $this->add_responsive_control(
			'button_02_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_02_margin',
			[
				'label' => esc_html__( 'Margin', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_02_padding',
			[
				'label' => esc_html__( 'Padding', 'map-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'default' => [
					'top' => 4,
					'right' => 4,
					'bottom' => 4,
					'left' => 4,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .lba_db_btn2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Button 01 Settings
        $button_01_text = $settings['button_01_text'];
        $button_01_link = $settings['button_01_link'];
        $button_01_icon = $settings['button_01_icon'];
        $button_01_id = $settings['button_01_id'];

        // Button 02 Settings
        $button_02_text = $settings['button_02_text'];
        $button_02_link = $settings['button_02_link'];
        $button_02_icon = $settings['button_02_icon'];
        $button_02_id = $settings['button_02_id'];

        ?>
        <div class="lba_db grid grid-cols-2 gap-6 text-center">
            <a class="lba_db_btn1 bg-black text-white p-4"
                id="<?php echo $button_01_id;?>"
                href="<?php echo $button_01_link;?>">
                <?php \Elementor\Icons_Manager::render_icon( $button_01_icon, [ 'aria-hidden' => 'true' ] ); ?>
                <?php echo $button_01_text;?>
            </a>

            <a class="lba_db_btn2 bg-black text-white p-4"
                id="<?php echo $button_02_id;?>"
                href="<?php echo $button_02_link;?>">
                <?php \Elementor\Icons_Manager::render_icon( $button_02_icon, [ 'aria-hidden' => 'true' ] ); ?>
                <?php echo $button_02_text;?>
            </a>
        </div>
        <?php
    }
}