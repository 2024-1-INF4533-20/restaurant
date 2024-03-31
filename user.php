<?php
include_once 'connexion-BD.php';

try {
    $sql = "SELECT * FROM user";
    $stmt = $dbh->query($sql);
    $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>User Data</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Courriel</th><th>Mot de Passe</th></tr>";
    foreach ($usersData as $user) {
        echo "<tr>";
        echo "<td>" . $user['Id'] . "</td>";
        echo "<td>" . $user['Nom'] . "</td>";
        echo "<td>" . $user['Courriel'] . "</td>";
        echo "<td>" . $user['MotDePasse'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    error_log("Error fetching" . $e->getMessage());
    http_response_code(500);
    echo "Faile pour fetch";
}
?>

