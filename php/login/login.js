$(document).ready(() => {
    $('#loginForm').on('submit', (e) => {
        e.preventDefault();
        let userEmail = $('#email').val();
        let userPassword = $('#password').val();
        
        $.ajax({
            type: "POST",
            url: "login.php",
            data: { email: userEmail, password: userPassword },
            success: function(response) {
                // Handle the server's response (e.g., show the next question)
                    if(response == "Login or password is invalid") {
                        $('#emailIndicator').text(`Email - ${response}`);
                        $('#passwordIndicator').text(`Password - ${response}`);
                    } else {
                        $('#emailIndicator').text("");
                        $('#passwordIndicator').text("");
                    }       
                    if(response == "User login successfully") {
                        console.log("User login");
                        window.location.href = "../profile";
                    }
                
                
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    })
})