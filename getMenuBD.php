<?php

if(isset($_GET)){

    //ouvrir la base de données
    include_once('sql.php');//inclusion de la base de données
    //inscrire les données dans la base de données


    $sql = "SELECT * FROM menu";

    $sth = $dbh->query($sql);
    // On voudrait les résultats sous la forme d’un tableau associatif
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    $dbh=NULL;

    echo json_encode($result);
}

?>