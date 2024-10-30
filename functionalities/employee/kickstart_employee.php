<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class ks49_employee{

	public function ks49_employeeopt($connect){

		//Including Additional css and js libraries.

		$this -> ks49_includes($connect);

		//Authenticating Users

		$this -> ks49_unAuthorizedAccess();
		
		//Adding User Current Status as Employer/Customer

		$this -> ks49_userStatus($connect);

		// Adding listeners


		//Adding header part

    	$this -> ks49_navHeader();
		
    	// Adding Role Functionalities

		$this -> ks49_addrole();
		
		// Adding Employee Forms

		$this -> ks49_addemployee();
		
		// Adding Customer Forms

		$this -> ks49_addcustomer();

	}
	
	private function ks49_includes($connect){
		define( 'kick_path', plugins_url( '../../assets', __FILE__ ) );
		wp_enqueue_style( 'ks49_projectcss');
		wp_enqueue_style( 'ks49_bootstrapcss');
		wp_enqueue_script( 'ks49_datatablejs');
	    wp_enqueue_script( 'ks49_popperjs');
	    wp_enqueue_script( 'ks49_bootstrapjs');
	    wp_enqueue_script( 'ks49_customjs');
	    wp_add_inline_script( 'ks49_datatablejs', 'jQuery(document).ready(function() {jQuery("table.hover").DataTable();} );' );
	    wp_add_inline_script( 'ks49_bootstrapjs', 'jQuery(\'[data-toggle="popover"]\').popover()' );
	    wp_add_inline_script( 'ks49_customjs', "function ks49_rolesubmit() {
				var taskval = jQuery('input[name=\"pertask\"]:checked').val();
				var manageval = jQuery('input[name=\"permanage\"]:checked').val();
				var data = {
					'action':'my_action',
              		'call' : 'role_submit',
					'rolename': jQuery('#rolename').val(),
					'pertask': taskval,
					'permanage': manageval,
				};	 
				jQuery('#ks49modal_rolesubmit').modal('show');
				jQuery.post(ajaxurl, data, function(response) {			
					location.reload(true);
				});
				
			}function ks49_emp_action() {
					var empname = jQuery('#empname').val();
					var empemail = jQuery('#empemail').val();
					var emprolename = jQuery('#emprolename').val();				
					var data = {
						'action':'my_action',
              			'call' : 'add_employee',
						'empname': empname,
						'empemail': empemail,
						'emprolename': emprolename,
					};
					jQuery('#ks49modal_employee').modal('show');	 
					jQuery.post(ajaxurl, data, function(response) {
						location.reload(true);
					});
					
				}function ks49_cust_action(event) {
					var custname = jQuery('#custname').val();
					var custemail = jQuery('#custemail').val();
					var custsubject = jQuery('#custsubject').val();
					var custmessage = jQuery('#custmessage').val();
					var custdate = jQuery('#custdate').val();
					var custbudget = jQuery('#custbudget').val();
					var data = {
						'action':'my_action',
              			'call' : 'add_customer',
						'custname': custname,
						'custemail': custemail,
						'custsubject': custsubject,
						'custmessage': custmessage,
						'custdate': custdate,
						'custbudget': custbudget,
					};
					jQuery('#ks49modal_customer').modal('show');	 
					jQuery.post(ajaxurl, data, function(response) {
						location.reload(true);	
					});					
			}" );
		require_once("modules/employee_design.php");
	}
	private function ks49_unAuthorizedAccess(){
    	if ( !current_user_can( 'manage' ) )  {
    		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    	}
  	} 		
	private function ks49_userStatus($connect){
    	$ks49_emp = mysqli_query($connect,"SELECT id FROM wp_users");
    	$ks49_empno = mysqli_num_rows($ks49_emp);
    	$ks49_cust=mysqli_query($connect,"SELECT id FROM wp_kS49_customer");
    	$ks49_custno = mysqli_num_rows($ks49_cust);
    	ks49_employee_design::ks49_employee_userStatus($ks49_empno,$ks49_custno);
  	}
  	private function ks49_navHeader(){
    	ks49_employee_design::ks49_employee_navigation();
	}
 	
	private function ks49_addrole(){

		ks49_employee_design::ks49_employee_addrole();
	}
  	private function ks49_addemployee(){
    	ks49_employee_design::ks49_employee_addemployee();
  	}
  	public function ks49_addcustomer(){
  		ks49_employee_design::ks49_employee_addcustomer();
	}
}

/**
 * Getting wp-role Information
 *
 * @return Roles
 */
function ks49_get(){

	$roles = get_editable_roles();
	return $roles;
}

