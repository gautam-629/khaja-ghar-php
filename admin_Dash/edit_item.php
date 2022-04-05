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
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['item_name'] == "") || ($_REQUEST['item_duration'] == "") || ($_REQUEST['item_price'] == "")){
   // msg displayed if required field missing
   $msg = '<div style="color:red"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $item_id = $_REQUEST['item_id'];
   $item_name = $_REQUEST['item_name'];
   $item_duration = $_REQUEST['item_duration'];
   $item_price = $_REQUEST['item_price'];
   $item_img = '../image/item_img/'. $_FILES['item_img']['name'];
   
   $sql = "UPDATE item SET item_id = '$item_id', item_name = '$item_name', item_duration = '$item_duration', item_price='$item_price',item_img='$item_img' WHERE item_id = '$item_id'";

    
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div style="color:green"> Updated Successfully </div>';
    } else {
     // below msg display on form submit failed
     $msg = '<divstyle="color:red"> Unable Update </div>';
    }
  }
  }
 ?>
<section style="position:absolute; left:150px; top: 90px;">
    <div style="margin-left: 200px;">

    <?php
 if(isset($_REQUEST['view'])){
    include('../php/partials/dbconnect.php');
  $sql = "SELECT * FROM item WHERE item_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
        <h1 style="color: blue; font-size: 2rem; font-weight: bold;">Update Item</h1>
        <hr>
        <form action="" method="post" class="myform" enctype="multipart/form-data">
        <?php if(isset($msg)) {echo $msg; } ?>
        <div style="margin: 5px;">
                <label for="pnumber">Item ID</label> <br>
                <input class="form-input" type="text" name="item_id"  id="item_id" placeholder="item name" value="<?php if(isset($row['item_id'])) {echo $row['item_id']; }?>" readonly required>
            </div>
            <div style="margin: 5px;">
                <label for="pnumber">Item Name</label> <br>
                <input class="form-input" type="text" name="item_name"  id="item_name" placeholder="item name" value="<?php if(isset($row['item_name'])) {echo $row['item_name']; }?>" required>
            </div>
            <div style="margin: 5px;">
                <label for="name">Item price</label><br>
                <input class="form-input" type="number"  name="item_price"  id="item_price" placeholder="item price" value="<?php if(isset($row['item_price'])) {echo $row['item_price']; }?>"  required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Duration</label><br>
                <input class="form-input" type="text" name="item_duration" id="item_duration" placeholder="duration" value="<?php if(isset($row['item_duration'])) {echo $row['item_duration']; }?>"  required> <br>
            </div>
            <div style="margin: 5px;">
                <label for="name">Item image</label><br>
                <img style="display: inline; width: 80px;" src="<?php if(isset($row['item_img'])) {echo $row['item_img']; }?>" alt="item image">  
                <input class="form-input" type="file" name="item_img"  id="item_img" placeholder="image"  required>
            </div>
            <div style="display: flex; align-items: center; ">
                <button class="btn" name="requpdate" type="submit">Update now</button> <br>
                <button type="button" style=" margin-left: 25px; font-size: .9rem;" class="btn"><a style="text-decoration: none; color:white;" href="menus.php">Close</a></button>
            </div>
        </form>
    </div>
<?php  include("footer.php")?>