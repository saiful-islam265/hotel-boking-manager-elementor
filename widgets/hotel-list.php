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

class HotelList extends Widget_Base {

	public function get_name() {
		return 'hotel-list';
	}

	public function get_title() {
		return __( 'Hotel List', 'elementor-hello-world' );
	}

	public function get_icon() {
		return 'fas fa-hotel';
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
				'label'   => __( 'Title', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'elementor-hello-world' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Description', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'hotel_filter_by_city',
			[
				'label'   => __( 'Filter By City', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => whbmt_get_hotel_term_list_by_meta( 'city' ),
			]
		);
		$this->add_control(
			'hotel_filter_by_country',
			[
				'label'   => __( 'Filter By Country', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => whbmt_get_hotel_term_list_by_meta( 'country' ),
			]
		);

		$this->add_control(
			'hotel_filter_by_hotel_type',
			[
				'label'   => __( 'Filter By Hotel Type', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => whbmt_get_tour_term_list_by_tax( 'mage_hotel_type' ),
			]
		);
		/*$this->add_control(
			'hotel_filter_by_hotel_type',
			[
				'label' => __( 'Filter By Hotel Types', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => whbmt_get_hotel_term_list_by_meta('hotel_types'),
			]
        );*/
		$this->add_control(
			'no_of_hotel',
			[
				'label'       => __( 'No of Hotel Display', 'plugin-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '8', 'plugin-domain' ),
				'placeholder' => __( 'Please enter how many hotel will display in the list. By default is 8', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label'   => __( 'Show Pagination', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'yes' => __( 'Yes', 'plugin-domain' ),
					'no'  => __( 'No', 'plugin-domain' ),
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

		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_inline_editing_attributes( 'content', 'advanced' );
		?>

        <!-- Featured-hotel section start -->
        <section class="whbmt_hotel_room pad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="title text-left">
                            <h2 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h2>
                            <p <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo $settings['description']; ?></p>
							<?php //echo $settings['hotel_filter_by_city'];?>
                        </div>
                    </div>
                </div>

                <div class="row">
					<?php

					$city_filter = $settings['hotel_filter_by_city'] == 0 ? array(
						'key'     => 'city',
						'value'   => $settings['hotel_filter_by_city'],
						'compare' => 'LIKE'
					) : '';

					//print_r($city_filter);

					$country_filter = $settings['hotel_filter_by_country'] && $settings['hotel_filter_by_country'] > 0 ? array(
						'key' => 'country',
						'value'    => $settings['hotel_filter_by_country'],
						'compare' => 'LIKE'
					) : '';


					$hotel_type = $settings['hotel_filter_by_hotel_type'] && $settings['hotel_filter_by_hotel_type'] > 0 ? array(
						'taxonomy' => 'hotel_types',
						'field'    => 'term_id',
						'terms'    => $settings['hotel_filter_by_hotel_type']
					) : '';


					$show       = $settings['no_of_hotel'] ? $settings['no_of_hotel'] : 8;
					$pagination = $settings['show_pagination'] ? $settings['show_pagination'] : 'no';

					$paged = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;

					if ( $settings['hotel_filter_by_city'] == 'all' ) {
						$args = array(
							'post_type'      => 'mage_hotel',
							'posts_per_page' => -1,
						);
					} else {
						$args = array(
							'post_type'      => 'mage_hotel',
							'paged'          => $paged,
							'posts_per_page' => $show,
							'meta_query'     => array(
								'relation' => 'AND',
								array(
									'key'     => 'city',
									'value'   => $settings['hotel_filter_by_city'],
									'compare' => 'LIKE'
                                ),
                                array(
	                                'key' => 'country',
	                                'value'    => $settings['hotel_filter_by_country'],
	                                'compare' => 'LIKE'
                                )
							),
                            'tax_query'         => array(
							$city_filter,
							$country_filter,
							$hotel_filter,
							$hotel_type,
							$hotel_package,
							$tour_type
						)
						);
					}


					$q            = new \WP_Query( $args );
					$count_result = $q->post_count;
					if ( $count_result > 0 ){
					foreach ( $q->posts as $post ) {
						?>
                        <div class="col-md-3 col-sm-4">

                            <div class="whbmt_single_hotel_room">
                                <div class="whbmt_single_hotel_room_image">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_post_thumbnail
										( $post->ID, 'large' ); ?></a>
                                </div>
                                <div class="whbmt_hotel_room_content">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>">
                                        <h4><?php echo get_the_title( $post->ID );
											?></h4></a>
									<?php
									$curr_args        = array(
										'ex_tax_label' => false,
										'currency'     => ''
									);
									$min_price_starts = get_post_meta( $post->ID, 'min_price_starts', true );
									?>
									<?php echo '<span>Price Starts From</span> ' . wc_price( $min_price_starts, $curr_args ) ?>
                                    <a href="<?php get_permalink( $post->ID ); ?>">
                                        <button class=" btn btn-default main_btn">Book Now</button>
                                    </a>
                                </div>
                            </div>
                        </div>
						<?php
					}
					?>
                </div>
				<?php if ( $pagination == 'yes' ) { ?>
                    <div class="row">
                        <div class="col-md-12"><?php
							$pargs = array(
								"current" => $paged,
								"total"   => $q->max_num_pages
							);
							echo "<div class='pagination-sec'>" . paginate_links( $pargs ) . "</div>";
							?>
                        </div>
                    </div>
					<?php
				}
				} else {
					_e( "<div class='row'><div class='col-md-12'><span class='hotel-no-result-msg' style='text-align:center;font-size:20px'>Sorry! No Hotel Found! </span></div></div>", "whbmt" );
				}
				?>
            </div>
        </section>


		<?php
	}

	protected function _content_template() {

	}
}
