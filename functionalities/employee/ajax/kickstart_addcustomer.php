<?php

// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_add_customer() {
		global $wpdb;
		$custname = sanitize_text_field($_POST["custname"]);
		$custsubject = sanitize_text_field($_POST["custsubject"]);
		$custmessage = sanitize_text_field($_POST["custmessage"]);
		$custemail = sanitize_email($_POST['custemail']);
		$custbudget = intval($_POST['custbudget']);
		$custdate = sanitize_text_field($_POST['custdate']);
		$table = "wp_ks49_employee";
		if($wpdb->query( $wpdb->prepare("INSERT INTO wp_ks49_customer(name,email,subject,message,budget,completion)VALUES(%s,%s,%s,%s,%d,%s)",$custname,$custemail,$custsubject,$custmessage,$custbudget,$custdate))){
			echo "true";
		}else{
			echo "false";
		}
		wp_die();
}
		