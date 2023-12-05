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
    console.log(dataKey);
    switch (dataKey) {
      case "uname":
        let unameFieldVal = $("#uname-modal").val();
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { unameField: unameFieldVal, userId: userId},
          success: function (response) {

          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "email":
        let emailFieldVal = $("#email-modal").val();
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { emailField: emailFieldVal, userId: userId },
          success: function (response) {
            openModal(response);

          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "pwd":
        let pwdFieldVal = $("#pwd-modal").val();

        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { pwdField: pwdFieldVal, userId: userId },
          success: function (response) {
            openModal(response);

          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "fname":
        let fnameFieldVal = $("#fname-modal").val();
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { fnameField: fnameFieldVal, userId: userId },
          success: function (response) {
            openModal(response);

          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
      case "lname":
        let lnameFieldVal = $("#lname-modal").val();
        $.ajax({
          type: "POST",
          url: "admin.php",
          data: { lnameField: lnameFieldVal, userId: userId },
          success: function (response) {
            openModal(response);

          },
          error: function (error) {
            console.error("Error:", error);
          },
        });
        break;
    }
  });


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
              <button class="edit-btn-modal" data-key="uname">Edit</button>
              <p>Useremail: ${userObject.useremail}</p>
              <input type="text" name="email" id="email-modal">
              <button class="edit-btn-modal" data-key="email">Edit</button>
              <p>Username: ${userObject.userpassword}</p>
              <input type="text" name="pwd" id="pwd-modal">
              <button class="edit-btn-modal" data-key="pwd">Edit</button>
              <p>First name: ${userObject.fname}</p>
              <input type="text" name="fname" id="fname-modal">
              <button class="edit-btn-modal" data-key="fname">Edit</button>
              <p>Last name: ${userObject.lname}</p>
              <input type="text" name="lname" id="lname-modal">
              <button class="edit-btn-modal" data-key="lname">Edit</button>
              <button id="cancel-btn-modal">Cancel</button>
          </div>
      `;

    modal.append(modalHtml);
  }

  function closeModal() {
    let modal = $("#modal");
    modal.css("display", "block");
  }
})


