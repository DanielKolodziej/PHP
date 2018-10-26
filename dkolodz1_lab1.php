<?php
$classNum = "ITMD-462";
$name = "Daniel Kolodziej";
$email = "dkolodz1@hawk.iit.edu";
$userName = "dkolodz1";
$cwid = "A20331192";
$profName = "Brian Bailey";
$roomNum = 111;
$time = "Wednesday 6:25pm to 9:05pm";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ITMD-4/562 Lab 1</title>
</head>
<body>
    <h1> <?php echo  $classNum; ?> - Lab 1</h1>
    <h3>Student Name: <?php echo  $name; ?></h3>
    <p>Student Email: <?php echo  $email; ?></p>
    <p>Student Username: <?php echo $userName; ?></p>
    <p>Student CWID: <?php echo  $cwid; ?></p>
    <h3>Professor: <?php echo  $profName; ?></h3>
    <p>Room Number: <?php echo $roomNum; ?></p>
    <p>Class Day/Time: <?php echo $time; ?></p>
</body>
</html>