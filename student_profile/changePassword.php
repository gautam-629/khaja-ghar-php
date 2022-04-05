<?php include ("nav_bar.php") ?>
<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
// define('TITLE', 'Change Password');
// define('PAGE', 'studentChangePass');

include('../php/partials/dbconnect.php');
 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../view/index.php'; </script>";
 }

 if(isset($_REQUEST['stuPassUpdateBtn'])){
  if(($_REQUEST['stu_pass'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red;"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $stu_pass = $_REQUEST['stu_pass'];
     $sql = "UPDATE student SET stu_pass = '$stu_pass' WHERE stu_email = '$stuEmail'";
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
        <form action="" method="post" class="myform" enctype="multipart/form-data">
        <?php if(isset($msg)) {echo $msg; } ?>
          
            <div style="margin: 5px;">
                <label for="name">Email</label><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" value=" <?php if(isset($stuEmail)) {echo $stuEmail;} ?>" readonly required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">New Password</label><br>
                <input class="form-input" type="password" name="stu_pass" id="stu_pass" placeholder="New password"  required> <br>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="stuPassUpdateBtn" type="submit">Update</button> <br>
                <button type="reset" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;"></a>Reset</button>
            </div>
        </form>
    </div>
</section>
<?php include ("footer.php") ?>
