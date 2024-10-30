<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class ks49_dashboard_design{
	public function ks49_dashboard_welcome_panel(){?>
		<html>
			<head><title>kickstart,employee,customer,management,ks,task,project,prahar,kick,employee manage,manage,hr,hr management,wordpress,wp,crm,customer manage</title></head>
			<body>
				<div class="jumbotron">
			      <h1 class="display-8 text-center section-title"><b>Welcome To The KickStart !</b></h1><br>
			      <hr class="my-8">
			      <p>No ongoing Projects assigned to you ! Just wait for some time</p>
			    </div>
			</body>
		</html><?php
	}
	public function ks49_dashboard_projectStatus($project,$givenby){?>
		<html>
			<head><title>kickstart,employee,customer,management,ks,task,project,prahar,kick,employee manage,manage,hr,hr management,wordpress,wp,crm,customer manage</title></head>
			<body>
			    <div class="jumbotron">
			    	<h4>Project Assigned</h4>
			    <hr class="my-8">
			      <h1 class="display-8 text-center section-title"><b>New Project : <u><?php echo $project;?></u> is assigned to you by <i><?php echo $givenby;?></i></b></h1><br>
			      <hr class="my-8">
			      <p>You can now start your project or just wait for new tasks !</p>
			    </div>
			</body>
		</html><?php
  	}
	public function ks49_dashboard_header_html(){?>
		<html>
			<head><title>kickstart,employee,customer,management,ks,task,project,prahar,kick,employee manage,manage,hr,hr management,wordpress,wp,crm,customer manage</title></head>
			<body>
				<div class="modal fade" id="ks49modal_submittask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content jumbotron">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Task Submitted</h5>
				      </div>
				      <div class="modal-body">
				        <div class="jumbotron">
				        	Congratulations ! Your task has been successfully submitted. Please wait for the review.
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="jumbotron">
			      <h1 class="display-8 text-center section-title"><b>Manage Your Day To Day Tasks</b></h1><br>
			      <hr class="my-8">
			      <div class="mainclass"> </div>
	<?php
	}
	public function ks49_dashboard_taskStatus1(){?>
				    <table class="table table-borderless table-hover hover" style="text-align:center;" id="myTable">
				      <thead>
				      	<tr>
					      <th>Project</th>
					      <th>Task</th>
					      <th>Assigned By</th>
					      <th>Assigned Date</th>
					      <th>Completion Date</th>
					      <th>Status</th>
					      <th>Completion</th>
					     </tr>
					  </thead>
					  <tbody>
	<?php
  	}
  	public function ks49_dashboard_taskStatus2($project,$task,$givenby,$taskdate,$compdate,$taskstatus,$id){?>
				    	<tr>
				    	  <td><?php echo $project; ?></td>
                          <td><?php echo $task; ?></td>
                          <td><?php echo $givenby; ?></td> 
                          <td><?php echo $taskdate; ?></td>
                          <td><?php echo $compdate; ?></td>

                        <?php
                        if($taskstatus == 0){
                      	$taskstatus = "Running";?>

                      	  <td><?php echo $taskstatus; ?></td>
                          <td><button type="button" onclick="ks49_tasksubmit('<?php echo $id;?>')" name='tasksub' class="btn btn-default upbtn">Done</button></td>
                      	</tr>
                    
                    	<?php
                    	}elseif($taskstatus == 1){
                      	$taskstatus = "Submitted";?>
                      	
                      	  <td><?php echo $taskstatus; ?></td>
                          <td><a><button type="button" class="btn btn-default">Submitted</button></td></a>
                      	</tr>

                      	<?php
                    	}elseif($taskstatus == 2){
                      	$taskstatus = "Completed";?>

                      	  <td><?php echo $taskstatus; ?></td>
                          <td><a><button type="button" class="btn btn-default">Completed</button></a></td>
                        </tr>
                    	<?php
                    	}
  	}
  	public function ks49_dashboard_taskStatus3(){?>
			  		</tbody>
			  	</table>
			  </div>
			</body>
		</html><?php
  	}
}
?>