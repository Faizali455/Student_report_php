<?php
session_start();

if (!isset($_SESSION['report'])) {
    header('Location: index.html');
    exit();
}

$report = $_SESSION['report'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Report</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(121,9,9,0.6064424060639881) 72%, rgba(0,212,255,1) 100%);
        }

        p{
            color:aliceblue;
            margin-bottom: 0.3rem;
            margin-top: 0.5rem;
            font-family: cursive;
        }

        th{
            color:aliceblue;
            margin-bottom: 0.3rem;
            margin-top: 0.5rem;
            font-family: fangsong;
        }

        h2{
            color: azure;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>

</head>
<body>
    <div class="container m-5 p-5">
        <h2>Student Report</h2>
        <table class="table">
            <tr><th>Student ID</th><td><p><?php echo $report['studentId']; ?></p></td></tr>
            <tr><th>First Name</th><td><p><?php echo $report['firstName']; ?></p></td></tr>
            <tr><th>Last Name</th><td><p><?php echo $report['lastName']; ?></p></td></tr>
            <tr><th>Batch/Class</th><td><p><?php echo $report['batch']; ?></p></td></tr>
            <tr><th>Email</th><td><p><?php echo $report['email']; ?></p></td></tr>
            <tr><th>English</th><td><p><?php echo $report['english']; ?></p></td></tr>
            <tr><th>Hindi</th><td><p><?php echo $report['hindi']; ?></p></td></tr>
            <tr><th>Math</th><td><p><?php echo $report['math']; ?></p></td></tr>
            <tr><th>Science</th><td><p><?php echo $report['science']; ?></p></td></tr>
            <tr><th>History</th><td><p><?php echo $report['history']; ?></p></td></tr>
            <tr><th>Geography</th><td><p><?php echo $report['geography']; ?></p></td></tr>
            <tr><th>Remarks</th><td><p><?php echo $report['remarks']; ?></p></td></tr>
            <tr><th>Grade</th><td><p><?php echo $report['grade']; ?></p></td></tr>
        </table>
        <button id="sendEmail" class="btn btn-primary">Send Report to Email</button>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>