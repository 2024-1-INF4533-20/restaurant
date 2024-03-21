// let users = [];

// fetch('datajson/user.json')
//   .then(response => response.json())
//   .then(data => {
//     users = data;
//     console.log('Fetched data:', users);
//   })
//   .catch(error => {
//     console.error('Error fetching users data:', error);
//   });


function createAccount() {
    const nom = document.getElementById("registerNom").value;
    const courriel = document.getElementById("registerCourriel").value;
    const motDePasse = document.getElementById("registerMotDePasse").value;

    let usersData = JSON.parse(sessionStorage.getItem("usersData")) || [];

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

















    



