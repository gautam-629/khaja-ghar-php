<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
// define('TITLE', 'Feedback');
// define('PAGE', 'feedback');

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
 $stu_id = $row["stu_id"];
}

 if(isset($_REQUEST['submitFeedbackBtn'])){
  if(($_REQUEST['f_content'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red"> Fill All Fileds </div>';
  } else {
   $fcontent = $_REQUEST["f_content"];
   $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stu_id')";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $msg = '<div style="color:green"> Submitted Successfully </div>';
   } else {
   // below msg display on form submit failed
   $msg = '<div style="color:red"> Unable to Submit </div>';
      }
    }
 }

?>

<?php include ("nav_bar.php") ?>
<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">
        <form action="" method="post" class="myform" enctype="multipart/form-data">
        <?php if(isset($msg)) {echo $msg; } ?>
            <div style="margin: 5px;">
                <label for="pnumber">Student ID</label> <br>
                <input class="form-input" type="text" name="stu_id"  id="stu_id" placeholder="Student id" value=" <?php if(isset($stu_id)) {echo $stu_id;} ?>" readonly required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Write Feedback:</label><br>
                <textarea name="f_content" id=""  rows="2"></textarea>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="submitFeedbackBtn" type="submit">Submit</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="../view/index.php">Back to Home</a></button>
            </div>
        </form>
    </div>
</section>
<?php include ("footer.php") ?>
