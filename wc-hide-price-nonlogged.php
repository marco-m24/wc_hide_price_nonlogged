add_action( 'init', 'mrc_hide_price_add_cart_not_logged_in' );
  
function mrc_hide_price_add_cart_not_logged_in() {   
	if ( ! is_user_logged_in() ) {      
	 remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	 remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );   
	 add_action( 'woocommerce_single_product_summary', 'mrc_print_login_to_see', 31 );
	 add_action( 'woocommerce_after_shop_loop_item', 'mrc_print_login_to_see', 11 );
	}
}
  
function mrc_print_login_to_see() {
	echo '<a href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . __('Accedi per vedere i prezzi', 'theme_name') . '</a>';
}
