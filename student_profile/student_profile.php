<?php include ("nav_bar.php") ?>

<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
// define('TITLE', 'Student Profile');
// define('PAGE', 'profile');

include('../php/partials/dbconnect.php');
 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../view/index.php'; </script>";
 }

 $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $stuId = $row["stu_id"];
 $stu_name = $row["stu_name"]; 
 $stu_occ = $row["stu_occ"];
 $stu_img = $row["stu_img"];

}

 if(isset($_REQUEST['updateStuNameBtn'])){
  if(($_REQUEST['stu_name'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $stu_name = $_REQUEST["stu_name"];
   $stu_occ = $_REQUEST["stu_occ"];
   $stu_image = $_FILES['stu_img']['name']; 
   $stu_image_temp = $_FILES['stu_img']['tmp_name'];
   $img_folder = '../image/stu_img/'. $stu_image; 
   move_uploaded_file($stu_image_temp, $img_folder);
   $sql = "UPDATE student SET stu_name = '$stu_name', stu_occ = '$stu_occ', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $msg = '<div style="color:green"> Updated Successfully </div>';
   echo "<script> location.href='student_profile.php'; </script>";
   } else {
   // below msg display on form submit failed
   $msg = '<divstyle="color:red"> Unable to Update </div>';
      }
    }
 }

?>

<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">
        <form action="" method="post" class="myform" enctype="multipart/form-data">
        <?php if(isset($msg)) {echo $msg; } ?>
            <div style="margin: 5px;">
                <label for="pnumber">Student ID</label> <br>
                <input class="form-input" type="text" name="stu_id"  id="stu_id" placeholder="Student id" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Student Name</label><br>
                <input class="form-input" type="text"  name="stu_name"  id="stu_name" placeholder="Student name" value="<?php if(isset($stu_name)) {echo $stu_name;} ?>" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Student Email</label><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" value=" <?php if(isset($stuEmail)) {echo $stuEmail;} ?>" readonly required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Occupation</label><br>
                <input class="form-input" type="text" name="stu_occ" id="stu_occ" placeholder="duration" value=" <?php if(isset($stu_occ)) {echo $stu_occ;} ?>" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Upload image</label><br>
                <input class="form-input" type="file" name="stu_img"  id="stu_img" placeholder="image"  required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="updateStuNameBtn" type="submit">Update</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="../view/index.php">Back to Home</a></button>
            </div>
        </form>
    </div>
</section>
<?php include ("footer.php") ?>
