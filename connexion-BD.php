<?php
$host = 'localhost';
$dbname = 'pizza_info';
$username = 'root';
$password = ''; 

try {
    // Create a PDO instance
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $testUser = 'alex@uqo.ca'; 
    $stmt = $dbh->prepare("SELECT * FROM user WHERE Courriel = :courriel");
    $stmt->bindParam(':courriel', $testUser);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
    } else {
        echo "User with email $testUser does not exist in the database.";
    }
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    exit("Connection failed");
}
?>
