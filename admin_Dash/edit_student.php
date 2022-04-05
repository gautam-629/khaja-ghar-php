<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../view/index.php'; </script>";
 }
?>
<?php  include("nav_bar.php")?>
<?php
include('../php/partials/dbconnect.php');
 if(isset($_REQUEST['studentUpdateBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_occ'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $stu_id = $_REQUEST['stu_id'];
   $stu_name = $_REQUEST['stu_name'];
   $stu_pass = $_REQUEST['stu_pass'];
   $stu_email = $_REQUEST['stu_email'];
   $stu_occ = $_REQUEST['stu_occ'];

   $sql = "UPDATE student SET stu_id = '$stu_id', stu_name = '$stu_name', stu_email = '$stu_email', stu_pass='$stu_pass',stu_occ='$stu_occ' WHERE stu_id = '$stu_id'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div style="color:green"> Update Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<divstyle="color:red"> Unable to Update </div>';
    }
  }
  }
 ?>
<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">

    <?php
 if(isset($_REQUEST['view'])){
    include('../php/partials/dbconnect.php');
  $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
        <h1 style="color: blue; font-size: 2rem; font-weight: bold;">Add New Student</h1>
        <hr>
        <form action="" method="post" class="myform">
        <?php if(isset($msg)) {echo $msg; } ?>
        <div style="margin: 5px;">
                <label for="pnumber">Student ID</label> <br>
                <input class="form-input" type="text" name="stu_id"  id="stu_id" placeholder="Student name" value="<?php if(isset($row['stu_id'])) {echo $row['stu_id']; }?>" readonly required>
            </div>
            <div style="margin: 5px;">
                <label for="pnumber">Student Name</label> <br>
                <input class="form-input" type="text" name="stu_name"  id="stu_name" placeholder="Student name" value="<?php if(isset($row['stu_name'])) {echo $row['stu_name']; }?>" required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Student Email</label><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" value="<?php if(isset($row['stu_email'])) {echo $row['stu_email']; }?>" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">PassWord</label><br>
                <input class="form-input" type="password" name="stu_pass" id="stu_pass" placeholder="Password" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Occupation</label><br>
                <input class="form-input" type="text" name="stu_occ"  id="stu_occ" placeholder="Occuption" value="<?php if(isset($row['stu_occ'])) {echo $row['stu_occ']; }?>" required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="studentUpdateBtn" type="submit">Update now</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="students.php">Close</a></button>
            </div>
        </form>
    </div>
</section>
<?php  include("footer.php")?>