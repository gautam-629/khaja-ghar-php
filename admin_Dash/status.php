<?php
if(isset($_REQUEST['status'])){
    include('../php/partials/dbconnect.php');
    $status= $_REQUEST['status'];
     $id=  $_REQUEST['id'];
    $status=$_REQUEST['status'];
   $sql = "UPDATE order_manager SET order_status='$status' WHERE order_id = $id";
   if($conn->query($sql) === TRUE){
     // below code will refresh the page after deleting the record
      header("location:dashboard.php");
     } else {  
       echo "Unable to Update status";
     }
  }
?>