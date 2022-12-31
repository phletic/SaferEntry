<html>

<body>
<?php
$conn = mysqli_connect("bridge2.mysql.guardedhost.com","bridge2_cdy3test","2d-Dy4wqhm8Q","bridge2_cdy3test");
$location = $_GET['location'];
$NRIC = $_GET['NRIC'];
$date = $_GET['date'];
mysqli_autocommit($conn,TRUE);
date_default_timezone_set('Asia/Singapore');
$outDate = date('Y-m-d H:i:s');
$query = "UPDATE log SET checkout = '$outDate' WHERE location_id = '$location' AND NRIC = '$NRIC' AND checkin = '$date';";
$q1 = mysqli_query($conn,$query);
exit();
?>
</body>
</html>
