

// $.ajax({
//     type: "POST",
//     url: "leaderboard.php",
//     data: {post: "Test"},
//     success: function(response) {
//         // Handle the server's response (e.g., show the next question)
//         jsonParsed = JSON.parse(response);
        
        
//         jsonParsed.forEach((user, index) => {

//             userHTML = `
//                         <tr>
//                             <td>${index + 1}</td>
//                             <td>${user.username}</td>
//                             <td>${user.points}</td>
//                         </tr>
//                         `
            
//             $("tbody").append(userHTML);
//         });
        
        
//     },
//     error: function(error) {
//         console.error("Error:", error);
//     }
// });

