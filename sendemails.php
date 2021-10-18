<html>
    <head>
        <title>Send Emails</title>
        <link rel="stylesheet" href="css/mainstyle.css">
    </head>
<body>
<div>
    <ul>
        <li><a href="index.html">BIRTHDAY FORM</a></li>
        <li><a href="displaydata.php">DISPLAY BIRTHDAYS</a></li>
        <li><a href="sendemails.php">SEND EMAILS</a></li>
    </ul>
</div>
<h1>Send Birthday Emails</h1>

<?php

include "dbconnect.php";


function sendemails($servername,$username,$password,$dbname)
    {
        

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        date_default_timezone_set(Europe/London);
        $date=date("Y-m-d");
    
        $sql = "SELECT * FROM birthday WHERE BirthdayDate=?"; 
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result(); 

        if ($result->num_rows > 0) {
            echo "<table id='birthdayresult'>
            <tr>
                <th>First Name</td>
                <th>Surname</td>
                <th>Bithday</td>
                <th>Email</td>
            <tr/>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["FirstName"]. "</td>
                <td>" . $row["Surname"]. "</td>
                <td>" . $row["BirthdayDate"]. "</td>
                <td>".$row["email"]. "</td>
                </tr>";
                $email=$row["email"];
                $name=$row["FirstName"].' '.$row["Surname"];
                $subject="Happy Birthday".$name;
                
                $msg = "Congratulations, ".$name." Its your Birthday";
                $msg = wordwrap($msg,70);
                mail($email,$subject,$msg);
                
             }
             echo "</table>";
        } else {
                echo "<p>There are no records</p>";
        }
        $conn->close();
    }

sendemails($servername,$username,$password,$dbname);


?>