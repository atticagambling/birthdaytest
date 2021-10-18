<html>
    <head>
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
<h1>Birthday Results</h1>
<?php

    include "dbconnect.php";

    function displaydata($servername, $username, $password, $dbname)
    {
         $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM birthday";
        $result = $conn->query($sql);

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
             }
             echo "</table>";
        } else {
                echo "<p>There are no records</p>";
        }
        
    }
 
    displaydata($servername, $username, $password, $dbname);
?>
</body>
</html>