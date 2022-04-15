<?php 
include('../php/partials/dbconnect.php');
 if(!isset($_SESSION)){ 
   session_start(); 
 } 
 if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
 } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }
 if(isset($stuLogEmail)){
  $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stu_img = $row['stu_img'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" href="../css/student_profile.css">
</head>
<body>
    <nav>
        <div class="header ">
            <h1 style="margin-left: 30px; padding-top: 14px;">Khaja Ghar</h1>
        </div>
        <div>
            <ul class="nav_list">
                <img src="<?php echo $stu_img ?>" alt="image" width="200px"> 
                <li class="active"><a href="student_profile.php">Pofile</a></li>
                <li><a href="myorder.php">My order</a></li>
                <li><a href="student_feedback.php">Feedback</a></li>
                <li><a href="changePassword.php">Change Password</a></li>
                <li><a href="../view/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

</body>
</html>