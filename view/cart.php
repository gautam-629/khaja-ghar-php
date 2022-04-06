<?php include("header.php") ?>
<style>
    .cart_form{
        text-align: center;
        width: 250px;
        height: 300px;
        margin-right: 20px;
        background-color: aquamarine;
        border-radius: 10px;
    }
</style>

<div class="container" style="background-color: beige; height: 70px;">
    <h1 style="text-align: center; padding-top: 10px;">My Cart Page</h1>
</div>
<section class="container" style="display: flex; justify-content: space-between; margin-top: 50px;">
    <div>
        <table class="mytable" border="1" cellspacing="0" width="900px">
             <thead>
                 <th>Item ID</th>
                 <th>Item Name</th>
                 <th>Item price</th>
                 <th>Quantity</th>
                 <th>Total</th>
                 <th>operation</th>
             </thead>
             <tbody style="text-align: center;">
        <?php 
      
        if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
           
             echo " <tr>
                     <td>$value[item_id]</td>
                     <td>$value[item_name]</td>
                     <td>$value[item_price]<input type='hidden' class='iprice' value='$value[item_price]'> </td>
                     <td>
                       <input class='iquantity' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='10'>
                     </td>    
                     <td class='itotal'></td>  
                     <td>
                        <form action='manage_cart.php' method='post'>
                         <button class='btn' name='Remove_item'>Remove</button>
                         <input type='hidden' name='item_id' value='$value[item_id]'>
                         </form>
                     </td>
                 </tr>";
        }
    }
                 ?>
             </tbody> 
        </table>
    </div>
    <div class="cart_form">
    <h1 style="display: inline;">Grand Total:</h1 style="display: inline;">
        <h1 style="display: inline;" id="gtotal"> </h1>
        <form action="">
            <input type="radio" name="" id="">
            <label for="radio"> Cash on Delivery</label>
            <button class="btn">Make Purchase</button>
        </form>
    </div>
</section>
<script>
 var iprice=document.getElementsByClassName('iprice');
 var iquantity=document.getElementsByClassName('iquantity');
 var itotal=document.getElementsByClassName('itotal');
let gtotal=document.getElementById("gtotal")
 function subTotal(){
     gt=0;
     for(i=0;i<iprice.length;i++){
         itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

         gt=gt+(iprice[i].value)*(iquantity[i].value);
     }
     gtotal.innerText=gt;
 }
 subTotal();
</script>

<?php include("footer.php") ?>