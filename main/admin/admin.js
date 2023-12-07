$(document).ready(() => {
  // modal inside
  //log out bttn
  $("#logoutBttn").on("click", () => {
    $.ajax({
      type: "POST",
      url: "../logout.php",
      data: {},
      success: function (response) {

        location.reload();
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  });

  $("#modal").on("click", ".edit-btn-modal", function () {
    let dataKey = $(this).data('key');
    let userId = $("#user-id-hidden").val();
    console.log(userId);
    let unameFieldVal = $("#uname-modal").val();
    let emailFieldVal = $("#email-modal").val();
    let pwdFieldVal = $("#pwd-modal").val();
    let fnameFieldVal = $("#fname-modal").val();
    let lnameFieldVal = $("#lname-modal").val();

    console.log(typeof dataKey);
    switch (dataKey) {
      case "uname":
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { unameField: unameFieldVal, userId: userId},
          success: function (response) {
            console.log(response);
            if(reponse == "Successfully edited uname") {
              $("#uname-indicator").text(response);
            } else {
              $("#uname-indicator").text("Failed to change uname");
            }
           
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "email":
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { emailField: emailFieldVal, userId: userId },
          success: function (response) {
            console.log(response);
            if(reponse == "Successfully edited uname") {
              $("#uname-indicator").text(response);
            } else {
              $("#uname-indicator").text("Failed to change uname");
            }
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "pwd":

        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { pwdField: pwdFieldVal, userId: userId },
          success: function (response) {
            console.log(response);
            if(reponse == "Successfully edited uname") {
              $("#uname-indicator").text(response);
            } else {
              $("#uname-indicator").text("Failed to change uname");
            }
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "fname":
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { fnameField: fnameFieldVal, userId: userId },
          success: function (response) {
            console.log(response);
            if(reponse == "Successfully edited uname") {
              $("#uname-indicator").text(response);
            } else {
              $("#uname-indicator").text("Failed to change uname");
            }
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "lname":
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { lnameField: lnameFieldVal, userId: userId },
          success: function (response) {
            console.log(response);
            if(reponse == "Successfully edited uname") {
              $("#uname-indicator").text(response);
            } else {
              $("#uname-indicator").text("Failed to change uname");
            }
          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "delete":
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { deleteUser: true, userId: userId},
          success: function (response) {
            console.log(response);
            closeModal();
            location.reload();
          },
          error: function (error) {
            console.error("Error:", error);
          },
        })
    }
  });

  $("#modal").on("click", "#cancel-btn-modal", function() {
    closeModal();
  })

  //modal
  $(".edit-btn").click(function () {
    console.log($(this).data('index'));
    let dataIndex = $(this).data('index');
    $.ajax({
      type: "POST",
      url: "index.php",
      data: { dataIndex: dataIndex },
      success: function (response) {
        openModal(response);
        
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  })

  // content form
  $("#content-form").submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this)

    $.ajax({
      type: "POST",
      url: 'admin.php',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        // prints the response
        alert(response);
      },
      error: function(error) {
        // handle the error here
        console.error(error);
      }
    })
  })



  function openModal(userJSON) {
    userObject = JSON.parse(userJSON);
    console.log(userObject);
    let modal = $("#modal");
    modal.css("display", "block")
    let modalHtml = `
          <div class="user-value">
              <input type="hidden" value="${userObject.id}" id="user-id-hidden">
              <p>Username: ${userObject.username}</p>
              <input type="text" name="uname" id="uname-modal">
              <p id="uname-indicator"></p>
              <button class="edit-btn-modal" data-key="uname">Edit</button>
              <p>Useremail: ${userObject.useremail}</p>
              <input type="text" name="email" id="email-modal">
              <p id="email-indicator"></p>
              <button class="edit-btn-modal" data-key="email">Edit</button>
              <p>Username: ${userObject.userpassword}</p>
              <input type="text" name="pwd" id="pwd-modal">
              <p id="pwd-indicator"></p>
              <button class="edit-btn-modal" data-key="pwd">Edit</button>
              <p>First name: ${userObject.fname}</p>
              <input type="text" name="fname" id="fname-modal">
              <p id="fname-indicator"></p>
              <button class="edit-btn-modal" data-key="fname">Edit</button>
              <p>Last name: ${userObject.lname}</p>
              <input type="text" name="lname" id="lname-modal">
              <p id="lname-indicator"></p>
              <button class="edit-btn-modal" data-key="lname">Edit</button>
              <button id="cancel-btn-modal">Cancel</button>
          </div>
      `;

    modal.append(modalHtml);
  }

  function closeModal() {
    let userModal = $(".user-value");
    userModal.remove();
    console.log("Close modal executed");
  }
})
