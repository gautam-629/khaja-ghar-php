// Ajax Call for admin Login Verification
function checkAdminLogin() {
  var adminLogEmail = $("#adminLogEmail").val();
  var adminLogPass = $("#adminLogPass").val();
  $.ajax({
    url: "../php/admin/admin.php",
    type: "post",
    data: {
      checkLogemail: "checklogmail",
      adminLogEmail: adminLogEmail,
      adminLogPass: adminLogPass
    },
    success: function(data) {
      console.log(data);
      if (data == 0) {
        $("#statusAdminLogMsg").html(
          '<small style="color:red"> Invalid Email ID or Password ! </small>'
        );
      } else if (data == 1) {
        $("#statusAdminLogMsg").html(
          '<small style="color:blue; font-size: 20px;"> Success! Loading..... </small>'
        );
        // Empty Login Fields
        clearAdminLoginField();
        setTimeout(() => {
          // window.location.href = "index.php";
          window.location.href = "../admin_Dash/dashboard.php";
        }, 1000);
      }
    }
  });
}

// Empty Login Fields
function clearAdminLoginField() {
  $("#adminLoginForm").trigger("reset");
}

// Empty Login Fields and Status Msg
function clearAdminLoginWithStatus() {
  $("#statusAdminLogMsg").html(" ");
  clearAdminLoginField();
}
