<?php

if(isset($_POST)){

    $data = file_get_contents("php://input");

    $user = json_decode("$data",true); // retourne un tableau php

    

   
    $id=$user["id"];
    $nom=$user["nom"];
    $commande=$user["commande"];
    $prix=$user["prix"];
    $date=$user["date"];
    $adresse=$user["adresse"];

    //ouvrir la base de données
    include_once('introo.php');//inclusion de la base de données
    //inscrire les données dans la base de données


    $sql = "INSERT INTO historique (Id,Nom_User,Commande,Prix,Date,Adresse) VALUES ('$id','$nom','$commande','$prix', '$date', '$adresse')";


    $dbh->exec($sql);
    $dbh=NULL;

    echo json_encode($user);
}



?>