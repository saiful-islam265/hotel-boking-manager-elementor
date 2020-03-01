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

class HotelCountry extends Widget_Base {

	public function get_name() {
		return 'hotel-country';
	}

	public function get_title() {
		return __( 'Country', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fa fa-globe';
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
			'no_of_city',
			[
				'label' => __( 'No of Country Display', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '4', 'plugin-domain' ),
				'placeholder' => __( 'Please enter how many City Display in the list. By default is 4', 'plugin-domain' ),
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
			'hotel_country_title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [					
					'{{WRAPPER}} .whbmt_elementor_widget_country_contents h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_country_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_country_contents h2',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'hotel_country_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_country_contents h2',
			]
		);

		$this->add_control(
			'hotel_country_title_mode',
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
					'{{WRAPPER}} .whbmt_elementor_widget_country_contents h2' => 'mix-blend-mode: {{VALUE}}',
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
			'hotel_country_content_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_country_contents p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_country_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_country_contents p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'hotel_country_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_country_contents p',
			]
		);

		$this->add_control(
			'hotel_country_content_blend_mode',
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
					'{{WRAPPER}} .whbmt_elementor_widget_country_contents p' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'section_style_hotel_country_image',
			[
				'label' => __( 'hotel Country Image ', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'hotel_country_image_border',
                'selector' => '{{WRAPPER}} .whbmt_elementor_widget_country_lists .whbmt_cities_image img, .whbmt_single_destination:before',
            ]
        );

        $this->add_responsive_control(
            'hotel_country_image_border_radius',
            [
                'label' => __( 'Image Border Radius', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .whbmt_elementor_widget_country_lists .whbmt_cities_image img, .whbmt_single_destination:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

		$this->end_controls_section();






		$this->start_controls_section(
			'section_style_hotel_country_lists',
			[
				'label' => __( 'hotel Country Lits ', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hotel_country_list_text_bg_color',
			[
				'label' => __( 'Title Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_destination_hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hotel_country_list_title_color',
			[
				'label' => __( 'Title  Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_destination_hover h4' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hotel_country_list_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_destination_hover span' => 'color: {{VALUE}};',
				],
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




<section class="whbmt_destination pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="title whbmt_elementor_widget_country_contents">
                        <h2 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h2>
					    <p <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></p>
                    </div>
                </div>
            </div>
			
			<div class="row">
                <?php
               $no = $settings['no_of_city'] ? $settings['no_of_city'] : 4;
                $count =1;
                $terms = get_terms( array(
                    'taxonomy' => 'hotel_country',
                    'hide_empty' => false,
                ) );
                foreach ($terms as $country) {
                    if($count <= $no){
                ?>                
				<div class="col-md-4 col-sm-4 whbmt_elementor_widget_country_lists">
                <a href="<?php echo get_term_link($country->slug, 'hotel_country'); ?>">	<div class="whbmt_single_destination">
						<div class="whbmt_cities_image">
                        <img src="<?php echo wp_get_attachment_image_url(get_term_meta($country->term_id,'country_image',true),'full'); ?>">
						</div>
						<div class="whbmt_destination_hover">
                            <h4><?php echo $country->name; ?></h4>
							<span><?php echo whbmt_get_hotel_count_by_tax($country->slug,'hotel_country'); ?> Hotels</span>
						</div></a>
					</div>
                </div>
                <?php $count++; } } ?>                                   				
			</div>
		</div>
	</section>
<?php
	}

	protected function _content_template() {
	
	}
}
