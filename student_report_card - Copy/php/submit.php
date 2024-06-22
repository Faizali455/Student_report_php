<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $batch = $_POST['batch'];
    $email = $_POST['email'];
    $english = $_POST['english'];
    $hindi = $_POST['hindi'];
    $math = $_POST['math'];
    $science = $_POST['science'];
    $history = $_POST['history'];
    $geography = $_POST['geography'];
    $remarks = $_POST['remarks'];

    $totalMarks = $english + $hindi + $math + $science + $history + $geography;
    $percentage = ($totalMarks / 600) * 100;

    if ($percentage >= 75) {
        $grade = "Distinction";
    } elseif ($percentage >= 60) {
        $grade = "First Class";
    } elseif ($percentage >= 33) {
        $grade = "Pass";
    } else {
        $grade = "Fail";
    }

    $_SESSION['report'] = array(
        'studentId' => $studentId,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'batch' => $batch,
        'email' => $email,
        'english' => $english,
        'hindi' => $hindi,
        'math' => $math,
        'science' => $science,
        'history' => $history,
        'geography' => $geography,
        'remarks' => $remarks,
        'grade' => $grade
    );

    echo "success";

    
} else {
    echo "Invalid request";
}
?>