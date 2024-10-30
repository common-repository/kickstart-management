<?php

// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_task_assign() {
		global $wpdb;
		$task = sanitize_text_field($_POST["task"]);
		$givenby = sanitize_text_field($_POST['uname']);
		$project = sanitize_text_field($_POST["project"]);
		$subject = sanitize_text_field($_POST["subject"]);
		$employee = sanitize_text_field($_POST['employee']);
		$date = date("Y/m/d");
		$taskstatus = 0;
		$compdate = "0000-00-00";
		$table = "wp_ks49_employee";
		if($wpdb->query( $wpdb->prepare("INSERT INTO wp_ks49_employee(employee,givenby,project,task,taskstatus,taskdate,compdate)VALUES(%s,%s,%s,%s,%d,%s,%s)",$employee,$givenby,$project,$task,$taskstatus,$date,$compdate))){
			echo "true";
		}else{
			echo "false";
		}
		wp_die();
}
		