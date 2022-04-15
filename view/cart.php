<?php include("header.php") ?>
<?php
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='Studentlogin.php'; </script>";
 } else {
  $stuEmail = $_SESSION['stuLogEmail'];
 } 
  ?>

<style>
    .cart_form {
        text-align: center;
        width: 250px;
        height: 300px;
        margin-right: 20px;
        background-color: aquamarine;
        border-radius: 10px;
    }
    .cart_form form input{
        font-size: 1rem;
        padding: 3px;
        border-radius: 6px;
    }
</style>

<div class="container" style="background-color: beige; height: 70px;">
    <h1 style="text-align: center; padding-top: 10px;">My Cart Page</h1>
</div>
<section class="container" style="display: flex; justify-content: space-between; margin-top: 50px;">
    <div>
        <table class="mytable" border="1" cellspacing="0" width="900px">
            <thead>
                <th>Serial No.</th>
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
            $sr=$key+1;
             echo " <tr>
                     <td>$sr</td>
                     <td>$value[item_name]</td>
                     <td>$value[item_price]<input type='hidden' class='iprice' value='$value[item_price]'> </td>
                     <form action='manage_cart.php' method='post'>
                     <td>
                       <input class='iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                       <input type='hidden' name='item_id' value='$value[item_id]'>
                     </td>    
                     </form>
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
    <?php
        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
        {
        ?>
    <div class="cart_form">
        <h1 style="display: inline;">Grand Total:</h1 style="display: inline;">
        <h1 style="display: inline;" id="gtotal"> </h1>

        <form style="margin-top: 20px;" action="purchase.php" method="post">
            <!-- Order ID:  <input type="number" name="" id="">   -->
            <div>
                <label for="email">Email</label> <br>
                <input type="Email" name="stu_email" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" id=""
                    readonly>
            </div>
            <div>
                <label for="number">Total Amount</label>
                <input type="number" value="" name="amount" id="amount" readonly>
            </div>
            <div>
                <label for="number">Phone Number</label>
                <input type="number"  name="pnumber" id="" placeholder="Enter phone number">
            </div>
            <div>
                <input type="radio" name="pay_mode" value="COD" id="">
                <label for="radio"> Cash on Delivery</label>
            </div>


            <button type="submit" name="purchase" class="btn">Make Purchase</button>
        </form>
    </div>
    <?php
        }
        ?>
</section>
<script>
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    let gtotal = document.getElementById("gtotal")

    function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

            gt = gt + (iprice[i].value) * (iquantity[i].value);
        }
        gtotal.innerText = gt;
        document.getElementById("amount").value = gt;
    }
    subTotal();
</script>

<?php include("footer.php") ?>