<?php
/**
 * Inspiro Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: inspiro
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

/**
 *  Create a new yoast seo sitemap
 */
 
// add_filter( 'wpseo_sitemap_index', 'ex_add_sitemap_custom_items' );

// // Add custom index
// function ex_add_sitemap_custom_items(){
// 	$smp ='';
// 	return $smp;
// }


// function init_wpseo_do_sitemap_actions(){
// 	add_action( "wpseo_do_sitemap_CUSTOM_KEY", 'ex_generate_origin_combo_sitemap');
// }

// if( !function_exists('redirect_404_to_homepage') ){

//     add_action( 'template_redirect', 'redirect_404_to_homepage' );

//     function redirect_404_to_homepage(){
//        if(is_404()):
//             wp_safe_redirect( home_url('/') );
//             exit;
//         endif;
//     }
// }

function default_opengraph(){global $default_opengraph; return $default_opengraph;}
add_filter('wpseo_twitter_image','default_opengraph');

add_filter( 'author_link', 'modify_author_link', 10, 3 ); 	 	 
function modify_author_link( $link, $author_id, $author_nicename ) {	 	 
	$custom_profile_url = get_user_meta($author_id,'custom_profile_url',true);
	return $custom_profile_url ? $custom_profile_url : $link;
}
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'inspiro' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'inspiro-style' ), $version );
	wp_enqueue_style( 'child-footer-style', get_stylesheet_directory_uri() . '/footer-style.css', array( 'inspiro-style' ), $version );

}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


/* Custom work*/

// Add a custom field before single add to cart
add_action( 'woocommerce_before_add_to_cart_button', 'custom_product_price_field', 5 );
function custom_product_price_field(){
	global $product;
	if ( $product->is_type( 'variable' ) ) {

  }else{
    if($product->get_attribute( 'pa_mico_carton_unit' )){
			echo '<div class="field qty show-box-calculator field" style="height: 100px;">
							<div class="square-feet">
								<label class="label" for="qty">
									<span>Square Feet <span class="red">*</span></span>
								</label>
								<div class="control">
									<input id="square_feet" name="square_feet" value="" type="text" maxlength="12" value="" title="Square Feet" class="input-text area-input" aria-required="true">
								</div>
							</div>
							<div class="boxes-detail">
								<p>
									BOXES: <span  id="boxes">1</span> <br>
									AMOUNT:<span id="amount">25.31</span> Sqft
								</p>
							</div>
						</div>';
    }
	echo '<div class="c-product-bottom-total" style="">';
    if($product->get_attribute( 'pa_mico_carton_unit' )){
    	echo '<div class="ordertotal-text">
        	<p>Order Total:</p>
    	</div>
    	<div class="no-gutter">
        	<p>
            	<span id="order_total" class="js-total-price js-total-price-inc js-inc-vat"></span>
        	</p>
		</div>';
    }
	echo '</div>';
	
    /* echo '<div class="custom-text text">
    <label>Square Feet:</label>
    <input id="square_feet" type="text" name="square_feet" value="" class="square_feet" />
    </div>
	<div class="custom-text text">
    <label>BOXES: <span id="boxes"> </span></label>
    </div>
	<div class="custom-text text">
    <label>AMOUNT: <span id="amount"> </span> sqft</label>
	<input type="hidden" value="" id="sqrt_data" name="sqrt_data" />
    </div>
	<div class="custom-text text">
    <label>Order Total: <span id="order_total"> </span> </label>
    </div>
	';  */
    }
}

// Get custom field value, calculate new item price, save it as custom cart item data
add_filter('woocommerce_add_cart_item_data', 'add_custom_field_data', 20, 2 );
function add_custom_field_data( $cart_item_data, $product_id ){
    if ( isset($_POST['square_feet']) && ! empty($_POST['square_feet']) ){
       $cart_item_data['custom_data']['text'] = $_POST['square_feet'];
    }
    if ( isset($_POST['square_feet']) && ! empty($_POST['square_feet']) ){
        $product      = wc_get_product($product_id); // The WC_Product Object
		$attributes = $product->get_attribute( 'pa_mico_carton_unit' );
		if($attributes){
        $base_price   = (float) $product->get_regular_price(); // Product reg price
        $custom_data = (float) sanitize_text_field( $_POST['square_feet'] );

        $cart_item_data['custom_data']['base_price'] = $base_price;
        $cart_item_data['custom_data']['new_price'] = $base_price * $attributes;
        //$cart_item_data['custom_data']['rental'] = $custom_price;
		}
    }
    if ( isset($cart_item_data['custom_data']['new_price']) || isset($cart_item_data['custom_data']['text']) ){
        $cart_item_data['custom_data']['unique_key'] = md5( microtime() . rand() ); // Make each item unique
    }
	//print_r($cart_item_data);
	//die;
    return $cart_item_data;
}

// Set the new calculated cart item price
add_action( 'woocommerce_before_calculate_totals', 'extra_price_add_custom_price', 20, 1 );
function extra_price_add_custom_price( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach ( $cart->get_cart() as $cart_item ) {
        if( isset($cart_item['custom_data']['new_price']) )
            $cart_item['data']->set_price( (float) $cart_item['custom_data']['new_price'] );
    }
}

// Display cart item custom price details
add_filter('woocommerce_cart_item_price', 'display_cart_items_custom_price_details', 20, 3 );
function display_cart_items_custom_price_details( $product_price, $cart_item, $cart_item_key ){
    if( isset($cart_item['custom_data']['base_price']) ) {
        $product        = $cart_item['data'];
        $base_price     = $cart_item['custom_data']['base_price'];
        $product_price  = wc_price( wc_get_price_to_display( $product, array( 'price' => $base_price ) ) ) . '<br>';
        
    }
    return $product_price;
}

// Display in cart item the selected date
add_filter( 'woocommerce_get_item_data', 'display_custom_item_data', 10, 2 );
function display_custom_item_data( $cart_item_data, $cart_item ) {
	
    if ( isset( $cart_item['custom_data']['text'] ) ){
		$product_id = $cart_item['product_id'];
		$quantity = $cart_item['quantity'];
		$product = wc_get_product( $product_id );
		$attributes = $product->get_attribute( 'pa_mico_carton_unit' );
		if($attributes){
			$cart_item_data[] = array(
				'name' => __("Square Feet", "woocommerce" ),
				'value' => ($attributes*$quantity),
			);
		}
    }
    return $cart_item_data;
}

add_action( 'wp_footer', 'bbloomer_add_jscript_checkout', 999 );
 
function bbloomer_add_jscript_checkout() {
  	if ( is_product() ) { 
        $id = wc_get_product()->get_id();
        $product = wc_get_product( $id );
        $type = $product->get_type();
        //$quantity = json_encode($product->get_quantity());
        $price = $product->get_price();
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
    	if($product->get_attribute( 'pa_mico_carton_unit' ) && $price > 0 && is_numeric($product->get_attribute( 'pa_mico_carton_unit' ))){
	        $attributes = json_encode($product->get_attribute( 'pa_mico_carton_unit' ));
        	if($attributes){
				$name = json_encode($product->get_name());
				$order_total = $price*$product->get_attribute( 'pa_mico_carton_unit' );
				echo '<script type="text/javascript">
					attribute = parseFloat('.$attributes.');
					base_price = parseFloat('.$price.');
					order_total = parseFloat('.$order_total.');
					jQuery( "#order_total" ).text(order_total.toFixed(2));	
					jQuery( "#square_feet" ).val(attribute);
					jQuery( "#sqrt_data" ).val(attribute);
					jQuery( "#boxes" ).text(1);
					jQuery( "#amount" ).text(attribute);
					jQuery( "#square_feet" ).keyup(function (e) {
						size_sqft = e.target.value;
						box_count =1;
						if( size_sqft >= attribute ){
							box_count = size_sqft/attribute;
							int_sqrt = parseInt(box_count);
							if(box_count > int_sqrt) {
								box_count = int_sqrt+1;	
							}
						}
						amount = box_count*attribute;
						jQuery( "#boxes" ).text(box_count);
						jQuery( "input[name=quantity]" ).val(box_count);
						jQuery( "#amount" ).text(amount.toFixed(2));
						jQuery( "#sqrt_data" ).val(amount.toFixed(2));
						order_total=attribute*box_count*base_price;			
						jQuery( "#order_total" ).text(order_total.toFixed(2));
						//setTimeout(function () {
						//	jQuery( "#square_feet" ).val(amount.toFixed(2));
						//}, 1500);
					});	
				</script>';
        	}
        }
 	}else{
    	echo "";
    }
}

register_nav_menus( [ 'secondary' => __( 'Secondary Menu' ) ] );

function filter_sample_product( $query ) 
{
	if( ! is_admin() && $query->is_main_query() ) 
	{
		$meta_query = $query->get( 'meta_query' );
		$meta_query[] = array(
			'key'       => '_sample_product',
			'value'     => '1',
			'compare'   => '!='  
		);
		$query->set( 'meta_query', $meta_query );
	 }
}

add_action( 'woocommerce_product_query' , 'filter_sample_product' );

add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
function woo_add_custom_general_fields() {

    echo '<div class="options_group">';

    woocommerce_wp_select( array( 
        'id'          => '_sample_product',
        'label'       => __( 'Sample Product', 'woocommerce' ),
        'description' => __( 'Sample product', 'woocommerce' ),
        'desc_tip'    => true,
        'options'     => array(
            '0' => __('No', 'woocommerce' ),
            '1'    => __('Yes', 'woocommerce' ),
        )
    ) );

    echo '</div>';
}

add_action( 'woocommerce_process_product_meta', 'woo_save_custom_general_fields', 30, 1 );
function woo_save_custom_general_fields( $post_id ){
	
		$posted_field_value = $_POST['_sample_product'];
        update_post_meta( $post_id, '_sample_product', esc_attr( $posted_field_value ) );
		
}

add_action( 'woocommerce_product_meta_start', 'woo_display_custom_general_fields_values', 50 );
function woo_display_custom_general_fields_values() {
    global $product;
	
    $product_id = method_exists( $product, 'get_id' ) ? $product->get_id() : $product->id;

    echo '<span class="stan">Sample Product ' . get_post_meta( $product_id, '_sample_product', true ) . '</span>';
}


/* function wpdocs_search_by_title_only( $search, $wp_query ) {
    global $wpdb;
if( ! is_admin()) 
	{
    if ( empty( $search ) ) {
        return $search; // skip processing - no search term in query
    }

    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';
    $search = '';
    $searchand = '';

    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( $wpdb->esc_like( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }

    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
	}

    return $search;
}
add_filter( 'posts_search', 'wpdocs_search_by_title_only', 500, 2 ); */


//add_action('pre_get_posts', 'show_active_lotteries_only');

function show_active_lotteries_only($q)
{
  if (is_search()) {
	//  $meta_query = $q->get( 'meta_query' );
		$meta_query[] = array(
			'key'       => '_sample_product',
			'value'     => '1',
			'compare'   => '!='  
		);
	//$q->set('meta_query', $meta_query );
    $q->set('post_type', 'product');
    $q->set('post_status', 'publish'); 
  }
}


register_sidebar( array(
    'name'          => 'WooCommerce Sidebar',
    'id'            => 'woocommerce_sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );


$target_products = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'product_cat' => 'Living Room Light Balls',
    'posts_per_page'=>-1
);
if(isset($_GET['import'])){
    // $file = fopen("/home/qtriangle.in/domains/wp1.qtriangle.in/public_html/wp-content/themes/inspiro-child/productnew.csv","r");
    // while(! feof($file)){
    //     $csv = fgetcsv($file);
        
    //     $id = wc_get_product_id_by_sku( $csv[0] );
    //     if($id>0){
    //     	if($csv[5]){
	// 			$desc = $csv[5];
	// 		}else{
	// 			$desc = substr(get_post($id)->post_content, 0, 255);
	// 		}
	// 		update_post_meta( $id, '_yoast_wpseo_title', $csv[3] );
	// 		update_post_meta( $id, '_yoast_wpseo_metadesc', $desc );
	// 		update_post_meta( $id, '_yoast_wpseo_keywords', $csv[4] );
	// 		update_post_meta( $id, '_yoast_wpseo_content_score', 90 );
	// 		update_post_meta( $id, '_yoast_wpseo_estimated-reading-time-minutes', '' );
	// 		update_post_meta( $id, '_yoast_wpseo_wordproof_timestamp', '' );
 			
 	// 		if($csv[1]==1){
    //         	$post_status = 'publish';
    //         }else{
    //         	$post_status = 'draft';
    //         }

    // 		wp_update_post(array(
    //   			'ID'            =>  $id,
    //   			'post_status'   =>  $post_status,
    //         	'post_name'		=>  $csv[2]
    // 		));
			
  	// 	}
    // }

    // fclose($file);
}


add_action( 'woocommerce_after_add_to_cart_button', 'add_sample_product_button', 10, 0 );
function add_sample_product_button() { 
	global $product;
	$id = $product->get_id();
	$sku = $product->get_sku();
	$sample_sku1 = $product->get_sku().'-SAMPLE';
	$sample_sku2 = $product->get_sku().'-S';
	$sample_product_id = wc_get_product_id_by_sku( $sample_sku1 );	
		if(!$sample_product_id){
			$sample_product_id = wc_get_product_id_by_sku( $sample_sku2 );
		}
		if($sample_product_id){
			echo '<button type="submit" name="add-to-cart" value="'.$sample_product_id.'" class="single_add_to_cart_button button alt wp-element-button" style="margin-left: 5px;">ORDER SAMPLE</button>';
		}
}; 

function theme_xyz_header_metadata() {
    
    global $post;
	if ( is_product() ){
		add_theme_support( 'title-tag' );
		$id = $post->ID;
		$str = '';
		if($id){
			$title = get_post_meta( $id, '_yoast_wpseo_title', true );
			$desc  = get_post_meta( $id, '_yoast_wpseo_metadesc', true );
			$keywords = get_post_meta( $id, '_yoast_wpseo_keywords', true );
			$str .= '<title>'.$title.'</title>';
			$str .= '<meta name="description" content="'.$desc.'" />';
			$str .= '<meta name="keywords" content="'.$keywords.'" />';
		}
	}
	//echo $str;
}
//add_action( 'wp_head', 'theme_xyz_header_metadata', 1 );

/**
 * Add .html extension to product permalinks
 */
// function bis_detect_html_permalinks($query) {
//   global $wpdb, $pm_query, $wp, $wp_rewrite;
// 	//print_r($query);die;
//   // Do not run if custom permalink was detected
//   if(!empty($pm_query['id'])) {
//     return $query;
//   }
 
//   if(!empty($query['product']) && strpos($query['product'], '.html') !== false) {
//         $query['product'] = str_replace('.html', '', $query['product']);
//   	//die;
 
//         if(!empty($query['name'])) {
//             $query['name'] = $query['product'];
//         }
 
//     // Disable canonical redirect
//     remove_action('template_redirect', 'wp_old_slug_redirect');
//     remove_action('template_redirect', 'redirect_canonical');
//     add_filter('wpml_is_redirected', '__return_false', 99, 2);
//     add_filter('pll_check_canonical_url', '__return_false', 99, 2);
//   }
 
//   return $query;
// }
// add_filter('request', 'bis_detect_html_permalinks', 9999);


// function bis_filter_product_permalinks($url, $element) {
//     if(!empty($element->post_type) && ($element->post_type == 'product')) {
//         $url .= ".html";
//     }
 
//     return str_replace('/.html', '.html', $url);
// }
// add_filter('post_type_link', 'bis_filter_product_permalinks', 999, 2);


function bp_change_product_price_display( $price, $product ) {
	$product_categories = array('species','acacia-wood-flooring','amendoim-hardwood-flooring','bamboo-flooring','brazilian-cherry-hardwood-flooring','cumaru-flooring','french-oak-flooring','hickory-flooring','ipe-flooring','maple-hardwood-flooring','cork-flooring','red-oak-hardwood-flooring','tigerwood-flooring','walnut-flooring','solid-engineered-hardwood','solid-wood-flooring-mn','luxury-vinyl-flooring','laminate', 'engineered-hardwood-flooring-mn', 'cork-flooring-mn', 'flooring');

    // if($product->price=='5'){
    //     return $price;
    // }else{
    //     if( has_term( $product_categories, 'product_cat', $product->get_id() ) )
    //         $price .= '';
    //     else{
    //         $price .= ' /sf';
    //     }
    // }
		if ( $product->is_type( 'variable' ) && has_term( $product_categories, 'product_cat', $product->get_id() ) ) {
			$price .= ' /sf';
		}else{
			if( $product->get_attribute( 'pa_mico_carton_unit' ) ){
				$price .= ' /sf';
			}else{
				$price .= '';
			}
		}
    return $price;
}

function bp_change_product_price_cart_display( $price, $product ) {
	$product_categories = array('species','acacia-wood-flooring','amendoim-hardwood-flooring','bamboo-flooring','brazilian-cherry-hardwood-flooring','cumaru-flooring','french-oak-flooring','hickory-flooring','ipe-flooring','maple-hardwood-flooring','cork-flooring','red-oak-hardwood-flooring','tigerwood-flooring','walnut-flooring','solid-engineered-hardwood','solid-wood-flooring-mn','luxury-vinyl-flooring','laminate', 'engineered-hardwood-flooring-mn', 'cork-flooring-mn', 'flooring');

    // if($product['data']->price=='5'){
    //     return $price;
    // }else{
    //     if( has_term( $product_categories, 'product_cat', $product['product_id']  ) )
    //         $price .= '';
    //     else{
    //         $price .= ' /sf';
    //     }
    // }
		// if( has_term( $product_categories, 'product_cat', $product['product_id']  ) )
		// 		$price .= '';
		// else{
		// 	if ( $product->is_type( 'variable' ) ) {
		// 		$price .= ' /sf';
		// 	}else{
		// 		$price .= '';
		// 	}
		// }
		if ( has_term( $product_categories, 'product_cat', $product['product_id'] ) ) {
			$price .= ' /sf';
		}else{
			$price .= '';
		}
    return $price;
}

add_filter( 'woocommerce_get_price_html', 'bp_change_product_price_display', 20, 2 );
add_filter( 'woocommerce_cart_item_price', 'bp_change_product_price_cart_display', 30, 2);


// Remove the category count for WooCommerce categories
add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
function custom_product_shortcode() {
	global $product;
	$id = $product->id;
  	echo do_shortcode('[expert_notes]{title} {stars} {summary}[/expert_notes]'); 

}
add_action( 'woocommerce_after_single_product_summary', 'custom_product_shortcode', 18);

add_shortcode( 'expert_notes', 'expert_notes_shortcode' );

function expert_notes_shortcode( $atts, $content = null ) {
	global $product;
	$selected_testimonials = get_field( "select_testimonials", $product->id );
	
	if ( $selected_testimonials ) {
		testimonials_block($selected_testimonials);
	}else{
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'wpm-testimonial',
			'post_status'      => 'publish',
			'meta_query' => array(
				array(
					'key' => 'product_ids',
					'value' => $product->id,
					'compare' => 'LIKE'
				)
			)
		);

		$posts_array = get_posts( $args );

		if ( $posts_array ) :
			testimonials_block($posts_array);
		endif;		
	}			
	wp_reset_postdata();
	echo '<script>
    jQuery(document).ready(function($) {
        $(\'.owl-carousel-notes\').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            navText: [
            "<i class=\'fa fa-angle-left wt-left\'></i>",
            "<i class=\'fa fa-angle-right wt-right\'></i>"
            ],
            //autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        })
    });
    </script><style>p.img{max-width:150px;border-radius:100%;overflow: hidden;margin: 15px auto;}p.client_name{font-weight: bold;text-align: center;}</style>';
}
function testimonials_block($testimonials){
	echo '<section class="expert_notes related">';
	$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'A Note From our Experts', 'woocommerce' ) );
	if ( $heading ) :
		echo '<h2>'.esc_html( $heading ).'</h2>';
	endif;
	woocommerce_product_loop_start();
	echo '<ul class="owl-carousel owl-carousel-notes owl-theme">';
		foreach ( $testimonials as $note ) :
			if(current_user_can('administrator')){
				echo '<li><p class="img">'.get_the_post_thumbnail($note->ID).'</p><p class="client_name"><label>'.get_post_meta($note->ID, 'client_name')[0].'</label></p><p>'.$note->post_excerpt.'</p><p style="text-align:center"><a href="/wp-admin/post.php?post='.$note->ID.'&action=edit">Edit</a></p></li>';
			}else{
				echo '<li><p class="img">'.get_the_post_thumbnail($note->ID).'</p><p class="client_name"><label>'.get_post_meta($note->ID, 'client_name')[0].'</label></p><p>'.$note->post_excerpt.'</p></li>';
			}
			
		endforeach;
		echo '</ul>';
		woocommerce_product_loop_end();
	echo '</section>';
}

// Calculate shipping cost based on price range
add_filter('woocommerce_package_rates', 'custom_price_range_shipping', 10, 2);
function custom_price_range_shipping($rates, $package) {

  $price_range_shipping_class = 'us';
  $country_state = get_option( 'sunarc_country_state' );
  $datas = unserialize($sunarc_country_state);
  $has_price_range_class = true;
	$shipping_cost = 0.00;
	$product_type = array(
    	990 => 'Wood Sample',
    	744 => 'Solid Wood',
    	871 => 'Engineered Wood',
    	984 => 'Standard',
    	960 => 'Mouldings',
    	898 => 'Underlayment',
		1922 => 'Luxury Vinyl',
    );
    foreach ($package['contents'] as $item_id => $values) {
    	$price = floatval($values['line_subtotal']);
    	$type = $values['data']->attributes['pa_am_shipping_type']['options'][0];
    	if( $type==744 || $type == 871 || $type == 1922 ){
			if($price<=160){
				$shipping_cost += 149.00;
			}elseif($price<=300){
				$shipping_cost += 199.00;
			}elseif($price<=500){
				$shipping_cost += 299.00;
			}elseif($price<=900){
				$shipping_cost += 399.00;
			}elseif($price<=9999999999){
				$shipping_cost += 499.00;
			}
		}
    	// if($type==871){
		// 		if($price<=150){
		// 				$shipping_cost += 79.00;
		// 			}elseif($price<=300){
		// 				$shipping_cost += 119.00;
		// 			}elseif($price<=500){
		// 				$shipping_cost += 159.00;
		// 			}elseif($price<=800){
		// 				$shipping_cost += 299.00;
		// 			}elseif($price<=1200){
		// 				$shipping_cost += 399.00;
		// 			}elseif($price<=9999999999){
		// 				$shipping_cost += 499.00;
		// 			}
		// 	}
    	if($type==984){
			if($price<=100){
				$shipping_cost += 12.00;
			}elseif($price<=200){
				$shipping_cost += 18.00;
			}elseif($price<=400){
				$shipping_cost += 25.00;
			}elseif($price<=1000){
				$shipping_cost += 35.00;
			}elseif($price<=9999999999){
				$shipping_cost += 50.00;
			}
		}
    	if($type==960){
			if($price<=35){
				$shipping_cost += 19.00;
			}elseif($price<=200){
				$shipping_cost += 29.00;
			}elseif($price<=400){
				$shipping_cost += 59.00;
			}elseif($price<=9999999999){
				$shipping_cost += 79.00;
			}
		}
    	if($type==898){
			if($price<=45){
				$shipping_cost += 25.00;
			}elseif($price<=100){
				$shipping_cost += 35.00;
			}elseif($price<=250){
				$shipping_cost += 69.00;
			}elseif($price<=500){
				$shipping_cost += 129.00;
			}elseif($price<=9999999999){
				$shipping_cost += 299.00;
			}
		}
      $product = $values['data'];
        // if ($product->get_shipping_class() == $price_range_shipping_class) {
        //     $has_price_range_class = true;
        //     break;
        // }
    }

	if($shipping_cost > 499.00){
		$shipping_cost = 499.00;
	}
	// if($shipping_cost == 0.00){
	// 	$shipping_cost = 5.00;
	// }
	
	if ($has_price_range_class){
		foreach ($rates as $rate_key => $rate) {
    		if ($rate->method_id === 'flat_rate') {
    			$rates[$rate_key]->cost = $shipping_cost;
    			break;
    		}
    	}
    }
    // if ($has_price_range_class && $package['contents_cost'] >= $min_price && $package['contents_cost'] <= $max_price) {
    //     foreach ($rates as $rate_key => $rate) {
    //         if ($rate->method_id === 'flat_rate') {
    //             $rates[$rate_key]->cost = $shipping_cost;
    //             break;
    //         }
    //     }
    // }

	//print_r($rates);
  return $rates;
}
add_filter('show_admin_bar', function($show) {
    if (!current_user_can('administrator')) {
        return false;
    }
    return $show;
});

add_action('generate_before_main_content', 'add_custom_div');
function add_custom_div() {
	echo '<div class="custom-overlay-div">Your custom content here</div>';
}