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
 if(isset($_REQUEST['studentSubmitBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_occ'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $stu_name = $_REQUEST['stu_name'];
   $stu_pass = $_REQUEST['stu_pass'];
   $stu_email = $_REQUEST['stu_email'];
   $stu_occ = $_REQUEST['stu_occ'];
    $sql = "INSERT INTO student (stu_name, stu_pass, stu_email, stu_occ) VALUES ('$stu_name', '$stu_pass','$stu_email', '$stu_occ')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div style="color:green"> Item Added Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<divstyle="color:red"> Unable to Add Item </div>';
    }
  }
  }
 ?>
<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">
        <h1 style="color: blue; font-size: 2rem; font-weight: bold;">Add New Student</h1>
        <hr>
        <form action="" method="post" class="myform">
        <?php if(isset($msg)) {echo $msg; } ?>
            <div style="margin: 5px;">
                <label for="pnumber">Student Name</label> <br>
                <input class="form-input" type="text" name="stu_name"  id="stu_name" placeholder="Student name"  required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Student Email</label><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">PassWord</label><br>
                <input class="form-input" type="password" name="stu_pass" id="stu_pass" placeholder="Password" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Occupation</label><br>
                <input class="form-input" type="text" name="stu_occ"  id="stu_occ" placeholder="Occuption"  required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="studentSubmitBtn" type="submit">Add now</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="students.php">Close</a></button>
            </div>
        </form>
    </div>
</section>
<?php  include("footer.php")?>