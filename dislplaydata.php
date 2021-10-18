<?php

echo "Hello";

//include "dbconnect.php";

/*$servername = "localhost";
$username = "atticatest_attica";
$password = "hortonta@50";
$dbname = "atticatest_birthday";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
        
$sql = "SELECT * FROM birthday";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "firstname: " . $row["FirstName"]. "Surname: " . $row["Surname"]. " Birthday: " . $row["BirthdayDate"]. " Email: ".$row["email"]. "<br>";
             }
        } else {
                echo "0 results";
        }
$conn->close();*/



?>