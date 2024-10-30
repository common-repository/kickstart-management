<?php 

class ks49_manage{

  public function ks49_manageopt($role,$uname,$connect){ 


    //Authenticating Users
    $this -> ks49_includes($connect);

    $this -> ks49_unAuthorizedAccess();
    
    //Project Status Information

    $this -> ks49_projectStatus($connect);
    
    // Adding listeners
    
    //Adding header part

    $this -> ks49_navHeader();

    //Adding Core Functionalities.
    $this -> ks49_projectCustomStatus($connect);
    $this -> ks49_assignProject($connect,$uname);
    $this -> ks49_assignTask($connect,$uname);
    $this -> ks49_manageProject($connect,$uname);
    $this -> ks49_manageTask($connect,$uname);
  }
  private function ks49_includes($connect){
    define( 'kick_path', plugins_url( '../../assets', __FILE__ ) ); 
    wp_enqueue_style( 'ks49_bootstrapcss');
    wp_enqueue_style( 'ks49_projectcss'); 
    wp_enqueue_style( 'ks49_datatablecss');
    wp_enqueue_script( 'ks49_datatablejs');
    wp_enqueue_script( 'ks49_popperjs');
    wp_enqueue_script( 'ks49_bootstrapjs');
    wp_enqueue_script( 'ks49_customjs');
    wp_add_inline_script( 'ks49_datatablejs', 'jQuery(document).ready(function() {jQuery("table.hover").DataTable();} );' );
    wp_add_inline_script( 'ks49_datatablejs', "function ks49_projectApprove(id) {
            var data = {
              'action':'my_action',
              'call' : 'project_approve',
              'id': id,
          };   
          jQuery('#ks49modal_approveproject').modal('show');
          jQuery.post(ajaxurl, data, function(response) {
            location.reload(true);
          });
        }
        function ks49_projectDone(id) {
            var data = {
              'action':'my_action',
              'call' : 'project_done',
              'id': id,
          };   
          jQuery('#ks49modal_projectdone').modal('show');
          jQuery.post(ajaxurl, data, function(response) {
            location.reload(true);
          });
        }function ks49_projectAssign() {
            var uname = jQuery('#projectAssignUname').val();
            var employee = [];
            jQuery('input[name=\"projectAssignEmployee[]\"]:checked').each(function(){
              employee.push(this.value);
            }); 
            var cust = jQuery('#projectAssignCust').val();
            var subject = jQuery('#projectAssignSubject').val();
            var project = jQuery('#projectAssignName').val();
            var emp = '' + employee.toString(); + '';
            var data = {
            'action':'my_action',
            'call' : 'project_assign',
            'emp': emp,
            'cust': cust,
            'subject': subject,
            'project': project,
            'uname': uname,
          };   
          jQuery('#ks49modal_assignproject').modal('show');
          jQuery.post(ajaxurl, data, function(response) {
             location.reload(true);
          });   
        }function ks49_taskDone(id) {
            var data = {
              'action':'my_action',
              'call' : 'task_done',
            'id': id,
          };   
          jQuery('#ks49modal_taskdone').modal('show');
          jQuery.post(ajaxurl, data, function(response) {
           location.reload(true);
          });
              
        }
        function ks49_taskIncomplete(id) {
            var data = {
              'action':'my_action',
              'call' : 'task_incomplete',
            'id': id,
          }; 
          jQuery('#ks49modal_taskincomplete').modal('show');  
          jQuery.post(ajaxurl, data, function(response) {
           location.reload(true);
          });
              
        }function ks49_taskAssign(event) {
            var uname = jQuery('#taskAssignUname').val();
            var employee =  jQuery('input[name=\"taskAssignEmployee\"]:checked').val();
            var task = jQuery('#taskAssignName').val();
            var project = jQuery('#taskProjectName').val();
            var data = {
            'action':'my_action',
            'call' : 'task_assign',
            'uname': uname,
            'employee': employee,
            'task': task,
            'project': project,
          };   
          jQuery('#ks49modal_assigntask').modal('show');  
          jQuery.post(ajaxurl, data, function(response) {
            location.reload(true);
          }); 
        }" );
  require_once("modules/manage_design.php");  
  }
  /**
  * Displaying Alerts as a result of any event occurs
  *
  * @since 1.0 Get Methods were used
  *
  * @since 1.0.1 Cookies used for fast execution.
  * 
  * @return void
  *
  */

  // Authenticating User 

  private function ks49_unAuthorizedAccess(){
    if ( !current_user_can( 'ks49_advance' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
  }

  // Creating Customer Table 

  

  // init basic information

  private function ks49_projectStatus($connect){
    $executeon=mysqli_query($connect,"SELECT status FROM wp_kS49_customer WHERE status=1");
    $approveno = mysqli_num_rows($executeon);
    $executeoff=mysqli_query($connect,"SELECT status FROM wp_kS49_customer WHERE status=0");
    $unapproveno = mysqli_num_rows($executeoff);
    $executeof=mysqli_query($connect,"SELECT status FROM wp_kS49_customer WHERE status=2");
    $uapproveno = mysqli_num_rows($executeof);

   global $wpdb;

   $table_name = $wpdb->prefix . "kS49_customer"; 

    ks49_manage_design::ks49_manage_projectStatus($approveno,$unapproveno,$uapproveno);
  }

  // Adding navigation headers 

  private function ks49_navHeader(){
    ks49_manage_design::ks49_manage_navigation();
  }

  // Adding Customer Information

  private function ks49_projectCustomStatus($connect){

    ks49_manage_design::ks49_manage_customerStatus1();
    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
    while($datarow = mysqli_fetch_array($execute)){     
      $id = $datarow["id"];
      $name = $datarow["name"];
      $email = $datarow["email"];
      $subject = $datarow["subject"];
      $message = $datarow["message"];
      $budget = $datarow["budget"];
      $completion = $datarow["completion"];
      $status = $datarow["status"];
      ks49_manage_design::ks49_manage_customerStatus2($name,$email,$subject,$message,$budget,$completion,$id,$status);
      }
    ks49_manage_design::ks49_manage_customerStatus3();
  }

  // Adding Assign Project Functionalities

  private function ks49_assignProject($connect,$uname){

    $no = 1;
    ks49_manage_design::ks49_manage_assignProject1($uname); 
    echo '
      <div class="row">
      <div class="form-group col-6">
      <label for="cust" class="title">Select Customer</label>
      <select class="form-control" name="cust" id="projectAssignCust">';  
      $executepro=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
      while($datarow = mysqli_fetch_array($executepro)){
        $name = $datarow["name"]; 
            echo "<option value=\"$name\">".$name."</option>";
      }
    echo ' </select></div>
      <div class="form-group col-6">
      <label for="subject" class="title">Select Subject</label>
      <select class="form-control" name="subject" id="projectAssignSubject">';
      $executepro=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
      while($datarow = mysqli_fetch_array($executepro)){
        $subject = $datarow["subject"]; 
            echo "<option value=\"$subject\">".$subject."</option>";
      }
    echo ' </select></div></div><br>';
    $no = 0;
    echo '<label class="title">Select Employees</label><div class="form-group form-check">';
    $execute=mysqli_query($connect,"SELECT display_name FROM wp_users");
        while($datarow = mysqli_fetch_array($execute)){
          $userno = mysqli_num_rows($execute);
          if($no <= $userno){
            $empname = $datarow["display_name"];
            echo " 
            <input type=\"checkbox\" class=\"form-check-input\" name=\"projectAssignEmployee[]\" id=\"emp{$no}\" value=\"{$empname}\">
            <label class=\"form-check-label\" for=\"emp{$no}\"> {$empname} </label>";
            $no++;
          } 
        }
    echo "</div><br>
      <button onclick='ks49_projectAssign()' type='submit' name='submit' class='btn btn-primary'>Assign Project</button></div>
      </form></td></tr></tbody></table></div>";
  }

  //adding assigntask functionalities

  private function ks49_assignTask($connect,$uname){

    echo '
      <div role="tabpanel" class="tab-pane fade" id="asstask">
      <table class="tabletask col-12" style="text-align:center;"><thead><tr>
          <th scope="col">  Assign Task  </th>
      </tr></thead><tbody><tr><td>';
    $no = 1;
    echo '<form class="row container align-items-center mx-auto" method="post">
      <div class="col-3"></div>';
    echo '<div class="col-6">
      <input type="text" class="form-control" value="'.$uname.'" name="uname" id="taskAssignUname" style="display:none;">
      <div class="form-group"><br>
      <label class="alert alert-info alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b><i class="fa fa-lightbulb-o" aria-hidden="true"></i></b> Only <b>Running</b>  Projects Will Appear Here.</label><br><br>
      <label for="taskProjectName" class="title">Select Project</label>
      <select class="form-control" name="projectname" id="taskProjectName">'; 
      $executepro=mysqli_query($connect,"SELECT project,status FROM wp_kS49_customer");
      while($datarow = mysqli_fetch_array($executepro)){
        $status = $datarow["status"];
        $project = $datarow["project"];
        if($status == 1 && isset($project)){
          echo $project;
          echo "<option value=\"$project\">".$project."</option>";
        }   
      }
    echo '</select></div>';
    $no = 0;
    echo '<label class="title">Select Employees</label>
      <div class="form-group form-check">';
    $execute=mysqli_query($connect,"SELECT display_name FROM wp_users");
    while($datarow = mysqli_fetch_array($execute)){
      $userno = mysqli_num_rows($execute);
      if($no <= $userno){
        $empname = $datarow["display_name"];  
        echo " 
        <label class='radio-inline' for=\"empt{$no}\">
        <input type='radio' value=\"{$empname}\" id=\"empt{$no}\" name=\"taskAssignEmployee\">{$empname}
        </label>";
          $no++;
      } 
    }
    echo '</div>
      <div class="form-group">
      <textarea class="form-control align-items-center" id="taskAssignName" name="task" rows="6" placeholder="Task Detail"></textarea>
      </div>';
    echo '
      <button type="submit" onclick="ks49_taskAssign()" name="submit" class="btn btn-primary">Assign Task</button></div>
      </form></td></tr></tbody></table></div>
      ';
  }

  // Adding Manage Project Functionalities

  private function ks49_manageProject($connect,$uname){
    echo '
    <div role="tabpanel" class="tab-pane fade" id="mgproj">
    <table class="table table-borderless table-hover hover" style="text-align:center;"><thead><tr>
      <th scope="col">  Project  </th>
      <th scope="col">  Employees Involved  </th>
      <th scope="col">  Estimated Completion Date  </th>
      <th scope="col">  Status  </th>
      <th scope="col">  Action  </th>
    </tr></thead><tbody>';
    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
    while($datarow = mysqli_fetch_array($execute)){
      $id = $datarow["id"];
      $name = $datarow["name"];
      $givenby = $datarow["givenby"];
      if($givenby == $uname){
        $project = $datarow["project"];
        $employee = $datarow["employee"];
        $completion = $datarow["completion"];
        $status = $datarow["status"];
        if($status == 1){
          $status = "Running";
          echo "<tr>
            <th scope='row'>".$project."</th>
            <td>".$employee."</td>
            <td>".$completion."</td>
            <td>".$status."</td>
            <td><button type=\"button\" onclick='ks49_projectDone(\"".$id."\",\"".$name."\")' name='projcomp' class=\"btn btn-default upbtn\">Done</button></td>           
            </tr>";
        }elseif($status == 0){
          $status = "Pending";
        }elseif($status == 2){
          $status = "Completed";
          echo "<tr><th scope='row'>".$project."</th>
              <td>".$employee."</td>
              <td>".$completion."</td>
              <td>".$status."</td>
              <td><a><button type=\"button\" name='projcomp' class=\"btn btn-default upbtn\">Congrats</button></a> </td></tr>";
          }  
      }
    }
    echo "</tbody></table></div>";
  }

  // Adding Manage Task Functionalities

  private function ks49_manageTask($connect,$uname){
    echo '<div role="tabpanel" class="tab-pane fade" id="mgtask">
      <table class="table table-borderless table-hover hover" style="text-align:center;background:none!important;"><thead><tr>
        <th>Project</th>
        <th>Task Detail</th>
        <th>Employee Involved</th>
        <th>Assigned Date</th>
        <th>Completion Date</th>
        <th>Time Elapsed</th>
        <th>Status</th>
        <th>Completion</th>
        </tr></thead><tbody>';  
    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_employee");  
    while($datarow = mysqli_fetch_array($execute)){
      $data = explode(',', $datarow['employee']);
        foreach ($data as $d) {
            $employee = $d;
      }
      $id = $datarow["id"];
      $givenby = $datarow["givenby"]; 
      if($givenby == $uname){
        $taskdate = $datarow["taskdate"];
        $task = $datarow["task"];
        $employee = $datarow["employee"];
        $compdate = $datarow["compdate"];
        $project = $datarow["project"];
        $taskstatus = $datarow["taskstatus"];
        $date = date("Y/m/d");
        $date = strtotime($date);
        $cd = strtotime($compdate);
        $td = strtotime($taskdate);
        if($compdate != "0000-00-00"){
          $et = $cd-$td;
          $et = $this -> ks49_secondsToTime($et);
        }else{
          $compdate = "-";
          $et = $date - $td;
          $et = $this -> ks49_secondsToTime($et);
        }
        echo"<tr><td>".$project."</td>
              <td>".$task."</td>
              <td>".$employee."</td>
              <td>".$taskdate."</td>
              <td>".$compdate."</td>
              <td>".$et." Days</td>";
        if($taskstatus == 0){
          $taskstatus = "Running";
          echo "<td>".$taskstatus."</td>
            <td><a><button type=\"button\" name='taskcomp' class=\"btn btn-default upbtn\">Wait for Submission</button></a></td></tr>"; 
        }elseif($taskstatus == 2){
          $taskstatus = "Completed";
          echo "<td>".$taskstatus."</td>
            <td><a><button type=\"button\" name='taskcomp' value='taskcomp,".$id."' class=\"btn btn-default upbtn\">Congrats</button></a></td></tr>"; 
        }
        elseif($taskstatus == 1){
          $taskstatus = "Submitted";
          echo "<td>".$taskstatus."</td>
            <td><button type=\"button\" name='taskcomp' onclick='ks49_taskDone(\"".$id."\")' class=\"btn btn-default upbtn\">Done</button>
            <button type=\"button\" name='taskin' onclick='ks49_taskIncomplete(\"".$id."\")' class=\"btn btn-default upbtn\">Incomplete</button></td></tr>"; 
        }
      }
    }
    echo '</tbody></table></div></div></div>';
  }

  //Converting Seconds to days.

  private function ks49_secondsToTime($inputSeconds) {

    $secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;

    // extract days
    $days = floor($inputSeconds / $secondsInADay);

    // extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // return the final array
    $obj = array(
        'd' => (int) $days,
        'h' => (int) $hours,
        'm' => (int) $minutes,
        's' => (int) $seconds,
    );
    return $days;
  }

  
}


  
	