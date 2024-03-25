<?php
$servername = "localhost";
//$username = "username";
$username = "root";
//$password = "password";
$password = "";
//$dbname = "myDBPDO";
$dbname = "classicmodels";

//TODO PDO objasniti i prilagoditi skripte 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("
    INSERT INTO MyGuests (firstname, lastname, email, broj)
    VALUES (:firstname, :lastname, :email, :broj)
    ");
    $stmt->bindParam(':firstname', $firstname,PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname,PDO::PARAM_STR);
    $stmt->bindParam(':email', $email,PDO::PARAM_STR);
    $stmt->bindParam(':broj', $broj,PDO::PARAM_INT);

    // insert a row
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $broj=77;
    $stmt->execute();

    // insert another row
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $broj=77;
    $stmt->execute();

    // insert another row
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $broj=77;
    $stmt->execute();

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;