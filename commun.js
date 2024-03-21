function displayUserNom() {
    const userNom = sessionStorage.getItem("userNom");
    if (userNom) {
        document.getElementById("userDisplayName").textContent = "Bonjour, " + userNom;
        document.getElementById("userDisplayName").style.display = "inline";
        document.getElementById("connexionTab").style.display = "none"; 

        const logoutLink = document.createElement("a");
        logoutLink.textContent = "Se déconnecter";
        logoutLink.href = "#";
        logoutLink.onclick = logout;
        document.getElementById("userDisplayName").appendChild(logoutLink);
    }
}

function logout() {
    sessionStorage.removeItem("userCourriel");
    sessionStorage.removeItem("userNom");

    window.location.href = "connexion.html";
}

window.onload = function() {
    displayUserNom(); 
};