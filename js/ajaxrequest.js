$(document).ready(function() {
    // Ajax Call for Already Exists Email Verification
    $("#stuemail").on("keypress blur", function() {
      var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var stuemail = $("#stuemail").val();
      $.ajax({
        url: "../php/students/add_student.php",
        type: "post",
        data: {
          checkemail: "checkmail",
          stuemail: stuemail
        },
        success: function(data) {
          // console.log(data);
          if (data != 0) {
            $("#statusMsg2").html(
              '<small style="color:red;"> Email ID Already Registered ! </small>'
            );
            $("#signup").attr("disabled", true);
          } else if (data == 0 && reg.test(stuemail)) {
            $("#statusMsg2").html(
              '<small style="color:green;"> There you go ! </small>'
            );
            $("#signup").attr("disabled", false);
          } else if (!reg.test(stuemail)) {
            $("#statusMsg2").html(
              '<small style="color:red;"> Please Enter Valid Email e.g. example@mail.com </small>'
            );
            $("#signup").attr("disabled", false);
          }
          if (stuemail == "") {
            $("#statusMsg2").html(
              '<small style="color:red;"> Please Enter Email ! </small>'
            );
          }
        }
      });
    });
  
    // Checking name on keypress
    $("#stuname").keypress(function() {
      var stuname = $("#stuname").val();
      if (stuname !== "") {
        $("#statusMsg1").html(" ");
      }
    });
    // Checking Password on keypress
    $("#stupass").keypress(function() {
      var stupass = $("#stupass").val();
      if (stupass !== "") {
        $("#statusMsg3").html(" ");
      }
    });
  });
  


// ajax call for add new student
function addStu(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var namereg=/^[A-Za-z. ]{3,20}$/;
    stuname=$("#stuname").val();
    stuemail=$("#stuemail").val();
    stupass=$("#stupass").val();
    
    if (stuname.trim() == "") {
        $("#statusMsg1").html(
          '<small style="color:red;"> Please Enter Name ! </small>'
        );
        $("#stuname").focus();
        return false;
      }

      else if (!namereg.test(stuname)) {
        $("#statusMsg1").html(
          '<small style="color:red;"> Invalid Name </small>'
        );
        $("#stuname").focus();
        return false;
      }


       else if (stuemail.trim() == "") {
        $("#statusMsg2").html(
          '<small style="color:red;"> Please Enter Email ! </small>'
        );
        $("#stuemail").focus();
        return false;
      }
       else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html(
          '<small style="color:red;"> Please Enter Valid Email e.g. example@mail.com </small>'
        );
        $("#stuemail").focus();
        return false;
      }
       else if (stupass.trim() == "") {
        $("#statusMsg3").html(
          '<small style="color:red;"> Please Enter Password ! </small>'
        );
        $("#stupass").focus();
        return false;
      }

      else if (stupass.length<4) {
        $("#statusMsg3").html(
          '<small style="color:red;"> Password must be atleast 4 character ! </small>'
        );
        $("#stupass").focus();
        return false;
      }

  else{  
    $.ajax({
        url: "../php/students/add_student.php",
        type:"POST",
        data: {
            stusignup: "stusignup",
            stuname: stuname,
            stuemail: stuemail,
            stupass: stupass
        },
        success: function (data) {
            // console.log(data);
            if (data == "OK") {
              $("#successMsg").html(
                '<span style="color:green"> Registration Successful ! </span>'
              );
              // making field empty after signup
              clearStuRegField();
            } else if (data == "Failed") {
              $("#successMsg").html(
                '<span style=color"red"> Unable to Register ! </span>'
              );
            }
        }
    });
}
}
// Empty All Fields and Status Msg
function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
  }

// Ajax Call for Student Login Verification
function checkStuLogin() {
    var stuLogEmail = $("#stuLogEmail").val();
    var stuLogPass = $("#stuLogPass").val();
    // console.log(stuLogPass,stuLogEmail
    $.ajax({
      url: "../php/students/add_student.php",
      type: "post",
      data: {
        checkLogemail: "checklogmail",
        stuLogEmail: stuLogEmail,
        stuLogPass: stuLogPass
      },
      success: function(data) {
        console.log(data);
        if (data == 0) {
          $("#statusLogMsg").html(
            '<small style="color:red"> Invalid Email ID or Password ! </small>'
          );
        } else if (data == 1) {
          $("#statusLogMsg").html(
            '<div>Loading.....</div>'
          );
          // Empty Login Fields
        //   clearStuLoginField();
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000);
        }
      }
    });
  }
  