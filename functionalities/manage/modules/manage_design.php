<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class ks49_manage_design{
	public function ks49_manage_projectStatus($approveno,$unapproveno,$uapproveno){?>
		<html><head><title>kickstart,employee,customer,management,ks,task,project,prahar,kick,employee manage,manage,hr,hr management,wordpress,wp,crm,customer manage</title></head><body>
		<div id="project" style="text-align:center;align-items:center;">
      		<div class="jumbotron">
		      <h1 class="display-8">PROJECTS</h1><br>
		      <span><a><button type="button" class="btn btn-default">
		      Running <span class="badge badge-success su"><?php echo $approveno;?></span>
		      </button></a></span>
		      <a><button type="button" class="btn btn-default">
		      Pending <span class="badge badge-danger da"><?php echo $unapproveno;?></span>
		      </button></a>
		      <span><a><button type="button" class="btn btn-default">
		      Completed <span class="badge badge-info su"><?php echo $uapproveno;?></span>
		      </button></a></span>
		      <hr class="my-8">
		      <p>Here are the list of projects given by customers.</p><br>
		      <div class="mainclass"></div>
		      <div class="modal fade" id="ks49modal_approveproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Request Approved</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! Succesfully approved request of customer.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_projectdone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Project Compeleted</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! Succesfully completed project of customer.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_assignproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Project Created</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! New Project is created and assigned to your Employees.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_assigntask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">New Task Assigned</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	New Task is assigned to your Employees.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_taskdone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Task Completed</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! Your Employee finished his/her task successfully.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="modal fade" id="ks49modal_taskincomplete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Task Incomplete</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Incompleted Task is given back to employee.
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
  	public function ks49_manage_navigation(){?>
				<ul class="nav nav-tabs" role="tablist">
			      <li class="nav-item">
			        <a class="nav-link active" href="#status" role="tab" data-toggle="tab">Status</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#assproj" role="tab" data-toggle="tab">Assign Projects</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#asstask" role="tab" data-toggle="tab">Assign Tasks</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#mgproj" role="tab" data-toggle="tab">Manage Projects</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#mgtask" role="tab" data-toggle="tab">Manage Tasks</a>
			      </li>
			    </ul> 
			    <div class="tab-content">
	<?php	
  	}
  	public function ks49_manage_customerStatus1(){?>
					<br>
				    <div role="tabpanel" class="tab-pane fade in active show" id="status">
				      <table class="table table-borderless table-hover hover order-column" style="text-align:center;" id="myTable">
				      <thead><tr>
				        <th scope="col">  Customer's Name  </th>
				        <th scope="col">  Email  </th>
				        <th scope="col">  Subject  </th>
				        <th scope="col">  Message  </th>
				        <th scope="col">  Estimated Budget  </th>
				        <th scope="col">  Estimated Completion Date  </th>
				        <th scope="col">  Action  </th>
				        <th scope="col">  Status  </th>
				      </tr></thead>
				      <tbody>
	<?php	
  	}
  	public function ks49_manage_customerStatus2($name,$email,$subject,$message,$budget,$completion,$id,$status){?>
							<tr><th scope='row'><?php echo $name;?></th>
				            <td><?php echo $email;?></td>
				            <td><?php echo $subject;?></td>
				            <td><div class="projlong"><?php echo $message;?></div></td>
				            <td><?php echo $budget;?></td>
				            <td><?php echo $completion;?></td><?php
						      if($status == 1){
						        $status = "Running";?>
						        <td><button type="button" name='projcomp' onclick='ks49_projectDone("<?php echo $id;?>")' class="btn btn-default upbtn">Done</button></td>
						          <td><?php echo $status;?></td></tr><?php
						      }elseif($status == 0){
						        $status = "Pending";?>
						        <td><button type="button" name="projapp"  onclick='ks49_projectApprove("<?php echo $id;?>")' class="btn btn-default upbtn">Approve</button></td>
						        <td><?php echo $status;?></td></tr><?php
						      }elseif($status == 2){
						        $status = "Completed";?>
						        <td><a><button type="button"  class="btn btn-default">Congrats</button></a></td>
						          <td><?php echo $status;?></td></tr><?php
						      }
  	}
  	public function ks49_manage_customerStatus3(){?>
					</tbody>
				  </table>
				</div>
	<?php	
  	}
  	public function ks49_manage_assignProject1($uname){?>
				<div role="tabpanel" class="tab-pane fade" id="assproj">
			        <table class="tableproject col-12 align-items-center" style="text-align:center;">
			        <thead><tr>
			          <th scope="col"> Assign Project </th>
			        </tr></thead><tbody><tr><td>
			        	<form class="row container align-items-center mx-auto" method="post">
			      	<div class="col-3"></div>
			      	<div class="col-6">
				      <div class="form-group"><br>
				      <input type="text" class="form-control" name="project" id="projectAssignName" placeholder="Project Name"></div><br>
				      <input type="text" class="form-control" value="<?php echo $uname;?>" name="uname" id="projectAssignUname" style="display:none;">
				      <label class="alert alert-info alert-dismissible">
				      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				      <b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b> For Actual Mapping Between <b>Customer's Project</b> And <b>Your Project</b> , We Require You To Select Same Customer With Their Subject To Avoid Future Errors.</label><br><br>
					<?php	
  	}
}
?>
