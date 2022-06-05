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
 if(isset($_REQUEST['courseSubmitBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['item_name'] == "") || ($_REQUEST['item_duration'] == "") || ($_REQUEST['item_price'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $item_name = $_REQUEST['item_name'];
   $item_duration = $_REQUEST['item_duration'];
   $item_price = $_REQUEST['item_price'];
   
   $item_img = $_FILES['item_img']['name']; 
   $item_img_temp = $_FILES['item_img']['tmp_name'];
   $img_folder = '../image/item_img/'. $item_img; 
   move_uploaded_file($item_img_temp, $img_folder);
    $sql = "INSERT INTO item (item_name, item_duration, item_price, item_img) VALUES ('$item_name', '$item_duration','$item_price', '$img_folder')";
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
        <h1 style="color: blue; font-size: 2rem; font-weight: bold;">Add New Item</h1>
        <hr>
        <form action="" method="post" class="myform" enctype="multipart/form-data" onsubmit="return validation();">
        <?php if(isset($msg)) {echo $msg; } ?>
            <div style="margin: 5px;">
                <label for="pnumber">Item Name</label><span style="margin-left: 4px;color: red;" id="statusMsg1"></span> <br>
                <input class="form-input" type="text" name="item_name"  id="item_name" placeholder="item name" required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Item price</label><br>
                <input class="form-input" type="number"  name="item_price"  id="item_price" placeholder="item price" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Duration</label><span style="margin-left: 4px;color: red;" id="statusMsg2"></span><br>
                <input class="form-input" type="text" name="item_duration" id="item_duration" placeholder="duration" required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Item image</label><br>
                <input class="form-input" type="file" name="item_img"  id="item_img" placeholder="image"  required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="courseSubmitBtn" type="submit">Add now</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="menus.php">Close</a></button>
            </div>
        </form>
    </div>
</section>
<script>
    function validation(){
    var itemName_reg=/^[A-Za-z. ]{3,20}$/;
    var nameocc=/^[A-Za-z. ]{3,20}$/;
   let item_name=document.getElementById("item_name").value;
   let item_duration=document.getElementById("item_duration").value;
    
   if(!itemName_reg.test(item_name)){
       document.getElementById("statusMsg1").innerHTML='Invalid item Name';
       return false;
   }
  else if(item_duration.length>15 || item_duration.length<2){
    document.getElementById("statusMsg2").innerHTML='Invalid duration';
       return false;
  }
   else{
       return true;
   }

}
</script>
<?php  include("footer.php")?>