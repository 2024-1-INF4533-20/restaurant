<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Info</title>
  <link rel="icon" type="image/x-icon" href="/Images/logo.ico">
  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="CSS/stylesPanier.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="panier.js"></script>
   

</head>

<body>
  <header> <!--Barre de naviguation-->
    <ul class="topnav">
      <li><img src="Images/logo.png" width="200" alt="logo" id="logoImg"></li>
      <li class="libr"><a href="menu.php">Pizza Info</a></li>
      <li class="libr"><a href="menu.php">Menu </a></li>
      <li class="libr"><a href="contact.php">Informations</a></li>
      <li class="libr"><a href="historique.php">Historique de commande</a></li>
      <li class="libr"><a href="panier.php">Mon panier</a></li>
      <li class="libr"><a href="paiement.php">Paiement</a></li>
      <?php
        // Start the session
        session_start();

        // Check if the user's name is set in the session
        if (isset($_SESSION['userNom'])) {
            // Display the user's name if logged in
            echo "<li id='userDisplayName'>Bienvenue, " . $_SESSION['userNom'] . "!</li>";
            // Hide the "Connexion" tab if the user is logged in
            echo "<script>document.getElementById('connexionTab').style.display = 'none';</script>";
            // Display the "Se déconnecter" (Logout) button
            echo "<li class='libr' id='logoutBtn'><a href='logout.php'>Se déconnecter</a></li>";
        } else {
            // Show the "Connexion" tab if the user is not logged in
            echo "<li class='libr' id='connexionTab'><a href='connexion.php'>Connexion</a></li>";
            // Hide the user's name if the user is not logged in
            echo "<script>document.getElementById('userDisplayName').style.display = 'none';</script>";
        }
      ?>
    </ul>
  </header>
  

  <div class="background backcomplet">
    <section class="row justify-content-center" style="margin-left: 20%; margin-right: 20%;">
      <h2>Voici le contenu de votre commande:</h2>

      <table class="table"> <!--Tableau contenant ce que le client a choisi-->
        <thead>
          <tr>
            <th scope="col">Plat</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="panierContenu">

          <!-- le panier s'affiche ici -->

        </tbody>
      </table>
      <p id="prixTotal"></p>

      <button type="button" onclick="supprimerToutPanier()">Supprimer tout mon panier</button> <!--Bouton qui permet de supprimer toute la commande-->

      <!--bouton paiement-->
      <a href="paiement.php" class="btn" id="btnPanier">Payer ma commande</a>

    </section>
  </div>
  <!-- footer -->
  <footer>

    <ul class="bottomnav">
      <li><a href="">Commentaires</a></li>
      <li><a href="contact.php">À propos de nous</a></li>
      <li><a><img src="Images/logo-facebook.png" width="80" alt="facebook"></a></li>
      <li><a href="#top">Haut de la page</a></li>
    </ul>
  </footer>


  
</body>

</html>
