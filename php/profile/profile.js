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
                console.log(response);
            },
            error: function (error) {
                // Handle errors
                console.log(error);
            }
    
    
        });
    })
   
})