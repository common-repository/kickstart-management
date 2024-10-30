<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_add_employee(){
	$empname = sanitize_text_field($_POST["empname"]);
	$empemail = sanitize_email($_POST['empemail']);
	$emprolename = sanitize_text_field($_POST['emprolename']);	
	if ( !username_exists($empname) && !email_exists($empemail)) {		
		$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
		$userdata = array(
			  'role'  =>  $emprolename,
			  'user_email'  =>  $empemail,
			  'user_login'  =>  $empname,
			  'user_pass' => $random_password,
		);
		$user_id = wp_insert_user( $userdata );
		if ( ! is_wp_error( $user_id ) ) {echo "success";}
		else {echo "error";}
	}else{echo "same";}
}
?>