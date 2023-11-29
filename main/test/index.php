<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #element {
            position: relative;
        }
        #certificate {
            height: 794px;
            width: 1123px;
        }
        p {
            position: absolute;
            top: 100px; /* Adjust to position the name vertically */
            left: 200px; /* Adjust to position the name horizontally */
            font-size: 24px; /* Adjust font size as needed */
            color: #fff; /* Adjust text color as needed */
        }
    </style>
</head>
<body>
    <div id="element">
        <img src="../../assets/certificates/certificate1.jpg" alt="" id="certificate">
        <p>TEST TEST TEST TEST</p>
    </div>
    <script> 
       var element = document.getElementById("element");
       
        var opt = {
                margin: 0,
                filename: 'Certificate.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
            };
        html2pdf(element, opt);
    </script>
</body>
</html>