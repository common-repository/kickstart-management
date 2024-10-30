<?php
/*
Plugin Name: kickStart-management
Description: A Solution For Company To Manage Its Employees By Tracking Real Time Projects And Tasks With Customer Relationship.
Version: 1.2.4
Author: Pandya Prahar
Author URI: http://praharpandya.blogspot.com
*/ 


// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    
}

class KickStart49
{
 	//Creating Instance of a class.

 	private static $instance_ks49;

 	/**
     * Initializes the KickStart() class
     *
     * Checks for an existing KickStart() instance
     * and if it doesn't find one, creates it.
     *
     * @return object
     */

 	public function ks49_main(){
 		if ( ! isset( self::$instance_ks49 ) && ! ( self::$instance_ks49 instanceof KickStart49 ) ) {
           	self::$instance_ks49 = new KickStart49;
           	self::$instance_ks49->ks49_setup();
        }
        return self::$instance_ks49;
 	}
 	 /**
     * Setup the plugin
     *
     * Sets up all the appropriate hooks and actions within our plugin.
     *
     * @return void
     *
     */
 	private function ks49_setup(){
 	     
 	    define( 'KickStart_File', __FILE__ );
		define( 'KickStart_Path', dirname( KickStart_File ) );
 	    // Register hooks
        
        register_activation_hook(__FILE__, array(__CLASS__, 'ks49_activation'));
        
        // Add actions

    	add_action( 'admin_menu', 'ks49_KickstartMain' );

    	//Registering and adding required assets for KickStart

    	self::ks49_register_assets();
    	
    	//Activating KickStart Tables on wordpress database

    	self::ks49_activation_table();

    	//Activating KickStart Tables on wordpress database

    	self::ks49_deactivation_table();

    	//calling core kickstart actions

    	add_action('init','ks49_primary_actions');
		
 	}
    	
    public function ks49_activation() {

    	//Activating Capability

        self::ks49_add_cap();
    }

    private static function ks49_add_cap() {

 		//Adding Default Capability to Administrator

 		$ks49_roles = get_editable_roles();
		foreach ($GLOBALS['wp_roles']->role_objects as $key => $role) {
            if ($key=="administrator" || $key=="editor") {
                $role->add_cap('ks49_advance');
            }elseif ($key=="suscriber" || $key=="contributor" || $key=="author") {
                $role->add_cap('ks49_basic');
            }
        }
 	}
 	private	function ks49_dbConnect(){
	    	
	    //Connecting Database

	    require_once(ABSPATH . 'wp-config.php');
	    $ks49_connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	    mysqli_select_db($ks49_connect, DB_NAME);
	    return $ks49_connect;
	}
	private function ks49_userRole(){
			
		//Fetching Current User Role

		$ks49_current_user = wp_get_current_user(); 
		if ( !($ks49_current_user instanceof WP_User) ) 
	       	return;
		$ks49_role = $ks49_current_user->roles;
		return $ks49_role;
	}
	private function ks49_userName(){
			
		//Fetching Current User's Name

		$ks49_current_user = wp_get_current_user(); 
		if ( !($ks49_current_user instanceof WP_User) ) 
	      	return;
		$ks49_uname = $ks49_current_user->display_name; 
		return $ks49_uname;
	}
 	
 	public function ks49_dashboard(){
		
		//Fething Current User's Role and UserName

		$ks49_role = self::ks49_userRole();
		$ks49_uname = self:: ks49_userName();
		
		//Including Dashboard Functionalities

		include(KickStart_Path . '/functionalities/dashboard/kickstart_dashboard.php');
		$ks49_kickdash = new ks49_dashboard;
		$ks49_connect = self::ks49_dbConnect();
		$ks49_kickdash -> ks49_dashboardopt($KickStart_Path,$ks49_role,$ks49_uname,$ks49_connect);
	}

	
	public function ks49_manage(){
			
		//Fething Current User's Role and UserName

		$ks49_role = self::ks49_userRole();
		$ks49_uname = self:: ks49_userName();
			
		//Including Managing Functionalities

		include(KickStart_Path . '/functionalities/manage/kickstart_manage.php');
		$ks49_kickman = new ks49_manage;
		$ks49_connect = self::ks49_dbConnect();
		$ks49_kickman -> ks49_manageopt($ks49_role,$ks49_uname,$ks49_connect);
	} 
	public function ks49_employee(){
			
		//Including Employee Functionalities

		include(KickStart_Path . '/functionalities/employee/kickstart_employee.php');
		//require_once(KickStart_Path . '/functionalities/employee/ajax/kickstart_addrole.php');
		$ks49_kickemp = new ks49_employee;
		$ks49_connect = self::ks49_dbConnect();
		$ks49_kickemp -> ks49_employeeopt($ks49_connect);
	}
	private function ks49_register_assets(){

		//Registering and adding required assets for KickStart

		add_action('init', 'ks49_assets');
	}
	private function ks49_activation_table(){
		register_activation_hook(__FILE__,'activate_KickStart_tables');
	}
	private function ks49_deactivation_table(){
		register_deactivation_hook(__FILE__,"deactivate_KickStart_tables");
	}
	
	 //Including primary kicktart actions
}
function ks49_primary_actions(){

		if(current_user_can('ks49_advance') && isset($_POST["call"]) ) {  

				if($_POST["call"] == "project_approve"){
						
					add_action( 'wp_ajax_my_action', 'action49_project_approve' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_project_approve.php');
						
				}elseif($_POST["call"] == "project_done"){
						
					add_action( 'wp_ajax_my_action', 'action49_project_done' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_project_done.php');
						
				}elseif($_POST["call"] == "project_assign"){
						
					add_action( 'wp_ajax_my_action', 'action49_project_assign' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_assign_project.php');
						
				}elseif($_POST["call"] == "task_assign"){
						
					add_action( 'wp_ajax_my_action', 'action49_task_assign' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_assign_task.php');
						
				}elseif($_POST["call"] == "task_done"){
						
					add_action( 'wp_ajax_my_action', 'action49_task_done' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_task_done.php');
						
				}elseif($_POST["call"] == "task_incomplete"){
						
					add_action( 'wp_ajax_my_action', 'action49_task_incomplete' );
					require_once(KickStart_Path .'/functionalities/manage/ajax/kickstart_task_incomplete.php');
						
				}elseif($_POST["call"] == "role_submit"){
						
					add_action( 'wp_ajax_my_action', 'action49_role_submit' );
					require_once(KickStart_Path .'/functionalities/employee/ajax/kickstart_addrole.php');
						
				}elseif($_POST["call"] == "add_employee"){
						
					add_action( 'wp_ajax_my_action', 'action49_add_employee' );
					require_once(KickStart_Path .'/functionalities/employee/ajax/kickstart_addemployee.php');
						
				}elseif($_POST["call"] == "add_customer"){
						
					add_action( 'wp_ajax_my_action', 'action49_add_customer' );
					require_once(KickStart_Path .'/functionalities/employee/ajax/kickstart_addcustomer.php');			
				}
		}elseif(current_user_can('ks49_basic') && isset($_POST["call"]) ){
 	
				if($_POST["call"] == "task_submit"){
						
					add_action( 'wp_ajax_my_action', 'action49_task_submit' );
					require_once(KickStart_Path .'/functionalities/dashboard/ajax/kickstart_task_submit.php');
						
				}
		}
	}

function ks49_assets() 
		{
		    wp_register_style( 'ks49_projectcss', plugins_url( '/assets/css/project.css', __FILE__ ) );
		    wp_register_style( 'ks49_bootstrapcss', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ) );
		    wp_register_style( 'ks49_datatablecss', plugins_url( '/assets/css/datatable.css', __FILE__ ) );
		    wp_register_script('ks49_datatablejs', plugins_url( '/assets/js/datatable.js', __FILE__ ), array( 'jquery' ),true);
		    wp_register_script('ks49_popperjs', plugins_url( '/assets/js/popper.min.js', __FILE__ ), array( 'jquery' ),true);
		    wp_register_script('ks49_bootstrapjs', plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ),true);
		    wp_register_script('ks49_customjs', plugins_url( '/assets/js/custom.min.js', __FILE__ ), array( 'jquery' ),true);

			// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
			wp_localize_script( 'ajax-script', 'ajax_object',
		            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}


function activate_KickStart_tables(){
     global $wpdb;
	 require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	 if (count($wpdb->get_var('SHOW TABLES LIKE "wp_ks49_employee"')) == 0){

		 $sql_query_to_create_table = "CREATE TABLE `wp_ks49_employee` (
		 `id` int(50) NOT NULL AUTO_INCREMENT,
		 `employee` varchar(50) DEFAULT NULL,
		 `givenby` varchar(100) DEFAULT NULL,
		 `project` varchar(100) DEFAULT NULL,
		 `task` varchar(200) DEFAULT NULL,
		 `taskstatus` int(50) DEFAULT NULL,
		 `taskdate` date DEFAULT NULL,
		 `compdate` date DEFAULT NULL,
		 PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1
		"; /// sql query to create table

	 	dbDelta($sql_query_to_create_table);

	 }if(count($wpdb->get_var('SHOW TABLES LIKE "wp_ks49_customer"')) == 0){

		 $sql_query_to_create_table = "CREATE TABLE `wp_ks49_customer` (
		 `id` int(50) NOT NULL AUTO_INCREMENT,
		 `name` varchar(100) DEFAULT NULL,
		 `email` varchar(100) DEFAULT NULL,
		 `subject` varchar(200) DEFAULT NULL,
		 `message` varchar(1000) DEFAULT NULL,
		 `budget` int(50) DEFAULT NULL,
		 `completion` date DEFAULT NULL,
		 `status` int(10) DEFAULT NULL,
		 `employee` varchar(300) DEFAULT NULL,
		 `givenby` varchar(100) DEFAULT NULL,
		 `project` varchar(200) DEFAULT NULL,
		 PRIMARY KEY (`id`),
		 UNIQUE KEY `unique_customer` (`email`,`subject`)
		) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1

		"; /// sql query to create table

	 dbDelta($sql_query_to_create_table);

	 }
}
function deactivate_KickStart_tables(){
   // uninstall mysql code
   global $wpdb;
   $wpdb->query("DROP table IF Exists wp_ks49_employee");
   $wpdb->query("DROP table IF Exists wp_ks49_customer"); 
}
function ks49_KickstartMain() {
		
	//Adding KickStart Main & Sub-Menu.

	add_menu_page(	
	    __( 'KickStart', 'textdomain' ),
	    'KickStart',
	    'ks49_basic',
	    'KickStart/HRM_Management',
	    'KickStart49::ks49_dashboard',
	    'dashicons-awards',
	    3
	);

    add_submenu_page('KickStart/HRM_Management', 'KickStart_Dashboard', 'Dashboard', 'ks49_basic', 'KickStart/HRM_Management' );
    add_submenu_page('KickStart/HRM_Management', 'KickStart_Manage', 'Projects', 'ks49_advance', 'KickStart/CRM_Management','KickStart49::ks49_manage' );
    add_submenu_page('KickStart/HRM_Management', 'KickStart_Users', 'Users', 'ks49_advance', 'KickStart_Management','KickStart49::ks49_employee' );
}	 

/**
 * Init the KickStart plugin
 *
 * @return KickStart the plugin object
 */

ks49_ProjectMain();

function ks49_ProjectMain(){
	return KickStart49::ks49_main();
}


?>
