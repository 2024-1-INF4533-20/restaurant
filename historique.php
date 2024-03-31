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
  <script src="commun.js"></script>
  <script type="text/javascript" src="historique.js"></script>

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
      <li class="libr" id="connexionTab"><a href="connexion.php">Connexion</a></li>
      <li id="userDisplayName" style="display: none;"></li>
  </ul>
  </header>

  <div class="background backcomplet">
    <section class="row justify-content-center"><!--Section de la liste de l'historique des commandes-->
      <table id="monHistorique">
        <tr>
          <td style="width: 30%; margin-left: 150px;">
            <div class="tab">
              <!--bouttons sur le côté-->
            </div>
          </td>

          <td>
            <section class="content">
              <!--infos des commandes-->
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
  <script src="commun.js"></script>

</body>

</html>