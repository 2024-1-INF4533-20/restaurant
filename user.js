<<<<<<< Updated upstream
// let users = [];
=======
let usersData = [];

fetch('datajson/user.json')
    .then(response => response.json())
    .then(data => {
        // Store loaded user data in the usersData array
        usersData = data;
        sessionStorage.setItem("usersData", JSON.stringify(usersData));
        console.log('Loaded user data:', usersData);
    })
    .catch(error => {
        console.error('Error loading user data:', error);
    });

>>>>>>> Stashed changes

// fetch('datajson/user.json')
//   .then(response => response.json())
//   .then(data => {
//     users = data;
//     console.log('Fetched data:', users);
//   })
//   .catch(error => {
//     console.error('Error fetching users data:', error);
//   });

// Fonction pour créer un compte utilisateur
function createAccount() {
    // Récupérer les valeurs des champs nom, courriel et mot de passe
    const nom = document.getElementById("registerNom").value;
    const courriel = document.getElementById("registerCourriel").value;
    const motDePasse = document.getElementById("registerMotDePasse").value;

    let usersData = JSON.parse(sessionStorage.getItem("usersData")) || [];

    // Vérifier si un utilisateur avec le même courriel existe déjà
    const existingUser = usersData.find(user => user.courriel === courriel);
    if (existingUser) {
        alert("Un compte avec cet email existe déjà.");
        return;
    }

    const newUser = { nom, courriel, motDePasse };

    usersData.push(newUser);

    sessionStorage.setItem("usersData", JSON.stringify(usersData));

    alert("Compte créé avec succès. Veuillez vous connecter maintenant.");
    window.location.href = "connexion.html"; 
}

function seConnecter() {
    const courriel = document.getElementById("courrielSignIn").value;
    const motDePasse = document.getElementById("motDePasseSignIn").value;

    const usersData = JSON.parse(sessionStorage.getItem("usersData")) || [];

    const user = usersData.find(user => user.courriel === courriel && user.motDePasse === motDePasse);

    if (user) {
        sessionStorage.setItem("userCourriel", user.courriel);
        sessionStorage.setItem("userNom", user.nom);

        alert("Connexion réussie!");
        window.location.href = "menu.html";
    } else {
        alert("Courriel ou mot de passe invalide!");
    }
}

















    



