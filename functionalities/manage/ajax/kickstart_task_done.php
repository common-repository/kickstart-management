<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_task_done() {
		global $wpdb;
		$id = intval($_POST["id"]);
		$status=2;
		$table = "wp_ks49_employee";
		$date = date("Y/m/d");
		if($wpdb->update( $table, array( 'taskstatus' => $status, 'compdate' => $date), array( "id" => $id)) === FALSE){
			echo "false";
		}else{
			echo "true";
		}
		wp_die();
}