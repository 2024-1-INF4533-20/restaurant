<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Info</title>
  <link rel="icon" type="image/x-icon" href="/Images/logo.ico">
  <link rel="stylesheet" href="CSS/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/styleshistoriques.css">
   

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
    <section class="row justify-content-center"><!--Section de la liste de l'historique des commandes-->
      <table id="monHistorique">
        <tr>
          <td style="width: 30%; margin-left: 150px;">
            <div class="tab" style="overflow-y:auto; max-height: 300px;">
              <!--bouttons sur le côté-->
              <?php
              include_once ("sql.php");
              //La requête SQL
              $sql = "SELECT * FROM historique";
              //Recherche des données
              $sth = $dbh->query($sql);
              // On voudrait les résultats sous la forme d’un tableau associatif
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              //Affichage des résultats
              foreach ($result as $row) {
                echo "<button class='tablinks' onclick='commandee(event, ". $row['Id'] .")'>Commande ". $row['Id'] ."</button>";
              }
              ?>
            </div>
          </td>

          <td style="overflow-y:auto; max-height: 300px;">
            <section class="content">
              <!--infos des commandes-->
              <?php
              include_once ("sql.php");
              //La requête SQL
              $sql = "SELECT * FROM historique";
              //Recherche des données
              $sth = $dbh->query($sql);
              // On voudrait les résultats sous la forme d’un tableau associatif
              $result = $sth->fetchAll(PDO::FETCH_ASSOC);
              //Affichage des résultats
              foreach ($result as $row) {
                $mesItems = "";
                $commande = json_decode($row['Commande'],true);
                foreach ($commande as $item) {
                  $sqlItem = "SELECT Nom FROM menu WHERE Id = '".$item['id']."'";
                  $sthItem = $dbh->query($sqlItem);
                  $resultItem = $sthItem->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($resultItem as $rItem) {
                    $mesItems .= $rItem['Nom'] . " x" . $item['qte'] . ", <br>";
                  }
                }

                echo "<div id='" . $row['Id'] . "' class='tabcontent'><h3>Commande " . $row['Id'] . "</h3>
            <p>Commande au nom de " . $row['Nom_User'] . "
            <br>
            " . $mesItems . "
            Prix total de la commande (taxes incluses) : " . $row['Prix'] . "
            <br>" . $row['Date'] . "
            <br> Adresse : " . $row['Adresse'] . "
            </p>
            </div>";
              }
              $dbh = null;
              ?>
              <script>
                //ceci rend les commandes invisibles jusqu'à ce qu'une commande soit sélectionnée
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
              </script>
            </section>
          </td>
        </tr>
      </table>



      <script> /*Fonction qui permet d'afficher toutes les commandes et d'afficher la description d'une seule commande à la fois */
        function commandee(evt, commandenom) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(commandenom).style.display = "block";
          evt.currentTarget.className += " active";
        }

      </script>

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