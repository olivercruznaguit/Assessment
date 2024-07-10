<?php
function calculateDateDifference($date1, $date2, $format = 'days') {
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);

    switch($format) {
        case 'days':
            return $interval->days;
        case 'months':
            return $interval->m + ($interval->y * 12);
        default:
            return $interval->days;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $number1 = htmlspecialchars($_POST['number1']);
    $number2 = htmlspecialchars($_POST['number2']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $date1 = htmlspecialchars($_POST['date1']);
    $date2 = htmlspecialchars($_POST['date2']);

    $firstDigit1 = substr($number1, 0, 1);
    $firstDigit2 = substr($number2, 0, 1);
    $shortLastName = substr($lastName, 0, 3);

    $daysDifference = calculateDateDifference($date1, $date2, 'days');
    $monthsDifference = calculateDateDifference($date1, $date2, 'months');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="results">
        <h1>Form Results</h1>
        <hr>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Password:</strong> <?php echo $password; ?></p>
        <p><strong>Address (City):</strong> <?php echo $city; ?></p>
        <p><strong>First Digit of Input Number 1 and 2:</strong> <?php echo $firstDigit1 . ',' . $firstDigit2; ?></p>
        <p><strong>First 3 Letters of Last Name:</strong> <?php echo $shortLastName; ?></p>
        <p><strong>Difference between Dates (Days):</strong> <?php echo $daysDifference; ?></p>
        <p><strong>Difference between Dates (Months):</strong> <?php echo $monthsDifference; ?></p>
    </div>
</body>
</html>
