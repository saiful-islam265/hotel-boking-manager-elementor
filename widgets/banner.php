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
class HotelBanner extends Widget_Base {

	public function get_name() {
		return 'hotel-banner';
	}

	public function get_title() {
		return __( 'Banner', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fa fa-image';
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
		$this->add_control(
			'hotel_banner_search_form_status',
			[
				'label' => __( 'Show Search Form', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => 'No'
				],
			]
		);

		$this->add_control(
			'hotel_banner_search_result_page',
			[
				'label' => __( 'Select Search Result Page', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => whbmt_get_all_page_list(),
			]
		);

      
		$this->add_control(
			'location_text',
			[
				'label' => __( 'Location Title text', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Your Destination', 'elementor-hello-world' ),
			]
		);        


		$this->add_control(
			'datepicker_text',
			[
				'label' => __( 'Datepicker Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Select Your Date', 'elementor-hello-world' ),
			]
		);        

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Find Your Hotel', 'elementor-hello-world' ),
			]
		);        


		$this->end_controls_section();





		$this->start_controls_section(
			'section_banner_title_style',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hotel_banner_title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [					
					'{{WRAPPER}} .whbmt_elementor_widget_banner h1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_banner_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_banner h1',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'hotel_banner_text_shadow',
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_banner h1',
			]
		);

		$this->add_control(
			'hotel_banner_title_mode',
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
					'{{WRAPPER}} .whbmt_elementor_widget_banner h1' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);

		$this->end_controls_section();




		$this->start_controls_section(
			'section_style_banner_content',
			[
				'label' => __( 'Description', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hotel_banner_content_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_banner p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_banner_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_banner p',
			]
		);

		$this->add_control(
			'hotel_banner_content_blend_mode',
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
					'{{WRAPPER}} .whbmt_elementor_widget_banner p' => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'section_style_search_form_content',
			[
				'label' => __( 'Search Form', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hotel_banner_search_btn_bg_color',
			[
				'label' => __( 'Button Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_banner_btn input' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hotel_banner_search_btn_title_color',
			[
				'label' => __( 'Button Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_banner_btn input' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hotel_banner_button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .whbmt_elementor_widget_banner_btn input',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
		// hotel_banner_search_form_status
		$search_form_status = $settings['hotel_banner_search_form_status'] ? $settings['hotel_banner_search_form_status'] : 'yes';
?>



    <!--Start Hero-area section--> 
	<section id="whbmt_form_1_area" style="background-image: url(<?php echo $settings['banner_image']['url']; ?>);  background-position: center center; background-size: cover;">
        <div class="container">
			<div id="whbmt_form_area">
				<div class="row justify-content-center">
					<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
						<div class="whbmt_form_area">
							<div class="whbmt_banner_title text-center whbmt_elementor_widget_banner">
								<h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h1>
								<p <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></p>
							</div>
							<?php if($search_form_status == 'yes'){ 
								// hotel_banner_search_result_page
								//echo $settings['hotel_banner_search_result_page'];
								$search_result = $settings['hotel_banner_search_result_page'] ? $settings['hotel_banner_search_result_page'] : '';
								$location_text = $settings['location_text'] ? $settings['location_text'] : 'Your Destination';
								$datepicker_text = $settings['datepicker_text'] ? $settings['datepicker_text'] : 'Select Your Date';
								$button_text = $settings['button_text'] ? $settings['button_text'] : 'Find Your Hotel';
							?>
							<!-- search form here -->
                                <form id="whbmt_wanderlust_form1" class="search-form-shortcode" action="<?php echo get_site_url() . '/whbm-hotel-search-form/'
                                ?>" method="get">
                                    <div class="whbmt_form__item form__item_select">
                                        <div class="whbmt_custom_select form_destination">
                                            <select class="dest-name destination_search" id="dest-name"
                                                    name="dest_name">
												<?php echo whbmt_get_all_location_dropdown_list( $location_text ); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="whbmt_form__item checkin-out">
                                        <div class="whbmt_form__item_datepicker form__item_select">
                                            <input type="text" name="daterange" class="whbmt_datepicker"
                                                   placeholder="<?php esc_html_e( 'Checkin - Checkout', 'whbm' ) ?>"
                                                   id="daterange" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="whbmt_form__item">
                                        <div class="whbmt_custom_select">
                                            <select name="adult_qty">
                                                <option value="0">2 adult</option>
                                                <option value="1">3 adult</option>
                                                <option value="2">4 adult</option>
                                                <option value="3">5 adult</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="whbmt_form__item">
                                        <div class="whbmt_custom_select">
                                            <select name="child_qty">
                                                <option value="0">No Childern</option>
                                                <option value="1">2</option>
                                                <option value="2">3</option>
                                                <option value="3">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="whbmt_form__item form__item_submit">
                                        <input type="submit" value="Search">
                                    </div>
                                </form>
							<!-- search form here -->
							<?php } ?>
						</div>
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
