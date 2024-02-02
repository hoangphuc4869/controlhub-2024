<?php

remove_filter ('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

// Thêm ảnh đại diện
add_theme_support('post-thumbnails');

// support woocommerce

function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');
    // add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'my_custom_wc_theme_support');

// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

function m_register_menu()
{
	register_nav_menus(
		array(
			'menu-1' => __('Menu PC'),
            'menu-2' => __('Menu Footer'),
			'menu-3' => __('Menu Footer 2'),
            'menu-4' => __('Menu Footer 3'),
            'menu-5' => __('Menu Sidebar 1'),
            'menu-6' => __('Menu Sidebar 2'),
            'menu-7' => __('Menu Sidebar 3'),
            'menu-8' => __('Menu Sidebar 4'),
		)
	);
}
add_action('init', 'm_register_menu');


// add theme option menu bar admin 
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


// thanh tìm kiếm

function search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
        <button type="submit"><i class="far fa-search"></i></button>

        <input type="search" class="search-field" value="' . get_search_query() . '" name="s" id="s" placeholder="search..."/>
    </form>';
 
    return $form;
	}
	add_shortcode( 'wp_search_form', 'search_form' );


/**
 Change a currency symbol đ to VND
 */
 add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2); 
 function change_existing_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
 case 'VND': $currency_symbol = 'VND'; break;
 }
 return $currency_symbol;
 }


 // xóa input trong checkout

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
 // remove billing fields
    // unset($fields['billing']['billing_first_name']); // Billing First name
    // unset($fields['billing']['billing_last_name']); // Billing Last name
    unset($fields['billing']['billing_company']); // Billing company
    // unset($fields['billing']['billing_address_1']); // Billing Address 1
    // unset($fields['billing']['billing_address_2']); // Billing Address 2
    unset($fields['billing']['billing_city']); // Billing city
    unset($fields['billing']['billing_postcode']); // Billing postcode
    unset($fields['billing']['billing_country']); // Billing country
    unset($fields['billing']['billing_state']); // Billing state
    // unset($fields['billing']['billing_phone']); // Billing phone
    // unset($fields['billing']['billing_email']); // Billing email
   
    // remove shipping fields 
    unset($fields['shipping']['shipping_first_name']); // Shipping first name  
    unset($fields['shipping']['shipping_last_name']); // Shipping last name  
    unset($fields['shipping']['shipping_company']); // Shipping company  
    // unset($fields['shipping']['shipping_address_1']); // Shipping address 1
    unset($fields['shipping']['shipping_address_2']); // Shipping address 2
    unset($fields['shipping']['shipping_city']); // Shipping city 
    unset($fields['shipping']['shipping_postcode']); // Shipping postcode
    unset($fields['shipping']['shipping_country']); // Shipping country
    unset($fields['shipping']['shipping_state']); // Shipping state
    
    // remove order comment fields
    // unset($fields['order']['order_comments']); // Order comments
     return $fields;
}

//1. add cart to check out

add_action( 'woocommerce_before_checkout_form', 'add_cart_on_checkout', 5 );
 
function add_cart_on_checkout() {
 if ( is_wc_endpoint_url( 'order-received' ) ) return;
 echo do_shortcode('[woocommerce_cart]'); // Woocommerce cart page shortcode
}

// 2. Redirect cart page to checkout
add_action( 'template_redirect', function() {
  
// Replace "cart"  and "checkout" with cart and checkout page slug if needed
    if ( is_page( 'cart' ) ) {
        wp_redirect( '/checkout/' );
        die();
    }
} );

// Redirect to home url from empty Woocommerce checkout page

add_action( 'template_redirect', 'redirect_empty_checkout' );
 
function redirect_empty_checkout() {
    if ( is_checkout() && 0 == WC()->cart->get_cart_contents_count() && ! is_wc_endpoint_url( 'order-pay' ) && ! is_wc_endpoint_url( 'order-received' ) ) {
  wp_safe_redirect( get_permalink( wc_get_page_id( 'shop' ) ) ); 
        exit;
    }
}

add_filter ('woocommerce_add_to_cart_redirect', function( $url, $adding_to_cart ) {
    return wc_get_checkout_url();
}, 10, 2 ); 