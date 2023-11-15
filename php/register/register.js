$(document).ready(() => {
    $('#registrationForm').on('submit', (e) => {
        e.preventDefault();
        let userFName = $("#fnameIndicator").val();
        let userLName = $("#lnameIndicator").val();
        let userEmail = $('#email').val();
        let userPassword = $('#password').val();
        let userConfPwd = $('#confPass').val();
        let emailIndicator = $("#emailIndicator").val();
        let pwdIndicator = $("#pwdIndicator").val();
        let confPwdIndicator = $('#confPwdIndicator').val();
      
        if(emailIndicator == "Email is available") {
            if(pwdIndicator == "Password is strong") {
                if(confPwdIndicator == "Password match") {
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: { email: userEmail, password: userPassword },
                        success: function(response) {
                            // Handle the server's response (e.g., show the next question)
                            
                            console.log(response);
                            
                            
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    alert("Password doesn't match");
                }
            } else {
                alert("Password is not strong");
            }
        } else {
            alert("Email is unavailable");
        }
       
        
    })
    // Fname
    $("#fname").keyup(function(){
      let fname = $(this).val();
      if(fname.length > 1){
        $.ajax({
          type: 'POST',
          url: 'fullname_checker.php',
          data: {fname: fname},
          success: function(response){
            console.log(response);
            if(response == true){
              $("#fnameIndicator").text("First Name is fine");
            } else {
              $("#fnameIndicator").text("First Name must not exceed 8 letters");
            }
          }
        });
      } else {
        $("#fnameIndicator").text("");
      }
   });
    // Lname
    $("#lname").keyup(function(){
      let lname = $(this).val();
      if(lname.length > 1){
        $.ajax({
          type: 'POST',
          url: 'fullname_checker.php',
          data: {lname: lname},
          success: function(response){
            console.log(response);
            if(response == true){
              $("#lnameIndicator").text("Last Name is fine");
            } else {
              $("#lnameIndicator").text("First Name must not exceed 8 letters");
            }
          }
        });
      } else {
        $("#lnameIndicator").text("");
      }
   });
    // Email
    $("#email").keyup(function(){
        let email = $(this).val();
        if(email.length > 1){
          $.ajax({
            type: 'POST',
            url: 'check_email.php',
            data: {email: email},
            success: function(response){
              if(response == "userexist"){
                $("#emailIndicator").text("Email is already registered.");
              } else {
                $("#emailIndicator").text("Email is available.");
              }
            }
          });
        } else {
          $("#emailIndicator").text("");
        }
     });
    //  Password 
     $("#password").keyup(function(){
        let password = $(this).val();
        if(password.length > 0){
          $.ajax({
            type: 'POST',
            url: 'check_pwd.php',
            data: {password: password},
            success: function(response){
              if(response == true){
                $("#pwdIndicator").text("Password is strong");
              } else {
                $("#pwdIndicator").text("Password must be at least 8 character and it should contain special characters such as /[!@#$%^&*(),.?");
              }
            }
          });
        } else {
          $("#pwdIndicator").text("");
        }
     });
    //  Confirm Pwd 
    $("#confpwd").keyup(function(){
        let confpwd = $(this).val();
        let pwd = $('#password').val();

        if(confpwd.length > 0){
            if(confpwd == pwd) {
                $('#confPwdIndicator').text("Password match");
            } else {
                $('#confPwdIndicator').text("Password doesn't match");
            }
        } else {
          $("#confPwdIndicator").text("");
        }
     });
})
