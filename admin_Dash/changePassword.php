<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
// define('TITLE', 'Change Password');
// define('PAGE', 'changepass');
include('nav_bar.php'); 
include('../php/partials/dbconnect.php');
 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../view/index.php'; </script>";
 }
 $adminEmail = $_SESSION['adminLogEmail'];
 if(isset($_REQUEST['adminPassUpdatebtn'])){
  if(($_REQUEST['admin_pass'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $admin_pass = $_REQUEST['admin_pass'];
     $sql = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email = '$adminEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div style="color:green;"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<divstyle="color:red;"> Unable to Update </div>';
      }
    }
   }
}
 ?>

<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">
        <form action="" method="post" class="myform">
        <?php if(isset($msg)) {echo $msg; } ?>
          
            <div style="margin: 5px;">
                <label for="name">Email</label><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" value=" <?php if(isset( $adminEmail)) {echo  $adminEmail;} ?>" readonly required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">New Password</label><br>
                <input class="form-input" type="password" name="admin_pass" id="stu_pass" placeholder="New password"  required> <br>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="adminPassUpdatebtn" type="submit">Update</button> <br>
                <button type="reset" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;"></a>Reset</button>
            </div>
        </form>
    </div>
</section>
<?php include ("footer.php") ?>
