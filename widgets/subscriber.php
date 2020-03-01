<?php
namespace HotelBookingHelper\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class HotelSubscriber extends Widget_Base {

	public function get_name() {
		return 'hotel-subscriber';
	}

	public function get_title() {
		return __( 'Subscriber Form', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fa fa-envelope';
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
			'title',
			[
				'label' => __( 'Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Description', 'elementor-hello-world' ),
			]
		);      
		$this->end_controls_section();
		


		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [					
					'{{WRAPPER}} .whbmt_subscribe_hotels h3.subscriber-sec-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels h3.subscriber-sec-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels h3.subscriber-sec-title',
			]
		);

		$this->add_control(
			'blend_mode',
			[
				'label' => __( 'Blend Mode', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .whbmt_subscribe_hotels h3.subscriber-sec-title' => 'mix-blend-mode: {{VALUE}}',
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
			'desc_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc',
			]
		);

		$this->add_control(
			'desc_blend_mode',
			[
				'label' => __( 'Blend Mode', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc' => 'mix-blend-mode: {{VALUE}}',
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
			'desc_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc',
			]
		);

		$this->add_control(
			'desc_blend_mode',
			[
				'label' => __( 'Blend Mode', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Normal', 'elementor' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .whbmt_subscribe_hotels p.subscriber-sec-desc' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();




		$this->start_controls_section(
			'section_subscriber_content',
			[
				'label' => __( 'Subscriber Form', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subs_button_bg_color',
			[
				'label' => __( 'Button Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .whbmt_subscribe_hotels button.wpmsems-btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subs_button_text_color',
			[
				'label' => __( 'Button Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subs_btn_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_subscribe_hotels button.wpmsems-btn',
			]
		);		
		$this->end_controls_section();












        
	}



	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>


	<!-- subscribe-hotel section start -->
	<section class="whbmt_subscribe_hotels text-center pad">
        <div class="container">
			<div class="whbmt_subscribe_button">
            <h3 class='subscriber-sec-title' <?php echo $this->get_render_attribute_string( 'title','class','boro-title' ); ?>><?php echo $settings['title']; ?></h3>
			<p class='subscriber-sec-desc' <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></p>
		    <?php echo do_shortcode('[wpmsems-subscriber-form id=123456]') ?>
			</div>
		</div>
	</section>
<?php
	}

	protected function _content_template() {
	
	}
}
