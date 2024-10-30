<?php

// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_project_assign() {
		global $wpdb;
		$cust = sanitize_text_field($_POST["cust"]);
		$givenby = sanitize_text_field($_POST['uname']);		
		$project = sanitize_text_field($_POST["project"]);
		$subject = sanitize_text_field($_POST["subject"]);
		$employee = sanitize_text_field($_POST['emp']);
		$table = "wp_ks49_customer";
		if($wpdb->query($wpdb->prepare('UPDATE wp_ks49_customer SET employee = %s,givenby=%s,project=%s WHERE name = %s AND subject = %s', $employee, $givenby,$project,$cust,$subject))){
			echo "true";
		}else{
			echo "false";
		}

		wp_die();
}