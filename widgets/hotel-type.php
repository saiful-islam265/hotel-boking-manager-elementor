<?php

namespace HotelBookingHelper\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class HotelType extends Widget_Base {

	public function get_name() {
		return 'property-type';
	}

	public function get_title() {
		return __( 'Property List', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fas fa-home';
	}

	public function get_categories() {
		return [ 'whbmt-hotel-booking' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'headline',
			[
				'label'   => __( 'Section Headline', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Section Headline', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'room_filter_by_property_type',
			[
				'label'   => __( 'Filter By Property Type', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => whbmt_get_tour_term_list_by_tax( 'mage_property_type' ),
			]
		);
		//add_filter('hello', function (){});


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sec_title_color',
			[
				'label'     => __( 'Content Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sec_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content h2',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'sec_title_text_shadow',
				'selector' => '{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content h2',
			]
		);

		$this->add_control(
			'sec_title_blend_mode',
			[
				'label'     => __( 'Blend Mode', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''            => __( 'Normal', 'elementor' ),
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'difference'  => 'Difference',
					'exclusion'   => 'Exclusion',
					'hue'         => 'Hue',
					'luminosity'  => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content h2' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sec_content_color',
			[
				'label'     => __( 'Content Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'sec_content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'sec_content_text_shadow',
				'selector' => '{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content p',
			]
		);

		$this->add_control(
			'sec_content_blend_mode',
			[
				'label'     => __( 'Blend Mode', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''            => __( 'Normal', 'elementor' ),
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'difference'  => 'Difference',
					'exclusion'   => 'Exclusion',
					'hue'         => 'Hue',
					'luminosity'  => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .wtbtm_elementor_widget_hotel_list_content p' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_hotel_list_image',
			[
				'label' => __( 'Hotel Lists Image ', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'hotel_image_border',
				'selector' => '{{WRAPPER}} .whbmt_single_featured img',
			]
		);

		$this->add_responsive_control(
			'hotel_image_border_radius',
			[
				'label'      => __( 'Image Border Radius', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .whbmt_single_featured img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_hotel_list',
			[
				'label' => __( 'Hotel Lists ', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'list_content_align',
			[
				'label'     => __( 'Alignment', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'happy-elementor-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'happy-elementor-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'happy-elementor-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .whbmt_single_featured' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'hotel_list_padding',
			[
				'label'      => __( 'Padding', 'plugin-name' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .whbmt_single_featured' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotel_list_border_radius',
			[
				'label'      => __( 'Border Radius', '' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .whbmt_single_featured' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],
			]
		);
		$this->add_control(
			'list_title_bg_color',
			[
				'label'     => __( 'List Background Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_single_featured' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'hotel_list_border',
				'selector' => '{{WRAPPER}} .whbmt_single_featured',
			]
		);

		$this->add_control(
			'list_title_color',
			[
				'label'     => __( 'List Title Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_featured_content h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_featured_content h4',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'list_title_shadow',
				'selector' => '{{WRAPPER}} .whbmt_featured_content h4',
			]
		);


		$this->add_control(
			'list_text_color',
			[
				'label'     => __( 'List Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_featured_content span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'list_text_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_featured_content span',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'list_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_featured_content span',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		global $magemain;
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
		?>

        <!-- Featured-hotel section start -->
        <section class="whbmt_property pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="title text-left">
                            <h1><?php echo $settings['headline'] ?></h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="whbmt_property_carousel owl-carousel">
							<?php
							$mage_property_type = get_terms( array(
								'taxonomy'   => 'mage_property_type',
								'hide_empty' => false,
							) );
							foreach ( $mage_property_type as $property ) {
								?>
                                <div class="whbmt_single_property">
                                    <a href="<?php echo get_term_link($property->slug, 'mage_property_type'); ?>"><img
                                                src="<?php echo wp_get_attachment_image_url( get_term_meta( $property->term_id, 'property_type_image', true ), 'medium' ); ?>" alt=""></a>
                                    <div class="whbmt_single_property_content">
                                        <a href="<?php echo get_term_link($property->slug, 'mage_property_type');
                                        ?>"><h5><?php echo $property->name; ?></h5></a>
                                        <a href="<?php echo get_term_link($property->slug, 'mage_property_type');
                                        ?>"><span><?php echo whbmt_get_Hotel_count_by_tax($property->slug, 'mage_property_type') .'  '. $property->name ?></span></a>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
	protected function _content_template() {

	}
}
