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
        $total=0;
        if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
            $total=$total+$value['item_price'];
             echo " <tr>
                     <td>$value[item_id]</td>
                     <td>$value[item_name]</td>
                     <td>$value[item_price]</td>
                     <td>
                       <input type='number' value='$value[Quantity]' min='1' max='10'>
                     </td>    
                     <td>0</td>  
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
        <h1>Grand Total : <?php echo $total ?></h1>
        <form action="">
            <input type="radio" name="" id="">
            <label for="radio"> Cash on Delivery</label>
            <button class="btn">Make Purchase</button>
        </form>
    </div>
</section>

<?php include("footer.php") ?>