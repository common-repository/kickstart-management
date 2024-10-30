<?php
// don't call the file directly

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ks49_dashboard
{
  public function ks49_dashboardopt($path,$role,$uname,$connect){ 

    $this -> ks49_includes();
    //Checking Employee's task Updates

    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_employee where employee='$uname'");
    

    //If Task is available then,calling task functionalities. 

    if(mysqli_num_rows($execute) > 0){
      $this -> ks49_headers(); 
      $this -> ks49_taskStatus($path,$connect,$uname);
    }

    //If No Task is given then,checking project details.

    else{
      $check = 1;
      $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
      while($datarow = mysqli_fetch_array($execute)){
        $data = explode(',', $datarow['employee']);
        foreach ($data as $d) {
          $employee = $d;
          if($employee == $uname){
            $check = 2;
            break;
          }     
        }
      }
      if($check == 1){
        $this -> ks49_welcomePanel();
      }elseif($check == 2){
        $this -> ks49_projectStatus($connect);  
      }
    } 
  }

  /**
  * Displaying Alerts as a result of Submit Task occurs
  *
  * @since 1.0 Get Methods were used
  *
  * @since 1.0.1 Cookies used for fast execution.
  * 
  * @return void
  *
  */

  private function ks49_includes(){
    define( 'kick_path', plugins_url( '../../assets', __FILE__ ) );
    wp_enqueue_style( 'ks49_bootstrapcss');
    wp_enqueue_style( 'ks49_datatablecss');
    wp_enqueue_style( 'ks49_projectcss'); 
    wp_enqueue_script( 'ks49_datatablejs');
    wp_enqueue_script( 'ks49_popperjs');
    wp_enqueue_script( 'ks49_bootstrapjs');
    wp_enqueue_script( 'ks49_customjs');
    wp_add_inline_script( 'ks49_datatablejs', 'jQuery(document).ready(function() {jQuery("table.hover").DataTable();} );' );
    wp_add_inline_script( 'ks49_customjs', "function ks49_tasksubmit(id) {
            var data = {
              'action':'my_action',
              'call' : 'task_submit',
              'id': id,
          };   
          jQuery('#ks49modal_submittask').modal('show');
          jQuery.post(ajaxurl, data, function(response) {
           location.reload(true);
          });
              
        }" );
    require_once("modules/dashboard_design.php");
  }
  
  // Adding header Part for Alerts.

  private function ks49_headers(){
      ks49_dashboard_design::ks49_dashboard_header_html();
  }
  
  // Adding Task Status Information.

  private function ks49_taskStatus($path,$connect,$uname){
    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_employee");
    ks49_dashboard_design::ks49_dashboard_taskStatus1();
          while($datarow = mysqli_fetch_array($execute)){
            $data = explode(',', $datarow['employee']);
              foreach ($data as $d) {
                $employee = $d;
                  if($employee == $uname){
                    $id = $datarow["id"];
                    $givenby = $datarow["givenby"]; 
                    $taskdate = $datarow["taskdate"];
                    $task = $datarow["task"];
                    $project = $datarow["project"];
                    $taskstatus = $datarow["taskstatus"];
                    $compdate = $datarow["compdate"];
                    if($compdate=="0000-00-00"){
                      $compdate = "-";
                    }
                    ks49_dashboard_design::ks49_dashboard_taskStatus2($project,$task,$givenby,$taskdate,$compdate,$taskstatus,$id);
                  }
              }
        }
        ks49_dashboard_design::ks49_dashboard_taskStatus3();
  }

  // Adding Task Status Information.

  private function ks49_projectStatus($connect){
    $execute=mysqli_query($connect,"SELECT * FROM wp_kS49_customer");
      while($datarow = mysqli_fetch_array($execute)){
        $givenby = $datarow["givenby"];
        $project = $datarow["project"];
      }
    ks49_dashboard_design::ks49_dashboard_projectStatus($project,$givenby);
  }

  // Adding Welcome Panel.

  private function ks49_welcomePanel(){
    ks49_dashboard_design::ks49_dashboard_welcome_panel();
  }
}



  