$(document).ready(() => {
    let fnameFlag = false;
    let lnameFlag = false;
    let emailFlag = false;
    let pwdFlag = false;
    let confPwdFlag = false;

    
    $('#registrationForm').on('submit', (e) => {
        e.preventDefault();
  
        //Function Pass
        console.log("clicked");
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $('#email').val();
        let pwd = $('#password').val()
        let holder = fieldCheck(fnameFlag, lnameFlag, emailFlag, pwdFlag, confPwdFlag);
        if (holder.length > 0) {
          alert(holder);
          console.log(fnameFlag);
          console.log(lnameFlag);
          console.log(emailFlag);
          console.log(pwdFlag);
          console.log(confPwdFlag);
        } else {
          register(email, pwd, fname, lname);
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
              fnameFlag = true;
            } else {
              $("#fnameIndicator").text("First Name must not exceed 8 letters");
              fnameFlag = false;
            }
          }
        });
      } else {
        $("#fnameIndicator").text("");
        fnameFlag = false;
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
              lnameFlag = true;
            } else {
              $("#lnameIndicator").text("Last Name must not exceed 8 letters");
              lnameFlag = false;
            }
          }
        });
      } else {
        $("#lnameIndicator").text("");
        lnameFlag = false;
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
                emailFlag = false;
              } else if(response == "Email is invalid") {
                $("#emailIndicator").text("Invalid Email");
                emailFlag = false;
              } else {
                $("#emailIndicator").text("Email is available.");
                emailFlag = true;
              }
             
            }
          });
        } else {
          $("#emailIndicator").text("");
          emailFlag = false;
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
                pwdFlag = true;
              } else {
                $("#pwdIndicator").text("Password must be at least 8 character and it should contain special characters such as /[!@#$%^&*(),.?");
                pwdFlag = false;
              }
            }
          });
        } else {
          $("#pwdIndicator").text("");
          pwdFlag = false;
        }
     });
    //  Confirm Pwd 
    $("#confpwd").keyup(function(){
        let confpwd = $(this).val();
        let pwd = $('#password').val();

        if(confpwd.length > 0){
            if(confpwd == pwd) {
                $('#confPwdIndicator').text("Password match");
                confPwdFlag = true;
            } else {
                $('#confPwdIndicator').text("Password doesn't match");
                confPwdFlag = false;
            }
        } else {
          $("#confPwdIndicator").text("");
          confPwdFlag = false;
        }
     });
})

function fieldCheck(fn, ln, em, pwd, confpwd) {
  let wrongIdentifier = [];
  if(!fn) {
    wrongIdentifier.push("fname");
  }
  if(!ln) {
    wrongIdentifier.push("lname");
  }
  if(!em) {
    wrongIdentifier.push("em");
  }
  if(!pwd) {
    wrongIdentifier.push("pwd");
  }  
  if(!confpwd) {
    wrongIdentifier.push("confpwd")
  }

  return wrongIdentifier;
}

function register(userEmail, userPassword, userFName, userLName) {
  $.ajax({
    type: "POST",
    url: "register.php",
    data: { 
      email: userEmail, 
      password: userPassword,
      fname: userFName,
      lname: userLName
    },
    success: function(response) {
        // Handle the server's response (e.g., show the next question)
        
        console.log(response);
        
        
    },
    error: function(error) {
        console.error("Error:", error);
    }
  })
}