<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Info</title>
    <link rel="icon" type="image/x-icon" href="/Images/logo.ico">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/styleConnection.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="user.js"></script>
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

    <div class="page"> <!--L'arrière-plan du div qui montre le contenu-->
        <div class="container" id="container"><!--div qui permet de créer le contenu-->
            <div class="form-container sign-up"><!--div qui permet de se créer un compte-->
                <form>
                    <h1>Créer un compte</h1>
                    <span>Utilisez votre courriel pour vous inscrire</span>
                    <input type="text" placeholder="Nom" id="registerNom">
                    <input type="email" placeholder="Courriel" id="registerCourriel">
                    <input type="password" placeholder="Mot de passe" id="registerMotDePasse">
                    <button onclick="createAccount()">S'inscrire</button>
                </form>
            </div>
            <div class="form-container sign-in"><!--div qui permet de se connecter lorsqu'on a déjà un compte-->
                <form>
                    <h1>Se connecter</h1>
                    <span>Utiliser votre courriel et mot de passe</span>
                    <input type="email" placeholder="Courriel" id="courrielSignIn">
                    <input type="password" placeholder="Mot de passe" id="motDePasseSignIn">
                    <a href="#">Mot de passe oublié?</a>
                    <button onclick="seConnecter()" id="signinBtn">Se connecter</button>
                </form>
            </div>
            <div class="toggle-container">
                <!--ce div permet de passer du côté de s'inscrire au côté de se connecter et vice-versa -->
                <div class="toggle">
                    <div class="toggle-panel toggle-left"><!--div qui est à gauche du div pour se connecter-->
                        <h1>Content de vous revoir!</h1>
                        <p>Entrez vos informations personnelles pour utiliser toutes les fonctionnalités du site</p>
                        <button class="hidden" id="login">Se connecter</button>
                    </div>
                    <div class="toggle-panel toggle-right"><!--div qui est à droite du div pour s'inscrire-->
                        <h1>Bonjour fan de pizza!</h1>
                        <p>Inscrivez-vous avec vos informations personnelles pour utiliser toutes les fonctionnalités du
                            site</p>
                        <button class="hidden" id="register">S'inscrire</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <ul class="bottomnav">
                <li><a href="">Commentaires</a></li>
                <li><a href="contact.php">À propos de nous</a></li>
                <li><a><img src="Images/logo-facebook.png" width="80" alt="facebook"></a></li>
                <li><a href="#top">Haut de la page</a></li>
            </ul>
        </footer>
    </div>
    <script type="module" src="connection.js"></script><!--script qui permet d'utiliser le code javascrypt de connection-->
</body>

</html>
