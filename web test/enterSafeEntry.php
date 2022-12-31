<html>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button2 {
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
</style>
</head>
<body>
location = "<?php echo $_POST["location"]; ?>"<br>
NRIC  = "<?php echo $_POST["NRIC"];?>"
<br>
<?php
    ini_set('display_errors', 0);
    $location = $_POST["location"];
    $NRIC = $_POST["NRIC"];
    if($location == "" || $NRIC == ""){
         echo '<p style="color:red">Input must not be a null<p>';
    }else{
                $conn = mysqli_connect("bridge2.mysql.guardedhost.com","bridge2_cdy3test","2d-Dy4wqhm8Q","bridge2_cdy3test");
        mysqli_autocommit($conn,TRUE);
        date_default_timezone_set('Asia/Singapore');
        $date = date('Y-m-d H:i:s');
        echo "DateTime = $date <br>";
       if (!$conn) {
            echo '<p style="colour:black">Failed to connect to MySQL. Please try again later<p>';
            exit();
        }else{
            try{
            $q1 = mysqli_query($conn,"SELECT * FROM location;");
            $rows = mysqli_fetch_all($q1, MYSQLI_ASSOC);
            $ids = array_column($rows, 'id');
            for ($x = 0; $x <= sizeof($ids); $x++) {
                if($ids[$x] == $location){
                    $q3 = mysqli_query($conn,"SELECT * FROM log;");
                    $Inputs = mysqli_fetch_all($q3, MYSQLI_ASSOC);
                    echo  $Inputs['NRIC'];
                    $query = "INSERT INTO log VALUES('$location','$NRIC','$date',NULL);";
                    $q2 = mysqli_query($conn,$query);
                    echo "connected to MYSQL database and have made an entry";
                    echo "<form action='checkOut.php',method='get'><input type='hidden' name='location' value='$location'><input type='hidden' name='NRIC' value='$NRIC'><input type='hidden' name='date' value='$date'><input type='submit' value='Check out'/></form>";

                }
            }
            }catch(Exception $e){
            echo "fail";
            }
    }
    }


?>
</body>
</html>
