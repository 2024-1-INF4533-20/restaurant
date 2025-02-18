<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Info</title>
  <link rel="icon" type="image/x-icon" href="/Images/logo.ico">
  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="CSS/styleContact.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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
    <section class="before-footer"> <!--Affichage des informations-->
      <div class="about-us">
        <h1>
          À propos de nous<br>
        </h1>
      </div>

      <div class="text-contact">
        <p class="texteeinfo"><!--Informations sur le restaurant -->
          Nous sommes une pizzeria qui a commencé à faire des pizza au Québec à partir des années 1950.
          Le fondateur, Mario Peperonni, est un vrai italien qui désirait immigrer au Québec afin de partager son amour
          de
          la pizza avec les Québecois.
          Depuis son ouverture, nous continuons de cuisiner des pizzas avec autant d'amour que la première fois.
        </p>
        <p class="texteeinfo">
          Si vous avez des commentaires à nous soumettre afin d'améliorer votre expérience, vous pouvez nous contacter
          au
          450-love-pizza ou consulter notre page Facebook.
        </p>

     
      <div class="star">
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
      </div>
      <p class="review">5/5<br>
      6438 reviews</p>
      </div>

    
      <!-- Images -->
      <div class="imgDiv">
      <img src="Images/Why-Does-Pizza-Taste-So-Much-Better-From-Restaurants-3fdcc2c1c04742209a8d5030127dae89.png"
        width="400" alt="pizza1">
      <img
        src="Images/203924174-délicieuse-pizza-au-feu-de-bois-servie-sur-planche-et-table-en-bois-pizza-fraîche-chaude-sortie-du.png"
        width="400" alt="pizza2">

      <img src="Images/bartolo-memola-l-histoire-romanesque-du-premier-pizzaiolo-parisien,M396047.jpg" width="543"
        alt="pizza3">
      </div>
      
    </section>
  </div>

  <!-- bas de page -->
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