<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function action49_role_submit(){
	$rolename = sanitize_text_field($_POST["rolename"]);
	$pertask = sanitize_text_field($_POST['pertask']);
	$permanage = sanitize_text_field($_POST['permanage']);
	if($pertask != null){
		if($permanage != null){
			    $custom = "BothPermission";
				ks49_addCustomRole($rolename,$custom);
		}else{
				$custom = "TaskPermission";
				ks49_addCustomRole($rolename,$custom);
		}
	}else{
		if($permanage != null){
			$custom = "ManagePermission";
			ks49_addCustomRole($rolename,$custom);
		}else{
			$custom = "null";
			ks49_addCustomRole($rolename,$custom);
		}
	}
}
function ks49_addCustomRole($rolename,$custom){
		if($custom == "null"){
			add_role(
	    		$rolename,	
	    		__($rolename),
	    		array(
	        		'read'   => true,  // true allows this capability
	    		)
			);
			echo 'null';
		}elseif($custom == "TaskPermission"){
			add_role(
	    		$rolename,
	    		__($rolename),
	    		array(
	    			'read' => true,
	        		'ks49_basic' => true,  // true allows this capability
	    		)	
			);
			echo 'TaskPermission';
		}elseif($custom == "ManagePermission" || $custom == "BothPermission"){
			add_role(
	    		$rolename,
	    		__($rolename),
	    		array(
	    			'read' => true,
	    			'edit_post' => true,
	        		'ks49_advance' => true,  // true allows this capability
	    		)
			);
			echo 'ManagePermission';
		}
	}

?>