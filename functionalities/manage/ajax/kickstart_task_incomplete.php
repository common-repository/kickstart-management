<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_task_incomplete() {
		global $wpdb;
		$id = intval($_POST["id"]);
		$status=0;
		$table = "wp_ks49_employee";
		if($wpdb->update( $table, array( 'taskstatus' => $status), array( "id" => $id)) === FALSE){
			echo "false";
		}else{
			echo "true";
		}
		wp_die();
}