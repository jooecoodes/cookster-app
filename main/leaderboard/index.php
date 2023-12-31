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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>

    <body>
        <table>
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
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $userFullName ?></td>
                        <td><?= $dataStorer[$i]['useremail'] ?></td>
                        <td><?= $dataStorer[$i]['points'] ?></td>
                    </tr>

                <?php endfor; ?>

            </tbody>
        </table>
    </body>

    </html>

<?php
} else {
    header("Location: ../login/");
}
