<!-- <?php
include_once 'connexion-BD.php';

$email = $_POST['email']; 
$password = $_POST['password']; 

try {
    $stmt = $dbh->prepare("SELECT * FROM user WHERE Courriel = :courriel AND MotDePasse = :motDePasse");
    $stmt->bindParam(':courriel', $email);
    $stmt->bindParam(':motDePasse', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header('Content-Type: application/json');
        echo json_encode(['authenticated' => true, 'user' => $user]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['authenticated' => false, 'error' => 'Invalid email or password']);
    }
} catch (PDOException $e) {
    error_log("Error authenticating user: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'An error occurred while authenticating the user']);
}
?> -->

<?php
$validEmail = 'admin@uqo.ca';
$validPassword = 'admin';

$postData = json_decode(file_get_contents('php://input'), true);
$email = $postData['Courriel'];
$password = $postData['MotDePasse'];

if ($email === $validEmail && $password === $validPassword) {
    echo json_encode(['authenticated' => true]);
} else {
    echo json_encode(['authenticated' => false]);
}
?>

