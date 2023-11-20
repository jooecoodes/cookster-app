$(document).ready(() => {

    $("#uploadForm").on("submit", (e) => {
        e.preventDefault();

        let formData = new FormData($("#uploadForm")[0]);
        

        $.ajax({
            url: 'profile.php', 
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                // Handle the server response
                // parsed = JSON.parse(response);
                alert(response);
                window.location.reload();
            },
            error: function (error) {
                // Handle errors
                console.log(error);
            }

        });
    })
   $("#logoutBttn").on("click", () => {
        $.ajax({
            type: "POST",
            url: "../logout.php",
            data: {},
            success: function(response) {
            // Handle the server's response (e.g., show the next question)
            
            location.reload();
             
                            
            },
            error: function(error) {

            console.error("Error:", error);

            },
        })

    })

})


