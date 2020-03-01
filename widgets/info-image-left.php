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
class HotelInfoImageLeft extends Widget_Base {

	public function get_name() {
		return 'hotel-info-image-left';
	}

	public function get_title() {
		return __( 'Info Image Left', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fa fa-id-card';
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

		$this->add_control(
			'banner_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
      
		$this->end_controls_section();
		
		
		


		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'imgl_title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wtbm_elementor_widget_img_left h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'imgl_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .wtbm_elementor_widget_img_left h2',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'imgl_title_text_shadow',
				'selector' => '{{WRAPPER}} .wtbm_elementor_widget_img_left h2',
			]
		);

		$this->add_control(
			'imgl_title_blend_mode',
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
					'{{WRAPPER}} .wtbm_elementor_widget_img_left h2' => 'mix-blend-mode: {{VALUE}}',
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
			'imgl_content_color',
			[
				'label' => __( 'Content Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wtbm_elementor_widget_img_left p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'imgl_content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .wtbm_elementor_widget_img_left p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'imgl_content_text_shadow',
				'selector' => '{{WRAPPER}} .wtbm_elementor_widget_img_left p',
			]
		);

		$this->add_control(
			'imgl_content_blend_mode',
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
					'{{WRAPPER}} .wtbm_elementor_widget_img_left p' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		
		$this->end_controls_section();
		
		
		
		/**
		 * Image Settings
		 */
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'elementor-hello-world' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'image_alignment',
			[
				'label'   => __( 'Image Alignment', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left'   => __( 'Left', 'plugin-domain' ),
					'right'  => __( 'Right', 'plugin-domain' ),
					'center' => __( 'Center', 'plugin-domain' ),
				],
				
				'selectors' => [
					'{{WRAPPER}} .info-box-image-sec' => 'text-align: {{VALUE}};',
				],
			
			]
		
		);
		
		$this->add_control(
			'image_padding',
			[
				'label'      => __( 'Padding', 'plugin-domain' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .info-box-image-sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'      => __( 'Image Border Radius', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .info-box-image-sec img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		
		








        
	}//end method register controls


	

















	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
?>
	<!-- customer-support-hotel section start -->
	<section class="whbmt_customer_support_hotels pad wtbm_elementor_widget_img_left">
        <div class="container">
			<div class="row">
            <div class="col-md-5 col-sm-5">
                    <div class="info-box-image-sec">
                        <img src="<?php echo $settings['banner_image']['url']; ?>" alt="">
                    </div>
				</div>                
				<div class="col-md-7 col-sm-7">
					<div class="whbmt_customer_support_content">
                    <h2 <?php echo $this->get_render_attribute_string( 'info-box-title' ); ?>><?php echo $settings['title']; ?></h2>
					<p <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></p>
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
