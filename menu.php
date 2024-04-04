

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Info</title>
  <link rel="icon" type="image/x-icon" href="/Images/logo.ico"> <!-- icône d'onglet -->
  <link rel="stylesheet" href="CSS/styles.css"> <!-- feuille de style css -->
  <link rel="stylesheet" href="CSS/stylesMenu.css"> <!-- feuille de style css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript" src="panier.js"></script>
  <!-- bootstrap (notre sauveur) -->
   
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

  <div class="background">
    <!-- Mini menu -->
    <section>
      <!-- side bar à venir? -->
    </section>

    <!-- Pizzas -->
    <section class="row justify-content-center">
      <div class="col-auto">
        <h3 id="tablePizza">Nos Pizzas</h3>
        <table class="table" id="tableMesPizza">
          <?php
          include_once ("sql.php");
          //La requête SQL
          $sql = "SELECT * FROM menu WHERE Type = 'Pizza'";
          //Recherche des données
          $sth = $dbh->query($sql);
          // On voudrait les résultats sous la forme d’un tableau associatif
          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          //Affichage des résultats
          
          $compteur = 1;

          echo "<tr>";
          foreach ($result as $row) {
            if ($compteur > 4) {

              $compteur = 0;
              echo "</tr><tr>";

            }
            echo "<td>
    <div class='card shadow p-3 mx-auto btnShow' style='width: 18rem;'>
      <img class='card-img-top' src='" . $row['Image'] . "' alt='Card image cap'>
      <div class='card-body'>
        <h5 class='card-title'>" . $row['Nom'] . "</h5>
        <p class='card-text'>" . $row['Ingredients'] . "</p>
        <table>
          <tr>
            <td>
              <a   class='btn' onClick='ajouterAuPanier(".$row['Id'].");'>Ajouter au panier</a>
            </td>
            <td>
              <div class='hide'>
                <p class='prix-item'>" . $row['Prix'] . "$</p>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </td>
  ";
            $compteur++;
          }
          echo "</tr>";
                 

          ?>
        </table>
      </div>
    </section>

    <!-- Pâtes -->
    <section class="row justify-content-center">
      <div class="col-auto">
        <h3 id="tablePates">Nos Pâtes</h3>
        <table class="table" id="tableMesPates">

        <?php
          include_once ("sql.php");
          //La requête SQL
          $sql = "SELECT * FROM menu WHERE Type = 'Pates'";
          //Recherche des données
          $sth = $dbh->query($sql);
          // On voudrait les résultats sous la forme d’un tableau associatif
          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          //Affichage des résultats
          
          $compteur = 1;

          echo "<tr>";
          foreach ($result as $row) {
            if ($compteur > 4) {

              $compteur = 0;
              echo "</tr><tr>";

            }
            echo "<td>
    <div class='card shadow p-3 mx-auto btnShow' style='width: 18rem;'>
      <img class='card-img-top' src='" . $row['Image'] . "' alt='Card image cap'>
      <div class='card-body'>
        <h5 class='card-title'>" . $row['Nom'] . "</h5>
        <p class='card-text'>" . $row['Ingredients'] . "</p>
        <table>
          <tr>
            <td>
              <a   class='btn' onClick='ajouterAuPanier(".$row['Id'].");'>Ajouter au panier</a>
            </td>
            <td>
              <div class='hide'>
                <p class='prix-item'>" . $row['Prix'] . "$</p>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </td>
  ";
            $compteur++;
          }
          echo "</tr>";
          ?>

        </table>

      </div>

    </section>

    <!-- Breuvages -->
    <section class="row justify-content-center before-footer">
      <div class="col-auto">
        <h3 id="tableBreuvages">Nos Breuvages</h3>
        <table class="table" id="tableMesBreuvages">

        <?php
          include_once ("sql.php");
          //La requête SQL
          $sql = "SELECT * FROM menu WHERE Type = 'Breuvages'";
          //Recherche des données
          $sth = $dbh->query($sql);
          // On voudrait les résultats sous la forme d’un tableau associatif
          $result = $sth->fetchAll(PDO::FETCH_ASSOC);
          //Affichage des résultats
          
          $compteur = 1;

          echo "<tr>";
          foreach ($result as $row) {
            if ($compteur > 4) {

              $compteur = 0;
              echo "</tr><tr>";

            }
            echo "<td>
    <div class='card shadow p-3 mx-auto btnShow' style='width: 18rem;'>
      <img class='card-img-top' src='" . $row['Image'] . "' alt='Card image cap'>
      <div class='card-body'>
        <h5 class='card-title'>" . $row['Nom'] . "</h5>
        <p class='card-text'>" . $row['Ingredients'] . "</p>
        <table>
          <tr>
            <td>
              <a class='btn' onClick='ajouterAuPanier(".$row['Id'].");'>Ajouter au panier</a>
            </td>
            <td>
              <div class='hide'>
                <p class='prix-item'>" . $row['Prix'] . "$</p>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </td>
  ";
            $compteur++;
          }
          echo "</tr>";
          $dbh=null;
          ?>
        </table>
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