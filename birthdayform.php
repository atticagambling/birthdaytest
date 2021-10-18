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

<?php

    include "dbconnect.php";


    function submitdata($servername,$username,$password,$dbname,$firstname,$surname,$birthday,$email)
    {

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    
        $stmt = $conn->prepare("INSERT INTO birthday (FirstName, Surname, BirthdayDate, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $birthday, $email);

        $firstname=$firstname;
        $lastname=$surname;
        $birthday=$birthday;
        $email=$email;
        $stmt->execute();
        echo "Your birthday info has been submitted succesfully<br />";
        echo "Name:".$firstname." ".$surname."<br />";
        echo "Birthday:".$birthday."<br />";
        echo "Email:".$email."<br />";
        $stmt->close();
        $conn->close();
    }

    function displaydata($firstname,$surname,$birthday,$email)
    {
        echo "Name:".$firstname." ".$surname."<br />";
        echo "Birthday:".$birthday."<br />";
        echo "Email:".$email."<br />";
    }
 
   submitdata($servername,$username,$password,$dbname,$_POST['firstname'],$_POST['surname'],$_POST['birthdaydate'],$_POST['email']);


?>

</body>
</html>