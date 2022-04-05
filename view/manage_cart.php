<?php
session_start();
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='Studentlogin.php'; </script>";
 } else {
  $stuEmail = $_SESSION['stuLogEmail'];
 } 
  ?>
  <?php
     if(isset($_REQUEST['add-to-cart'])){
      $item_name = $_REQUEST['item_name'];
      $item_price = $_REQUEST['item_price'];
      $item_id = $_REQUEST['item_id'];
      
      if(isset($_SESSION['cart']))
      { 
            $myitems=array_column($_SESSION['cart'],'item_id');
            if(in_array($item_id,$myitems))
            {
              echo "
              <script>
               alert('Item Already Added');
               location.href='index.php';
               </script>
              ";
            }
            else{
              $count=count($_SESSION['cart']);
              $_SESSION['cart'][$count]=array('item_id'=>$item_id,'item_name'=>$item_name,'item_price'=>$item_price,'Quantity'=>1);
              echo "
              <script>
               alert('Item Added');
               location.href='index.php';
               </script>
              ";
            } 
      }
      else{
        $_SESSION['cart'][0]=array('item_id'=>$item_id,'item_name'=>$item_name,'item_price'=>$item_price,'Quantity'=>1);
        echo "
              <script>
               alert('Item Added');
               location.href='index.php';
               </script>
              ";
      }
     }
     if(isset($_POST['Remove_item'])){
      foreach($_SESSION['cart'] as $key => $value){
        if($value['item_id']==$_POST['item_id']){
          unset($_SESSION['cart'][$key]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
          echo "
              <script>
               alert('Item Removed');
               location.href='cart.php';
               </script>
              ";
        }
      }
    }
?>