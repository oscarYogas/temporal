<?php

 function load_scripts() {
	 wp_register_script( 'my_scripts', get_template_directory_uri() . '/js/my-scripts.js', array(), false, true );
	 
	 wp_enqueue_script('my_scripts');


    } 

add_action( 'wp_enqueue_scripts', 'load_scripts' ); 



function load_styles() {
    wp_register_style( 'my_styles', get_template_directory_uri() . '/css/my-styles.css', array(), false, 'all' );
	wp_enqueue_style('my_styles');
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome/css/all.css', array(), false, 'all' );
	wp_enqueue_style('fontawesome');

   } 
add_action( 'wp_enqueue_scripts', 'load_styles' ); 

function wpb_add_google_fonts() { 
	wp_enqueue_style( 'wpb-google-fonts1', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap', false ); 
	wp_enqueue_style( 'wpb-google-fonts2', 'https://fonts.googleapis.com/css?family=Oswald&display=swap', false ); 
	wp_enqueue_style( 'wpb-google-fonts3', 'https://fonts.googleapis.com/css?family=Yrsa&display=swap', false ); 
	wp_enqueue_style( 'wpb-google-fonts4', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


add_theme_support( 'post-thumbnails' ); 

remove_filter( 'the_excerpt', 'wpautop' );


// Register Custom Post Type
function clases_yoga_post_type() {

	$labels = array(
		'name'                  => _x( 'Clases grabadas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Clase grabada', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Clases grabadas', 'text_domain' ),
		'name_admin_bar'        => __( 'Clase grabada', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Clase:', 'text_domain' ),
		'all_items'             => __( 'All Clase', 'text_domain' ),
		'add_new_item'          => __( 'Add New Clase', 'text_domain' ),
		'add_new'               => __( 'New Clase', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Clase', 'text_domain' ),
		'update_item'           => __( 'Update Clase', 'text_domain' ),
		'view_item'             => __( 'View Clase', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search clases', 'text_domain' ),
		'not_found'             => __( 'No clases found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No clases found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'clases-grabadas',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Clase', 'text_domain' ),
		'description'           => __( 'Clases de yoga post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'clases_yoga', $args );

}
add_action( 'init', 'clases_yoga_post_type', 0 );



// Register Custom Post Type
function programas_yoga_post_type() {

	$labels = array(
		'name'                  => _x( 'Programas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Programa', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Programas', 'text_domain' ),
		'name_admin_bar'        => __( 'Programa', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Clase:', 'text_domain' ),
		'all_items'             => __( 'All Programa', 'text_domain' ),
		'add_new_item'          => __( 'Add New Programa', 'text_domain' ),
		'add_new'               => __( 'New Programa', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Programa', 'text_domain' ),
		'update_item'           => __( 'Update Programa', 'text_domain' ),
		'view_item'             => __( 'View Programa', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Programa', 'text_domain' ),
		'not_found'             => __( 'No Programa found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Programa found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'programas-yoga',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Programa', 'text_domain' ),
		'description'           => __( 'Programa post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'programas_yoga', $args );

}
add_action( 'init', 'programas_yoga_post_type', 0 );



// Register Custom Post Type
function clases_yoga_directo_post_type() {

	$labels = array(
		'name'                  => _x( 'Clases directo', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Clase directo', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Clases directo', 'text_domain' ),
		'name_admin_bar'        => __( 'Clase directo', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Clase:', 'text_domain' ),
		'all_items'             => __( 'All Clase directo', 'text_domain' ),
		'add_new_item'          => __( 'Add New Clase directo', 'text_domain' ),
		'add_new'               => __( 'New Clase directo', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Clas directo', 'text_domain' ),
		'update_item'           => __( 'Update Clas directo', 'text_domain' ),
		'view_item'             => __( 'View Clase directo', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search clases directo', 'text_domain' ),
		'not_found'             => __( 'No clases directo found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No clases directo found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'clases-directo',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Clase directo', 'text_domain' ),
		'description'           => __( 'Clases de yoga directo post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'clases_yoga_directo', $args );

}
add_action( 'init', 'clases_yoga_directo_post_type', 0 );

/*Esto es porque si no porque cuando hago filtro con custom wp_query sino me mete también el resto de post types como post, pages, attachments, etc..*/
add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( 'clases_yoga' !== $query->get( 'facetwp' ) ) {
        $is_main_query = (bool) $query->get( 'facetwp' );
    }
    return $is_main_query;
}, 10, 2 );

// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
function isacustom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
    return 48;
    else if ($post->post_type == 'clases_yoga')
    return 24;
    else
    return 48;
	}
	
add_filter('excerpt_length', 'isacustom_excerpt_length');



// get  referer url and save it 
function redirect_url() {

	// Añade automáticamente un producto al carrito de compras en WooCommerce cuando el usuario visita la tienda
	global $woocommerce;
	$product_id = 16;
	$found = false;
	if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->get_id() == $product_id )
					$found = true;
			}
			if ( ! $found )
				$woocommerce->cart->add_to_cart( $product_id );
	} else {
			$woocommerce->cart->add_to_cart( $product_id );
	}

	// Para redirigir tras registrarse 
	global $wp;
	if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) { 
		wp_redirect(home_url()."/cuenta-gracias/");
		
	}

	// Si intenta acceder a finalizar compra sin estar registrado/logeado
	if ( is_checkout() &&  !is_user_logged_in() ) {
		wp_redirect(home_url()."/cuenta/");
	}

	
}
add_action( 'template_redirect', 'redirect_url' );


/**
 * Redirect after registration.
 *
 * @param $redirect
 *
 * @return string
 */
function santoro_register_redirect( $redirect ) {

	wp_redirect(home_url().'/completar-alta/?registro=ok');
}
add_filter( 'woocommerce_registration_redirect', 'santoro_register_redirect' );



function santoro_login_redirect( $redirect, $user ) {

	$user_id = $user->ID;
			
	if (wcs_user_has_subscription($user_id, '', 'active')) { 
		wp_redirect($landing_before_login);

	} else if (wcs_user_has_subscription($user_id, '', 'pending-cancel')) { 
		wp_redirect(home_url().'/cuenta/');

	} else if (wcs_user_has_subscription($user_id, '', 'cancelled')) { 
		wp_redirect(home_url().'/cuenta/');
	} else if (wcs_user_has_subscription($user_id, '', 'on-hold')) {  
		wp_redirect(home_url().'/cuenta/'); 
	} else if (wcs_user_has_subscription($user_id, '', 'expired')) {
		wp_redirect(home_url().'/cuenta/');
	} else {
		wp_redirect(home_url().'/completar-alta/');
					
	}
}
		

add_filter( 'woocommerce_login_redirect', 'santoro_login_redirect', 10, 2 );




/* PERSONALIZACIÓN CARRITO*/
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
//add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );

 
function custom_override_checkout_fields( $fields ) {
    /*unset($fields['billing']['billing_first_name']);*/
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    //unset($fields['billing']['billing_city']); // necesario para que no pete
    //unset($fields['billing']['billing_postcode']);  // necesari para que no pete
    //unset($fields['billing']['billing_country']); // necesari para que no pete
	//unset($fields['billing']['billing_state']);  // necesario para que no se pete
	unset($fields['billing']['billing_phone']);   
	unset($fields['order']['order_comments']);    
    unset($fields['billing']['billing_email']);
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );


/* Para cambiar los label de woocomerce */ 
function wppb_change_text_login( $translated_text, $text, $domain ) {
	if ( ! is_user_logged_in()) {
		if ( is_account_page() ) {
			if ( $text == 'Username or email address') {
				$translated_text = esc_html__('Tu email', $domain );
			}elseif ( $text == 'Email address') {
				$translated_text = esc_html__('Tu email', $domain );
			}elseif ( $text == 'Password') {
				$translated_text = esc_html__('Tu contraseña', $domain );
			}/*elseif ( $text == 'Login') {
				$translated_text = esc_html__('Entra', $domain );
			}	
			elseif ( $text == 'Register') {
				$translated_text = esc_html__('Regístrate', $domain );
			}*/
			elseif ( $text == 'Remember me') {
				$translated_text = esc_html__('Recordar en próximos accesos', $domain );
			}
			elseif ( $text == 'Lost your password?') {
				$translated_text = esc_html__('¿Has olvidado tu contraseña?', $domain );
			}
		}

		if (is_checkout() ) {
			if ( $text == 'Finalizar compra') {
				$translated_text = esc_html__('Último paso', $domain );
			}
		}

	} 

	if ( is_user_logged_in()) {
		
		if(is_account_page() ) {
			if ( $text == 'Account details') {
				$translated_text = esc_html__('TU CUENTA', $domain );
			}elseif (strpos($text, 'Subscription') !== false) {
				$translated_text = esc_html__('Tu suscripción', $domain );
			}
			elseif (strpos($text, 'Related orders') !== false) {
				$translated_text = esc_html__('Facturas', $domain );
			}
		} 

	}


    return $translated_text;
}

add_filter( 'gettext', 'wppb_change_text_login', 10, 3 );




/* Persona woocommerce mi cuenta 
Info en https://ayudawp.com/personalizar-mi-cuenta-woocommerce/
*/
// Modificaciones a menu de mi cuenta
function ayudawp_ocultar_direccion( $items ) {
	unset($items['orders']);
	unset($items['members-area']);
	unset($items['downloads']);
	unset($items['payment-methods']);
	unset($items['edit-address']);
	unset($items['customer-logout']);	
return $items;
}
add_filter( 'woocommerce_account_menu_items', 'ayudawp_ocultar_direccion', 999 );

// Modificar orden
function my_account_menu_order() {
	$menuOrder = array(
	'dashboard'          => __( 'CLASES YOGA', 'woocommerce' ),
	'edit-account'     => __( 'TUS DATOS', 'woocommerce' ),
	//'edit-address'       => __( 'Tu dirección', 'woocommerce' ),
	'subscriptions'     => __( 'TU SUSCRIPCIÓN', 'woocommerce' ),
	);
	return $menuOrder;
	}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

// Luego mostramos el contenido de las direcciones en otra pestaña (edit-account en este ejemplo)
//add_action( 'woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address' );



/**
 * Remove the "Cancel" button from the My Subscriptions table.
 *
 * This isn't actually necessary because @see eg_subscription_payment_method_cannot_be_changed()
 * will prevent the button being displayed, however, it is included here as an example of how to
 * remove just the button but allow the change payment method process.
 */
function eg_remove_my_subscriptions_button( $actions, $subscription ) {

	foreach ( $actions as $action_key => $action ) {
		switch ( $action_key ) {
			//case 'change_payment_method':	// Hide "Change Payment Method" button?
			//case 'change_address':		// Hide "Change Address" button?
			//case 'switch':			// Hide "Switch Subscription" button?
			//case 'resubscribe':		// Hide "Resubscribe" button from an expired or cancelled subscription?
			case 'subscription_renewal_early':
			//case 'pay':			// Hide "Pay" button on subscriptions that are "on-hold" as they require payment?
			//case 'reactivate':		// Hide "Reactive" button on subscriptions that are "on-hold"?
			//case 'cancel':			// Hide "Cancel" button on subscriptions that are "active" or "on-hold"?
				unset( $actions[ $action_key ] );
				break;
			default: 
				error_log( '-- $action = ' . print_r( $action, true ) );
				break;
		}
	}

	return $actions;
}
add_filter( 'wcs_view_subscription_actions', 'eg_remove_my_subscriptions_button', 100, 2 );


// Add term and conditions check box on registration form
add_action( 'woocommerce_register_form', 'add_terms_and_conditions_to_registration', 20 );


function add_terms_and_conditions_to_registration() {
	

    if ( is_account_page() ) {
        ?>
	<p>
        <p class="form-row terms wc-terms-and-conditions">
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> 
				<span>Acepto las <a class="linkColor" target="_blank" href="https://www.theclassyoga.com/condiciones-de-uso/">condiciones</a> y <a  class="linkColor"  target="_blank"  href="https://www.theclassyoga.com/politica-privacidad/">políticas</a></span>
            </label>
            <input type="hidden" name="terms-field" value="1" />
        </p>
    <?php
    }

}

  

// Validate required term and conditions check box
add_action( 'woocommerce_register_post', 'terms_and_conditions_validation', 20, 3 );
function terms_and_conditions_validation( $username, $email, $validation_errors ) {
    if ( ! isset( $_POST['terms'] ) )
        $validation_errors->add( 'terms_error', __( 'Por favor acepta las condiciones y políticas. ¡Namaste! ', 'woocommerce' ) );

    return $validation_errors;
}

function get_name_or_display_name_without_id() {

	global $current_user;
	
	if (!empty($current_user->user_firstname))  {
		return $current_user->user_firstname;
	}

	$display_name_without_numbers = preg_replace('/[0-9]+/', '', $current_user->display_name);
	
	$display_name_without_id = str_replace("-","",$display_name_without_numbers);

	if ($display_name_without_id == "") {
		return "yogui";
	}

	return $display_name_without_id;
}
	
add_shortcode( 'name_or_display_name_without_id', 'get_name_or_display_name_without_id' );
	


/* Desactivar emails a admins de restablecimiento de contraseñas */
if ( !function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification() {}
}


add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );
function filter_woocommerce_coupon_message( $msg, $msg_code, $coupon ) {
    // $applied_coupons = WC()->cart->get_applied_coupons(); // Get applied coupons

    if( $msg === __( 'Coupon code applied successfully.', 'woocommerce' ) ) {
        $msg = sprintf( 
            __( "%s", "woocommerce" ), 
            '<p>¡Cupón aplicado correctamente! ' . $coupon->get_description() . '</p> ' 
        );
    }

    return $msg;
}

/*funcion que utilizo en programas para mostrar la duracion total */
function toTest($test){
	return "el test es ".$test;
}

function toHours($min,$type)
 { //obtener segundos
			$sec = $min * 60;
			//dias es la division de n segs entre 86400 segundos que representa un dia
			$dias=floor($sec/86400);
			//mod_hora es el sobrante, en horas, de la division de días; 
			$mod_hora=$sec%86400;
			//hora es la division entre el sobrante de horas y 3600 segundos que representa una hora;
			$horas=floor($mod_hora/3600); 
			//mod_minuto es el sobrante, en minutos, de la division de horas; 
			$mod_minuto=$mod_hora%3600;
			//minuto es la division entre el sobrante y 60 segundos que representa un minuto;
			$minutos=floor($mod_minuto/60);
			if($horas<=0)
			{
			$text = $minutos.' min';
			}
			elseif($dias<=0)
			{
			if($type=='round')
			//nos apoyamos de la variable type para especificar si se muestra solo las horas
			{
			$text = $horas.' hora';
			}
			else
			{
			$text = $horas." hora y ".$minutos." min";
			}
			}
			else
			{
			//nos apoyamos de la variable type para especificar si se muestra solo los dias
			if($type=='round')
			{
			$text = $dias.' dias';
			}
			else
			{
			$text = $dias." dias ".$horas." hora y ".$minutos." min";
			}
			}
			return $text; 
 }

 /* Nombres de roles de usuario */
 function wpbod_nombres_roles() {
     
    global $wp_roles;
     
    if ( ! isset( $wp_roles ) ) {
        $wp_roles = new WP_Roles();
    }
 
    $wp_roles->roles['contributor']['name'] = 'Profesor';
    $wp_roles->role_names['contributor'] = 'Profesor';
     
    $wp_roles->roles['subscriber']['name'] = 'Cliente';
	$wp_roles->role_names['subscriber'] = 'Cliente';
	
	$wp_roles->roles['customer']['name'] = 'Registro';
    $wp_roles->role_names['customer'] = 'Registro';

 
}
add_action('init', 'wpbod_nombres_roles');
/* si me vuelve a pasar lo de que no se logea a la primera https://wordpress.stackexchange.com/questions/51678/how-to-login-with-email-only-no-username/51714#51714*/

// First, change the required password strength
add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
    // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
    return 2; 
}

// Second, change the wording of the password hint.
add_filter( 'password_hint', 'smarter_password_hint' );
function smarter_password_hint ( $hint ) {
    $hint = 'Sugerencia: Para hacerla más fuerte usa mayúsculas y minúsculas, números y símbolos.';
    return $hint;
}

/**
 * Only copy the opening php tag if needed
 */
function sv_edit_my_memberships_actions( $actions ) {
    // remove the "Cancel" action for members
    unset( $actions['cancel'] );
    return $actions;
}
add_filter( 'wc_memberships_members_area_my-memberships_actions', 'sv_edit_my_memberships_actions' );
add_filter( 'wc_memberships_members_area_my-membership-details_actions', 'sv_edit_my_memberships_actions' );


/**
 * FacetWP, result count
 *
 */
add_filter( 'facetwp_result_count', function( $output, $params ) {
	//$output = 'Mostrando ' . $params['lower'] . '-' . $params['upper'] . ' de ' . $params['total'] . ' clases';
	$output = '' . $params['total'] . ' clases.';
    return $output;
}, 10, 2 );


add_filter( 'facetwp_sort_options', function( $options, $params ) {
	unset( $options['date_asc'] );
	unset( $options['date_desc'] );
	unset( $options['title_asc'] );
	unset( $options['title_desc'] );

    return $options;
}, 10, 2 );


add_filter( 'facetwp_sort_options', function( $options, $params ) {
	

	

	/*$options['visualizaciones'] = [
		'label' => 'más populares',
		'query_args' => [
		'orderby' => 'meta_value_num',
		'meta_key' => 'visualizaciones',
		'order' => 'DESC',
		]
		]; */


		$options = [

			'default' => [
				'label' => __( 'más nuevas', 'fwp' ),
				'query_args' => [
					'orderby' => 'date',
					'order' => 'DESC',
				]
			],

			'mas_populares' => [
				'label' => __( 'más populares', 'fwp' ),
				'query_args' => [
					'orderby' => 'meta_value_num',
					'meta_key' => 'visualizaciones',
					'order' => 'DESC',
					]
			],
	
		
		
		];

		$options['default']['label'] = 'más nuevas';


		


	//$options['title_asc']['label'] = 'A -> Z';
    return $options;
}, 10, 2 );


add_action( 'wp_ajax_sumar_visualizaciones', 'sumar_visualizaciones' );
add_action( 'wp_ajax_nopriv_sumar_visualizaciones', 'sumar_visualizaciones' ); // This lines it's because we are using AJAX on the FrontEnd.

function sumar_visualizaciones(){
    $fieldname = $_POST['fieldname']; // This variable will get the POST 'fieldname'
    $fieldvalue = $_POST['fieldvalue'];  // This variable will get the POST 'fieldvalue'
    $postid = $_POST['postid'];             // This variable will get the POST 'postid'
    update_post_meta($postid, $fieldname, $fieldvalue); // We will update the field.
	wp_die($fieldname = '', $fieldvalue = '', $postid = ''); // this is required to terminate immediately and return a proper response
} 

/*para que el search devuelva más de 200 resultados */
add_filter( 'facetwp_search_query_args', function( $search_args, $params ) {
    $search_args['posts_per_page'] = -1;
    return $search_args;
}, 10, 2 );


/*para que el search encuentre el acf de tipo user ya que si serarch busca por id */
add_filter( 'searchwp\source\post\attributes\meta\profesor', function( $meta_value, $args ) {

	if( ! empty( $meta_value ) && is_numeric( $meta_value[0] ) ){
		$user_data = get_userdata( (int)$meta_value[0] );
		if( ! empty( $user_data ) ){
			$meta_value = $user_data->display_name;
		}
	}

	return $meta_value;
}, 20, 2 );




add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('FrontageW00-font-css', get_stylesheet_directory_uri() . '/fonts/FrontageW00/stylesheet.css');
	wp_enqueue_style('Posterama2001W04-font-css', get_stylesheet_directory_uri() . '/fonts/Posterama2001W04/stylesheet.css');
	});
