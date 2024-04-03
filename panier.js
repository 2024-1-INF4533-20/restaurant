
let panier = []; //panier pour enregistrer localement



function displayPanier() { //affiche le panier dans la page panier.php
    let currentPanier = sessionStorage.getItem("panier");
    if (currentPanier) {
        if (currentPanier.length > 0) {
            let prixTOTAL = 0; //prix total de la commande
            currentPanier = JSON.parse(currentPanier);
            panier = currentPanier;
            let panierHTML = "";
            fetch('./datajson/menu.json') //va chercher les elements du menu dans menu.json
                .then(res => res.json())
                .then(data => {
                    let menu = data;
                    menu.forEach(p => {
                        let cp = 0; //compteur
                        let qt = 0; //quantité d'un item ajouté
                        let prixT = 0; //prix total pour x meme produit
                        currentPanier.forEach(e => { //modifie la quantite d'un item pour éviter d'afficher x fois le meme item dans le panier
                            if (p.id == e.id) {
                                qt += 1;


                                prixT += parseFloat(p.prix);
                            }
                        });


                        cp = 1;
                        let index = 0 //index pour enregistrer la position de e dans le tableau panier (utiliser dans supprimer())
                        currentPanier.forEach(e => { //boucle pour afficher chaque item du panier dans la page panier.php
                            if (p.id == e.id && cp == 1) {
                                panierHTML = `<tr>
                            <td>${e.nom}</td>
                            <td> ${qt} </td>
                            <td>${prixT.toFixed(2)}$</td>
                            <td><button type="button" onclick="supprimer(${index})"> - </button></td>
                            </tr>`;
                                if (document.getElementById("panierContenu")) {
                                    document.getElementById("panierContenu").innerHTML += panierHTML;
                                }
                                cp++;
                                prixTOTAL += prixT;
                            }
                            index++;

                           

                        });
                    })
                    if (document.getElementById("prixTotal")) {
                        let prixTOTALFixed = prixTOTAL.toFixed(2);
                        document.getElementById("prixTotal").innerHTML = "Le prix total de votre facture est de " + prixTOTALFixed + "$";
                    }
                })
        }
    } else {
        console.log("panier vide");
    }
    console.log(panier)

}

function ajouterAuPanier(itemId) { // Ajout un element au tableau quand on clique sur le bouton pour ajouter un plat
    fetch('./datajson/menu.json') // lire le fichier JSON menu.json
        .then(res => res.json())
        .then(data => {
            let menu = data;//menu obtient les données de data
            let monItem = menu.find(item => item.id == itemId) // cherche dans le menu un id équivalent au itemId
            panier.push(monItem);// ajoute au panier
            enregistrerPanier();//enregistre les changements

        });

}
function supprimer(itemId) { //enleve un element du tableau quand on clique sur le bouton supprimer de l'item
    if(panier.length>1){
        panier.splice((itemId), 1);
        enregistrerPanier();
        console.log(panier)
        location.reload()
    }
    else{
        supprimerToutPanier()
    }
    
}

function testAjoutTrigger(itemId) {
    alert("test ajout de l'item " + itemId);
}

function enregistrerPanier() { //enregistre le panier dans la variable locale de session
    sessionStorage.setItem("panier", JSON.stringify(panier));
}

function supprimerToutPanier() { //enleve tout les elements du panier
    panier = [];
    sessionStorage.removeItem("panier");
    location.reload();
    displayPanier();
}




window.onload = displayPanier();