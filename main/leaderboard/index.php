<?php
require_once("../db_conn.php");
session_start();
if (isset($_SESSION['userId'])) {
    $selectionSql = "SELECT * FROM user ORDER BY points DESC";
    $result = mysqli_query($conn, $selectionSql);

    $dataStorer = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Append each row to the $dataStorer array
            $dataStorer[] = $row;
        }
        $conn->close();
    } else {
        echo "Users not found";
    }




?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Leaderboard</title>  
        <link rel="stylesheet" href="../../styles/css/leaderboard.css">
    </head>

    <body>
        <header>
            <?php include "../components/logged-in-nav.php"?>

        </header>
        <main>
            <div id="table-container">
                <table class="table table-striped" id="leaderboardTable">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php for ($i = 0; $i < count($dataStorer); $i++) : ?>
                            <?php
                                $userFullName = $dataStorer[$i]['fname'] . " " . $dataStorer[$i]['lname'];
        
                            ?>
                            <tr id="tbody-tr">
                                <td><?= $i + 1?></td>
                                <td><?= $userFullName ?></td>
                                <td><?= $dataStorer[$i]['useremail'] ?></td>
                                <td><img src="../../assets/star.png" alt="star"><?= $dataStorer[$i]['points'] ?></td>
                            </tr>
        
                        <?php endfor; ?>
        
                    </tbody>
                </table>

            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {
    header("Location: ../login/");
}
