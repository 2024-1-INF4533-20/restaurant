<?php
include_once 'connexion-BD.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->firstName) && isset($data->email) && isset($data->password)) {
    try {
        $stmt = $dbh->prepare("SELECT * FROM user WHERE Courriel = :email");
        $stmt->bindParam(':email', $data->email);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            echo "existe";
        } else {
            $stmt = $dbh->prepare("INSERT INTO user (Nom, Courriel, MotDePasse) VALUES (:firstName, :email, :password)");
            $stmt->bindParam(':firstName', $data->firstName);
            $stmt->bindParam(':email', $data->email);
            $stmt->bindParam(':password', $data->password);
            $stmt->execute();

            echo "succèss";
        }
    } catch (PDOException $e) {
        error_log("Courriel dèja utilisé" . $e->getMessage());
        http_response_code(500);
        echo "erreur";
    }
} else {
    http_response_code(400);
    echo "erreur";
}
?>

