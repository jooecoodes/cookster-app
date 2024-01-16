<?php
session_start();
if (isset($_SESSION['userId'])) {
    $fname = (isset($_SESSION['userFname'])) ? $_SESSION['userFname'] : "user fname not set";
    $lname = (isset($_SESSION['userLname'])) ? $_SESSION['userLname'] : "user lname not set";

    $fullName = $fname . " " . $lname;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="../../styles/css/certificate.css">
    </head>

    <body>
        <div id="center-div">
            <div id="element">
                <img src="../../assets/certificates/certificate-of-achievement.png" alt="certificate" id="certificate">
                <p id="fullName"><?= $fullName ?></p>
            </div> 
        </div>
        <script>
            var element = document.getElementById("element");

            var opt = {
                margin: 0,
                filename: 'Certificate.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            html2pdf(element, opt);
        </script>
    </body>

    </html>
<?php
} else {
    echo "You're nt logged in";
}
?>