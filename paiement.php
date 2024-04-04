<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Info</title>
  <link rel="icon" type="image/x-icon" href="/Images/logo.ico">
  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="CSS/stylespaiement.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
  <script type="text/javascript" src="panier.js"></script>
  <script type="text/javascript" src="historique.js"></script>
</head>

<body onLoad='displayPanier()'>
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
    <section class="before-footer">
      <h1 id="paiementh1">Paiement de votre commande</h1>
      <h2 id="prixTotal"></h2>
      <form id="paiementform">
        <div class="contain">
          <div> <!--Information de paiement (carte)-->
            <label class="paiementlab" for="fname">*Prénom:</label>
            <input type="text" id="fname" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="lname">*Nom:</label>
            <input type="text" id="lname" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="numb">*Numéro de carte:</label>
            <input type="text" id="numb" maxlength="16" required placeholder="xxxx-xxxx-xxxx-xxxx" onkeyup="success()"><br><br>
            <label class="paiementlab" for="exp">*Date d'expiration:</label>
            <input type="month" id="exp" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="codesec">*Code de sécurité:</label>
            <input type="text" id="codesec" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="check">Enregistrer la
              carte?</label><!--Checkbox pour enregistrer carte pour le prochain paiement-->
            <input type="checkbox" id="check"><br><br>
          </div>

          <div> <!--Information de livraison-->
            <label class="paiementlab" for="numporte">*Adresse postale:</label>
            <input type="text" id="numporte" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="ville">*Ville:</label>
            <input type="text" id="ville" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="codepost">*Code postale:</label>
            <input type="text" id="codepost" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="province">*Province:</label>
            <select name="province" id="province" required onkeyup="success()">
              <option value="" label="Choisir une province"></option>
              <option value="Alberta">Alberta</option>
              <option value="Colombie Britannique">Colombie Britannique</option>
              <option value="Île-du-Prince-Édouard">Île-du-Prince-Édouard</option>
              <option value="Manitoba">Manitoba</option>
              <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
              <option value="Nouvelle-Ecosse">Nouvelle-Écosse</option>
              <option value="Ontario">Ontario</option>
              <option value="Quebec" selected="selected">Québec</option>
              <option value="Saskatchewan">Saskatchewan</option>
              <option value="Terre-Neuve-et-Labrador">Terre-Neuve-et-Labrador</option>
            </select><br><br>
            <label class="paiementlab" for="pays">*Pays:</label>
            <select name="pays" id="pays" required onkeyup="success()">
              <option value="" label="Choisir un pays"></option>
              <option value="Canada" selected="selected">Canada</option>
            </select><br><br>
            <label class="paiementlab" for="numtel">*Numéro <br>de téléphone:</label>
            <input type="text" id="numtel" required onkeyup="success()"><br><br>
            <label class="paiementlab" for="check2">Enregistrer
              l'adresse?</label><!--Checkbox pour enregistrer adresse pour une prochaine livraison-->
            <input type="checkbox" id="check2"><br><br>
          </div>
          <input type="submit" id="payer" value="Payer" onclick="payerMonPanier()"
            disabled="disabled"><!-- à faire fonctionner plus tard -->
          <script>

            function success() {
              if (document.getElementById("fname").value == "" || document.getElementById("lname").value == "" || document.getElementById("numb").value == "" || document.getElementById("exp").value == "" || 
              document.getElementById("codesec").value == "" || document.getElementById("numporte").value == "" || document.getElementById("ville").value == "" || document.getElementById("codepost").value == ""
               || document.getElementById("province").value == "" || document.getElementById("pays").value == "" || document.getElementById("numtel").value == "") {
                document.getElementById('payer').disabled = true;
              } else {
                document.getElementById('payer').disabled = false;
              }
            }

            function payerMonPanier() {

              payer();
            }</script>
        </div>
      </form>
      <br>
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
   
  <script type="text/javascript" src="panier.js"></script>

</body>

</html>