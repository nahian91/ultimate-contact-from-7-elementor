<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class UCF7E_Widget_Contact_Form_7 extends Widget_Base {

    // Define widget name
    public function get_name() {
        return 'ucf7e_contact_form_7';
    }

    // Define widget title
    public function get_title() {
        return __( 'Contact Form 7', 'ultimate-contact-form-7-elementor' );
    }

    // Define widget icon
    public function get_icon() {
        return 'eicon-form-horizontal'; // Elementor's built-in icon for a form
    }

    // Define the custom category
    public function get_categories() {
        return [ 'basic' ]; // Custom category
    }

    // Define widget controls for content (including form selection)
    protected function _register_controls() {

        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ultimate-contact-form-7-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Select Form Control
        $this->add_control(
            'form_id',
            [
                'label' => __( 'Select Form', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => $this->get_all_cf7_forms(),
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'ultimate-contact-form-7-elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Section for Form Background Color
        $this->add_control(
            'form_background_color',
            [
                'label' => __( 'Form Background Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Section for Form Padding
        $this->add_responsive_control(
            'form_padding',
            [
                'label' => __( 'Padding', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7' => 'padding: {{TOP}} {{RIGHT}} {{BOTTOM}} {{LEFT}};',
                ],
            ]
        );

        // Typography Control for Text
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_typography',
                'label' => __( 'Typography', 'ultimate-contact-form-7-elementor' ),
                'selector' => '{{WRAPPER}} .wpcf7 input, {{WRAPPER}} .wpcf7 textarea, {{WRAPPER}} .wpcf7 select',
            ]
        );

        // Section for Input Field Border Color
        $this->add_control(
            'input_border_color',
            [
                'label' => __( 'Input Border Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 input, {{WRAPPER}} .wpcf7 textarea, {{WRAPPER}} .wpcf7 select' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // Section for Input Field Border Radius
        $this->add_control(
            'input_border_radius',
            [
                'label' => __( 'Input Border Radius', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 input, {{WRAPPER}} .wpcf7 textarea, {{WRAPPER}} .wpcf7 select' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Section for Box Shadow
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'form_box_shadow',
                'label' => __( 'Box Shadow', 'ultimate-contact-form-7-elementor' ),
                'selector' => '{{WRAPPER}} .wpcf7',
            ]
        );

        // Submit Button Color
        $this->add_control(
            'submit_button_color',
            [
                'label' => __( 'Submit Button Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 input[type="submit"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Submit Button Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'submit_button_typography',
                'label' => __( 'Submit Button Typography', 'ultimate-contact-form-7-elementor' ),
                'selector' => '{{WRAPPER}} .wpcf7 input[type="submit"]',
            ]
        );

        // Submit Button Hover Color
        $this->add_control(
            'submit_button_hover_color',
            [
                'label' => __( 'Submit Button Hover Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 input[type="submit"]:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Section for Label Styling
        $this->add_control(
            'label_color',
            [
                'label' => __( 'Label Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 label' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Section for Error Message Styling
        $this->add_control(
            'error_message_color',
            [
                'label' => __( 'Error Message Color', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 .wpcf7-not-valid-tip' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Section for Form Element Spacing
        $this->add_responsive_control(
            'element_spacing',
            [
                'label' => __( 'Form Element Spacing', 'ultimate-contact-form-7-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7 input, {{WRAPPER}} .wpcf7 textarea, {{WRAPPER}} .wpcf7 select' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Get all available Contact Form 7 forms
    private function get_all_cf7_forms() {
        $forms = get_posts( [
            'post_type' => 'wpcf7_contact_form',
            'posts_per_page' => -1,
        ] );

        $form_options = [];
        foreach ( $forms as $form ) {
            $form_options[$form->ID] = $form->post_title;
        }

        return $form_options;
    }

    // Render widget content
    protected function render() {
        $settings = $this->get_settings_for_display();
        $form_id = $settings['form_id'];

        echo '<div class="ucf7e-widget-wrapper">';
        echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' );
        echo '</div>';
    }
}
