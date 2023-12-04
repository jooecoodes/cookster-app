$(document).ready(() => {
  
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();
    
        // Create FormData object and append form data
        var formData = new FormData(this);
    
        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response == "Empty Input") {
                    alert("Empty Input");
                }
                if(response == "User login successfully") {
                    window.location.reload();
                    location.href = "../profile/";
                    
                } 
                if(response == "Login or password is invalid"){
                    alert("Login or password is invalid");
                }
                if(response == "Recaptcha Error") {
                    alert("Recaptcha is invalid")
                } 
               
                
                // Handle the server's response
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    });
    
});

function onRecaptchaSubmit(token) {
    $("#g-token").val(token); // Set the token in a hidden input field
}