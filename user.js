// let usersData = JSON.parse(sessionStorage.getItem("usersData"));

// if (!usersData) {
//     fetch('datajson/user.json')
//         .then(response => response.json())
//         .then(data => {
//             usersData = data;
//             sessionStorage.setItem("usersData", JSON.stringify(usersData));
//             console.log('Loaded user data:', usersData);
//         })
//         .catch(error => {
//             console.error('Error loading user data:', error);
//         });
// }

// // fonction pour créer un compte
// function createAccount() {
//     const nom = document.getElementById("registerNom").value;
//     const courriel = document.getElementById("registerCourriel").value;
//     const motDePasse = document.getElementById("registerMotDePasse").value;

//     const existingUser = usersData.find(user => user.courriel === courriel);
//     if (existingUser) {
//         alert("Un compte avec cet email existe déjà.");
//         return;
//     }

//     const newUser = { nom, courriel, motDePasse };

//     usersData.push(newUser);

//     sessionStorage.setItem("usersData", JSON.stringify(usersData));

//     alert("Compte créé avec succès. Veuillez vous connecter maintenant.");
//     window.location.href = "connexion.php"; 
// }

// function seConnecter() {
//     const courriel = document.getElementById("courrielSignIn").value;
//     const motDePasse = document.getElementById("motDePasseSignIn").value;

//     const usersData = JSON.parse(sessionStorage.getItem("usersData"));

//     const user = usersData.find(user => user.courriel === courriel && user.motDePasse === motDePasse);

//     if (user) {
//         sessionStorage.setItem("userNom", user.nom);

//         alert("Connexion réussie!");
//         window.location.href = "menu.php";
//     } else {
//         alert("Courriel ou mot de passe invalide!");
//     }
// }

// Function to sign in
function seConnecter() {
    const courriel = document.getElementById("courrielSignIn").value;
    const motDePasse = document.getElementById("motDePasseSignIn").value;

    fetch('authenticateUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ Courriel: courriel, MotDePasse: motDePasse })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response from server:', data);
        if (data.authenticated) {
            alert("Connexion réussie!");
            window.location.href = "menu.php";
        } else {
            alert("Courriel ou mot de passe invalide!");
        }
    })
    .catch(error => {
        console.error('Error authenticating user:', error);
        alert("Une erreur est survenue lors de l'authentification.");
    });
}
