<head>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/util.css">
</head>
 <style>
    .header{
        height: 45px;
        background-color: rgb(33, 31, 31);
    }
 </style>
<section>
  <div class="header">
      <h1 style="color: white; text-align: center;" > Khaja Ghar </h1>
  </div>
<div class="formsRl">
    <form action="../php/users/form_login.php" method="post" class="myform" id="adminLoginForm">
    <small id="statusAdminLogMsg"></small>
     <div>
        <label for="name">email</label><br>
        <input class="form-input" type="email" name="email" placeholder="Enter your email" id="adminLogEmail" required>
    </div>
    <div>
        <label for="name">password</label><br>
        <input  class="form-input" type="password" name="password" placeholder="Enter password" id="adminLogPass" required> <br>
    </div>
    <div style="display: flex; align-items: center; "> 
        <button class="btn" type="button" onclick="checkAdminLogin()">Login</button> <br>
        
    </div>
    </form>
</div>
</section>
<?php include 'footer.php' ?>