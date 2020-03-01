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

/**
 * @since 1.1.0
 */
class HotelSearchForm extends Widget_Base {

	public function get_name() {
		return 'hotel-search-form';
	}

	public function get_title() {
		return __( 'Hotel Search Form', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fa fa-search-location';
	}

	public function get_categories() {
		return [ 'whbmt-hotel-booking' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_sf_content',
			[
				'label' => __( 'Content', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'location_text',
			[
				'label'   => __( 'Location Title text', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Your Destination', 'elementor-hello-world' ),
			]
		);


		$this->add_control(
			'datepicker_text',
			[
				'label'   => __( 'Datepicker Title', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Select Your Date', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'   => __( 'Button Text', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Find Your Hotel', 'elementor-hello-world' ),
			]
		);


		$this->add_control(
			'hotels_search_result_page',
			[
				'label'   => __( 'Select Search Result Page', 'elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => whbmt_get_all_page_list(),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_search_form_content',
			[
				'label' => __( 'Search Form', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'hotels_sf_search_btn_bg_color',
			[
				'label'     => __( 'Button Background Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_banner_btn input' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hotels_sf_search_btn_title_color',
			[
				'label'     => __( 'Button Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					// '.whbmt_subscribe_hotels button.wpmsems-btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .whbmt_elementor_widget_banner_btn input' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'hotels_sf_button_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
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
		// hotels_banner_search_form_status
		//$search_form_status = $settings['hotels_banner_search_form_status'] ? $settings['hotels_banner_search_form_status'] : 'yes';
		?>


        <!--Start Hero-area section-->

		<?php
		$search_result   = $settings['hotels_search_result_page'] ? $settings['hotels_search_result_page'] : '';
		$location_text   = $settings['location_text'] ? $settings['location_text'] : 'Your Destination';
		$datepicker_text = $settings['datepicker_text'] ? $settings['datepicker_text'] : 'Select Your Date';
		$button_text     = $settings['button_text'] ? $settings['button_text'] : 'Find Your Hotel';
		?>
        <!-- search form here -->

        <section>
            <div id="whbm_search_form" class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="whbmt_form_area">
                            <div class="whbmt_banner_title text-center whbm_search_form_heading">
                                <h1 class="banner_heading ">Find the best deals from all the major hotel in popular
                                    city</h1>
                            </div>
                            <form id="whbmt_wanderlust_form1" class="search-form-shortcode" action="" method="get">
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
