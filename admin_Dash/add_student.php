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
        <form action="" method="post" class="myform" onsubmit="return validation();">
        <?php if(isset($msg)) {echo $msg; } ?>
            <div style="margin: 5px;">
                <label for="pnumber">Student Name</label> <span style="margin-left: 4px;color: red;" id="statusMsg1"></span><br>
                <input class="form-input" type="text" name="stu_name"  id="stu_name" placeholder="Student name"  required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Student Email</label><span style="margin-left: 4px;color: red;" id="statusMsg2"></span><br>
                <input class="form-input" type="Email"  name="stu_email"  id="stu_email" placeholder="Student Email" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Password</label><span style="margin-left: 4px;color: red;" id="statusMsg3"></span><br>
                <input class="form-input" type="password" name="stu_pass" id="stu_pass" placeholder="Password" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Occupation</label><span style="margin-left: 4px;color: red;" id="statusMsg4"></span><br>
                <input class="form-input" type="text" name="stu_occ"  id="stu_occ" placeholder="Occuption"  required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="studentSubmitBtn" type="submit">Add now</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="students.php">Close</a></button>
            </div>
        </form>
    </div>
</section>
<script>
function validation(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var namereg=/^[A-Za-z. ]{3,20}$/;
    var nameocc=/^[A-Za-z. ]{3,20}$/;
   let stu_name=document.getElementById("stu_name").value;
   let stu_email=document.getElementById("stu_email").value;
   let stu_pass=document.getElementById("stu_pass").value;
   let stu_occ=document.getElementById("stu_occ").value;
    
   if(!namereg.test(stu_name)){
       document.getElementById("statusMsg1").innerHTML='Invalid Name';
       return false;
   }

   else if(stu_email.trim() != "" && !reg.test(stu_email)){
    document.getElementById("statusMsg2").innerHTML='Please Enter Valid Email e.g. example@mail.com';
       return false;
   }

   else if(stu_pass.length<4){
    document.getElementById("statusMsg3").innerHTML=' Password must be atleast 4 character ! ';
       return false;
   }
   else if(!nameocc.test(stu_occ)){
       document.getElementById("statusMsg4").innerHTML='Invalid Occuption Name';
       return false;
   }
   else{
       return true;
   }

}
</script>
<?php  include("footer.php")?>