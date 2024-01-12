$(document).ready(() => {
    let fnameFlag = false;
    let lnameFlag = false;
    let emailFlag = false;
    let pwdFlag = false;
    let confPwdFlag = false;

    
    $('#registrationForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        //Function Pass
        let submitIdentifier = $("#submitIdentifier").val();
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $('#email').val();
        let pwd = $('#password').val()
        let gender = $("input[name='gender']:checked").val();
        let holder = fieldCheck(fnameFlag, lnameFlag, emailFlag, pwdFlag, confPwdFlag);
        if (holder.length > 0) {
          alert(holder);
          console.log(fnameFlag);
          console.log(lnameFlag);
          console.log(emailFlag);
          console.log(pwdFlag);
          console.log(confPwdFlag);
        } else {
          register(formData);
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
            if(response == "Fname is ok"){
              $("#fnameIndicator").text("First Name is fine");
              $("#fname").css("border-color", "green")
              fnameFlag = true;
            } 
            if (response == "Fname is not ok") {
              $("#fnameIndicator").text("First Name must not exceed 20 letters");
              $("#fname").css("border-color", "red")
              fnameFlag = false;
            }
          }
        });
      } else {
        $("#fnameIndicator").text("");
        $("#fname").css("border-color", "")
        fnameFlag = false;
      }
   });
   
    // Lname
    $("#lname").keyup(function(){
      console.log("im executed");
      let lname = $(this).val();
      if(lname.length > 1){
        $.ajax({
          type: 'POST',
          url: 'fullname_checker.php',
          data: {lname: lname},
          success: function(response){
            console.log("success response")
            if(response == "Lname is ok"){
              $("#lnameIndicator").text("Last Name is fine");
              $("#lname").css("border-color", "green")
              lnameFlag = true;
            } 
            if (response == "Lname is not ok") {
              $("#lnameIndicator").text("Last Name must not exceed 8 letters");
              $("#lname").css("border-color", "red")
              lnameFlag = false;
            }
          }
        });
      } else {
        $("#lnameIndicator").text("");
        $("#lname").css("border-color", "")
        lnameFlag = false;
      }
   });


   $("#lname").on("blur", () => {
    console.log("blur executed");    
    let fnameVal = $("#fname").val();
    let lnameVal = $("#lname").val();
    if(fnameVal.length > 1 && lnameVal.length > 1) {
      $.ajax({
        type: 'POST',
        url: 'fullname_checker2.php',
        data: {checkfullname: true, fname: fnameVal, lname: lnameVal},
        success: function(response){
          if(response == "Full name is already taken") {
            $("#fnameIndicator").text("Full name is already taken")
            $("#lnameIndicator").text("Full name is already taken")
            $("#fname").css("border-color", "red")
            $("#lname").css("border-color", "red")
            fnameFlag = false;
            lnameFlag = false;
          } else {
            $("#fnameIndicator").text("Full name is not registered")
            $("#lnameIndicator").text("Full name is not registered")
            $("#fname").css("border-color", "green")
            $("#lname").css("border-color", "green")
            fnameFlag = true;
            lnameFlag = true;
          }
        }
      });
    }
  
   
   })
    // Email
    $("#email").keyup(function(){
        let email = $(this).val();
        if(email.length > 1){
          $.ajax({
            type: 'POST',
            url: 'check_email.php',
            data: {email: email},
            success: function(response){
              console.log(response);
              if(response == "userexist"){
                $("#emailIndicator").text("Email is already registered.");
                $("#email").css("border-color", "red");
                emailFlag = false;
              } 
              if(response == "Email is valid") {
                $("#emailIndicator").text("Email is available.");
                $("#email").css("border-color", "green");
                emailFlag = true;
              } 
              if(response == "Email is invalid"){
                $("#email").css("border-color", "red");
                $("#emailIndicator").text("Invalid Email");
                emailFlag = false;
              }
            }
          });
        } else {
          $("#emailIndicator").text("");
          $("#email").css("border-color", "");
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
                $("#password").css("border-color", "green");
                pwdFlag = true;
              } else {
                $("#pwdIndicator").text("Password must be at least 8 character and it should contain special characters such as /[!@#$%^&*(),.?");
                $("#password").css("border-color", "red");
                pwdFlag = false;
              }
            }
          });
        } else {
          $("#pwdIndicator").text("");
          $("#password").css("border-color", "");
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
                $("#confPassword").css("border-color", "green");
                confPwdFlag = true;
            } else {
                $('#confPwdIndicator').text("Password doesn't match");
                $("#confPassword").css("border-color", "red");
                confPwdFlag = false;
            }
        } else {
          $("#confPwdIndicator").text("");
          $("#confPassword").css("border-color", "");
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

function register(formData) { 

  $.ajax({
    type: "POST",
    url: "register.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
      console.log(response);
      alert("response");        
    },
    error: function(error) {
        console.error("Error:", error);
    }
});
}

