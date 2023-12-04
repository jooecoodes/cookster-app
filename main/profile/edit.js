$(document).ready(() => {
    //uname
    $("#submit-btn-uname").on('click', (e) => {
        console.log('clicked');
        let uname = $("#unameField").val();
        let pwd = $("#pwdField").val();
        let hidden = $("#hidden-fname").val();

        $.ajax({
            type: "POST",
            url: "edit.php",
            data: { uname: uname, pwd: pwd, hiddenUname: hidden},
            success: function(response) {
            // Handle the server's response (e.g., show the next question)
            e.preventDefault();
            alert(response);
                
                    
        
            },
            error: function(error) {

            console.error("Error:", error);

            },  
        })

    })
    //pwd
    $("#submit-btn-pwd").on('click', (e) => {
        let newpwd = $("#newPwdField").val();
        let confpwd = $("#confPwdField").val();
        let pwd = $("#newPwdConfField").val();
        let hidden = $("#hidden-pwd").val();
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: { newpwd: newpwd, confpwd: confpwd, pwd: pwd, hiddenPwd: hidden},
            success: function(response) {
            // Handle the server's response (e.g., show the next question)
            e.preventDefault();
            alert(response);
               
                    
        
            },
            error: function(error) {

            console.error("Error:", error);

            },  
        })

    })

    //fname
    $("#submit-btn-fname").on('click', (e) => {
        let newfname = $("#newFnameField").val();
        let pwd = $("#newPwdFnameField").val();
        let hidden = $("#hidden-fname").val();
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: { newfname: newfname, pwd: pwd, hiddenFname: hidden},
            success: function(response) {
            // Handle the server's response (e.g., show the next question)
            e.preventDefault();
            alert(response);

        
            },
            error: function(error) {

            console.error("Error:", error);

            },  
        })

    })
    //lname
    $("#submit-btn-lname").on('click', (e) => {
        let newlname = $("#newLnameField").val();
        let pwd = $("#newPwdLnameField").val();
        let hidden = $("#hidden-lname").val();
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: { newfname: newlname, pwd: pwd, hiddenLname: hidden},
            success: function(response) {
            // Handle the server's response (e.g., show the next question)
            e.preventDefault();
            alert(response);

                    
        
            },
            error: function(error) {

            console.error("Error:", error);

            },  
        })

    })
})