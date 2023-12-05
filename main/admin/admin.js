$(document).ready(() => {
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

  //modal
  $(".edit-btn").on("click", () => {
    let dataIndex = $(this).data('index');
    console.log(dataIndex);
    // $.ajax({
    //     type: "POST",
    //     url: "index.php",
    //     data: { getData: 'success', dataIndex: dataIndex},
    //     success: function (response) {
    //         console.log(response);
    //     },
    //     error: function (error) {
    //       console.error("Error:", error);
    //     },
    //   });
  });
  function openModal(user) {
    console.log(user);
    let modal = $("#modal");
    modal.css("display", "block")
    let modalHtml = `
        <div class="user-value">
            <p>Username: ${user.username}</p>
            <p>Useremail: ${user.useremail}</p>
            <p>First name: ${user.fname}</p>
            <p>Last name: ${user.lname}</p>
        </div>
    `;

    modal.append(modalHtml);
  }

});
