<?php 

   include "../db_conn.php";

   if(isset($_POST)) {
      if(isset($_POST['post'])) {
      
         $selectionSql = "SELECT * FROM user ORDER BY points DESC";
         $result = mysqli_query($conn, $selectionSql);
      
         $dataStorer = [];
      
         if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               // Append each row to the $dataStorer array
               $dataStorer[] = $row;
            }
            $conn->close();
         }
      
         // print_r($dataStorer);
         echo json_encode($dataStorer);
      }
   }
  
  
?>