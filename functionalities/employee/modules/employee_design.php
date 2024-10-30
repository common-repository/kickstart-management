<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class ks49_employee_design{
	public function ks49_employee_userStatus($ks49_empno,$ks49_custno){?>
		<html><head><title>kickstart,employee,customer,management,ks,task,project,prahar,kick,employee manage,manage,hr,hr management,wordpress,wp,crm,customer manage</title></head><body>
		<div id="project" style="text-align:center;align-items:center;">
      		<div class="jumbotron">
	      		<h1>USERS</h1><br>
	      		<span><a><button type="button" class="btn btn-default">
	      		Employees <span class="badge badge-success su"><?php echo $ks49_empno;?></span>
	      		</button></a></span>
	      		<a><button type="button" class="btn btn-default">
	      		Customers <span class="badge badge-info da"><?php echo $ks49_custno;?></span>
	      		</button></a>
	      		<hr class="my-8">
	      		<p>Here You Can Add new Employees or Customers.</p><br>
	      		<div class="mainclass"></div>

<!-- Modal -->
				<div class="modal fade" id="ks49modal_rolesubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Role Created</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! You have succesfully created a new Role.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">New Employee Added</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! You have successfully created a new Employee.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Customer's Request</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	A new customer's request is arrived.Please go to the customer's section for approval.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
	<?php	
  	}
  	public function ks49_employee_navigation(){?>
				<ul class="nav nav-tabs" role="tablist">
			      	<li class="nav-item">
			        	<a class="nav-link active" href="#role" role="tab" data-toggle="tab">Add New Role</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#employee" role="tab" data-toggle="tab">Add New Employees</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#customer" role="tab" data-toggle="tab">Add Customers</a>
			      	</li>
			    </ul> 
			    <div class="tab-content">
	<?php	
  	}
  	public function ks49_employee_addrole(){?>
					<div role="tabpanel" class="tab-pane fade in active show" id="role">
			        	<table class="tableproject col-12 align-items-center" style="text-align:center;">
			        		<thead><tr>
			          			<th scope="col"> Add New Role / Responsibility </th>
			        		</tr></thead>
			        		<tbody><tr><td>
			        		<div class="roleclass"></div>
			    			<form id="role" onsubmit="ks49_rolesubmit()" class="row container align-items-center mx-auto" action="" method="post">
			      				<div class="col-3"></div>
			    				<div class="col-6">
			      					<div class="form-group"><br>
								  		<label class="alert alert-info alert-dismissible">
								  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  		<b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b>  You can Make Different Roles for Employees. Like: Developer, Trainer, .. etc.</label>
								  		<label class="alert alert-success alert-dismissible">
								  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  		<b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b>  You Can Also Use Our <b>Default</b> Roles. In This Case Just Skip This Step And Create Your First Employee.</label><br>
								  		<input type="text" class="form-control" name="rolename" id="rolename" placeholder="Enter New Role" Required>
								  	</div><br>
								  	<div class="form-group">
								  		<label class="title">Select Permissions</label><br>
								  		<input type="checkbox" class="form-control" checked name="pertask" id="pertask">
								  		<label for="pertask"> Can Able to submit task to Manager</label>
								  		<input type="checkbox" class="form-control" name="permanage" id="permanage">
								  		<label for="permanage"> Can Manage Other Employees</label>
								  	</div>
								  	<button type="submit" name="submit" class="btn btn-primary">Add Role</button></div>
							</form></td></tr></tbody>
						</table>
					</div>
	<?php	
  	}
  	public function ks49_employee_addemployee(){?>
					<div role="tabpanel" class="tab-pane fade" id="employee">
			      		<table class="tabletask col-12" style="text-align:center;">
			        		<thead>
			        			<tr>
			          				<th scope="col">  Add Employees  </th>
			        			</tr>
			        		</thead>
			        		<tbody><tr><td>
			        		<div class="empclass"></div>
			        		<form onsubmit="ks49_emp_action()" class="row container align-items-center mx-auto" action="" method="post">
				      			<div class="col-3"></div>
							    <div class="col-6">
							    	<div class="form-group"><br>
							      		<input type="text" class="form-control" name="empname" id="empname" placeholder="Enter Employee Name" Required>
							      	</div>
								    <div class="form-group"><br>
								      	<input type="email" class="form-control" autocomplete="email" name="empemail" id="empemail" placeholder="Enter Employee\'s Email" Required>
								    </div>				      	
								    <div class="form-group">
								        <label for="selectrole" class="title">Select Role</label>
								        <select class="form-control" name="emprolename" id="emprolename" Required><?php 
								      		$roles = ks49_get();
								      		foreach($roles as $role => $r) {
								          	echo "<option value=\"$role\">".$role."</option>";
								        	}?>   
								    	  </select>
								   	</div><br>
								 	<button type="submit" name="submit" class="btn btn-primary">Add Employee</button><br><br>
								 	<div class="form-group"><br>
								    	<label class="title">Information Of Different Roles</label><br>
								      	<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="Administrator" data-content="-> On a regular WordPress install, Administrator is <b>The Most Powerful</b> user role.<br>-> This role is basically reserved for <b>Site Owners</b> and gives you the <b>Full Control</b> of your WordPress site.<br>-> If you are running a multi-user WordPress site, then <i>you need to be very careful who you assign an administrator user role</i>.<br>** <b>Default KickStart Role : Manager </b> **"> Administrator </a>
								      	<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="Editor" data-content="-> Users with the editor role in WordPress have full control on the <b>Content Sections</b> your website. <br>-> They can add, edit, publish, and delete any posts on a WordPress site including the ones written by others. An editor can moderate, edit, and delete comments as well.<br>-> Editors do not have access to change your site settings, install plugins and themes, or add new users.<br>** <b>Default KickStart Role : Manager </b> **"> Editor </a>
								      	<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="Author" data-content="-> As the name suggests, users with the author role can write, edit, and publish their own posts. They can also delete their own posts, even if they are published.<br>-> When writing posts, authors cannot create categories however they can choose from existing categories. On the other hand, they can add tags to their posts.<br>-> Authors can view comments even those that are pending review, but they cannot moderate, approve, or delete any comments.<br>-> They do not have access to settings, plugins, or themes, so it is a fairly low-risk user role on a site with the exception of their ability to delete their own posts once they’re published.<br>** <b>Default KickStart Role : Employer </b> **"> Author </a>
								      	<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="Contributor" data-content="-> Contributors can add new posts and edit their own posts, but they cannot publish any posts not even their own. When writing posts they can not create new categories and will have to choose from existing categories. However, they can add tags to their posts.<br>-> The biggest disadvantage of a contributor role is that they cannot upload files<br>-> Contributors can view comments even those awaiting moderation. But they cannot approve or delete comments.<br>-> They do not have access to settings, plugins, or themes, so they cannot change any settings on your site.<br>** <b>Default KickStart Role : Employer </b> **"> Contriibutor </a>
								      	<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="Subscriber" data-content="-> Users with the subscriber user role can login to your WordPress site and update their user profiles. They can change their passwords if they want to. They cannot write posts, view comments, or do anything else inside your WordPress admin area.<br>-> This user role is particularly useful if you require users to login before they can read a post or leave a comment<br>** <b>Default KickStart Role : Employer </b> **"> Subscriber </a><br><br>
								   		<a class="btn btn-info" href="#" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="bottom" title="KickStart Roles" data-content="-> Users created with the kickstart_plugin role can only use this plugin.<br>-> They are the <b>Most Secure</b> Roles.<br>-> They cant access other wordpress Functionalities.<br>** They are devided into 2 Categories :Manager,Employer **"> KickStart Roles </a>		
								    </div><br>
								 	<label class="alert alert-info alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b>  After Creating Employee with these Basic Information, Employee can <b>Update</b> his/her Profile Later.
									</label>
									<label class="alert alert-primary alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  	<b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b>  Employee can change Random Generated Password by Clicking on <b>Forgot Password</b> Provided in Login.
									</label><br>
								</div>
							</form>
						 </td></tr></tbody>
					</table>
				</div>
	<?php	
  	}
  	public function ks49_employee_addcustomer(){?>
				<div role="tabpanel" class="tab-pane fade" id="customer">
			    	<table class="tableproject col-12 align-items-center" style="text-align:center;">
			        	<thead><tr>
			          		<th scope="col"> Add New Customer </th>
			        	</tr></thead>
			        	<tbody><tr><td>
			        	<div class="custclass"></div>
			    		<form onsubmit="ks49_cust_action()" class="row container align-items-center mx-auto" action="" method="post" enctype="multipart/form-data">
					      	<div class="col-3"></div>
					    	<div class="col-6">
					      	<div class="form-group"><br>
					      		<input type="text" class="form-control" name="custname" id="custname" placeholder="Enter Customer's Name" Required>
					      	</div><br>
					      	<div class="form-group">
					      		<input type="email" class="form-control" autocomplete="email" name="custemail" id="custemail" placeholder="Enter Customer' Email" Required>
					      	</div><br>
					      	<label class="alert alert-info alert-dismissible">
					      	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					      	<b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b>   Here is the Subject and Message given by Customer, Either by Email or Call. If you Already have a <b>Contact Us Section</b> in your Site for Customers, Then Just Leave this section & Go to the <i><b><a>https://praharpandya.blogspot.com</a></b></i>. Otherwise You can Continue Here.</label>
					      	<div class="form-group">
					      		<input type="text" class="form-control" name="custsubject" id="custsubject" placeholder="Enter Subject" Required>
					      	</div><br>
					      	<div class="form-group">
					      		<textarea rows="5" class="form-control" name="custmessage" id="custmessage" placeholder="Enter Message" Required></textarea>
					      	</div><br>
					      	<div class="form-group">
					      		<input type="number" class="form-control" name="custbudget" id="custbudget" placeholder="Estimated Budget" Required>
					      	</div><br>
					      	<div class="form-group">
					      		<input type="date" class="form-control" name="custdate" id="custdate" placeholder="Estimated Completion Date" aria-describedby="datehelp" Required>
					      		<small id="datehelp" class="text-muted">
					      			Estimated Completion Date
					    		</small>
					      	</div><br>
					      <button type="submit" name="submit" class="btn btn-primary">Add Customer</button></div>
					    </form></td></tr></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</body></html>
	<?php	
  	}
}
?>
