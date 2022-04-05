<?php include 'header.php' ?>
<section>
<div class="formsRl">
    <form  action="" method="post" class="myform" id="stuLoginForm">
        <small id="statusLogMsg"></small>
     <div>
        <label for="name">email</label><br>
        <input class="form-input" id="stuLogEmail" type="email" name="email" placeholder="Enter your email"  required>
    </div>
    <div>
        <label for="name">password</label><br>
        <input  class="form-input" type="password" name="password" placeholder="Enter password" id="stuLogPass" required> <br>
    </div>
    <div style="display: flex; align-items: center; "> 
        <button onclick="checkStuLogin();" class="btn" type="button">Login</button> <br>
        <span><a style="margin-left: 5px; color: blue;" href="Studentregister.php">don't have account</a></span>
    </div>
    </form>
</div>
</section>
<script src="../js/jquery.js"></script>
<?php include 'footer.php' ?>