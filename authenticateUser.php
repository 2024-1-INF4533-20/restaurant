<?php
include_once 'connexion-BD.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->Courriel) && isset($data->MotDePasse)) {
    try {
        $stmt = $dbh->prepare("SELECT * FROM user WHERE Courriel = :courriel AND MotDePasse = :motDePasse");
        $stmt->bindParam(':courriel', $data->Courriel);
        $stmt->bindParam(':motDePasse', $data->MotDePasse);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $response = [
                'authenticated' => true,
                'message' => 'User authenticated successfully.'
            ];
        } else {
            $response = [
                'authenticated' => false,
                'message' => 'Invalid email or password.'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        error_log("Error authenticating user: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Failed to authenticate user.']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request. Email and password are required.']);
}
?>
