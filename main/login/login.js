$(document).ready(() => {
    $("#loginForm").on("submit", (e) => {
        e.preventDefault();
        let userEmail = $('#email').val();
        let userPassword = $('#password').val();

        

        $.ajax({
            type: "POST",
            url: "login.php",
            data: {email: userEmail, password: userPassword},
            success: function(response) {
                // Handle the server's response (e.g., show the next question)
                if(response == "User login successfully") {
                   
                    alert(response);
                    window.location.href = "../profile/";
                } else {
                    
                    $("#emailIndicator").text("Email - " + response);
                    $("#passwordIndicator").text("Password - " + response);
                }
                
                
            },
            error: function(error) {
                console.error("Error:", error);
            }
        })
    })
})