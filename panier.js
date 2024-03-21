const monPanier = document.getElementById("panierContenu");
let panier = [];



function displayPanier() {
    let currentPanier = sessionStorage.getItem("panier");
    if (currentPanier) {
        let prixTOTAL = 0;
        currentPanier = JSON.parse(currentPanier);
        // console.log(currentPanier)
        panier = currentPanier;
        let panierHTML = "";
        fetch('./datajson/menu.json')
            .then(res => res.json())
            .then(data => {
                let menu = data;
                menu.forEach(p => {
                    let cp = 0;
                    let qt = 0;
                    let  prixT = 0;
                    currentPanier.forEach(e => {
                        //console.log(e.nom);
                        if (p.id == e.id) {
                            qt += 1;
                            
                            
                            prixT += parseFloat(p.prix);
                            
                        }
                    });
                    cp = 1;
                    currentPanier.forEach(e => {
                        if (p.id == e.id && cp==1) {
                            
                            panierHTML = `<tr>
            <th>${e.id}</th>
            <td>${e.nom}</td>
            <td> ${qt} </td>
            <td>${prixT}$</td>
            <td><button type="button"> - </button></td>
          </tr>`;
                            console.log(panierHTML);
                            cp++;
                            prixTOTAL += prixT;
                        }
                    });
                })
                console.log("Le prix total de votre facture est de " + prixTOTAL);
            })
           
    } else {
        console.log("panier vide");
    }


}

function ajouterAuPanier(itemId) {
    fetch('./datajson/menu.json')
        .then(res => res.json())
        .then(data => {
            let menu = data;
            let monItem = menu.find(item => item.id == itemId)
            panier.push(monItem);
            console.log("nouveau panier " + panier)
            enregistrerPanier();

        });

}

function testAjoutTrigger(itemId) {
    alert("test ajout de l'item " + itemId);
}

function enregistrerPanier() {
    console.log("panier")
    sessionStorage.setItem("panier", JSON.stringify(panier)); //pas sûr que j'enregistre comme du monde... :(
    displayPanier()
}

function supprimerToutPanier() {
    panier = [];
    sessionStorage.setItem("panier", "");
}

window.onload = displayPanier;

/*const fs = require('fs');
const path = require('path');

//module.exports = Repas

const appDir = path.dirname(require.main.filename);

const p = path.join(appDir,'datajson','panier.json');

class Repas{
    constructor(id, type, nom, ingredients, prix){
        this.id=id;
        this.type=type;
        this.nom = nom;
        this.ingredients= ingredients;
        this.prix = prix;
    }

}

let listepanier = [];

listepanier.push();

function ajoutaupanier(ID,TYPE,NOM,INGREDIENTS,PRIX){
    let listepanier = [];
    const ree = new Repas(ID,TYPE,NOM,INGREDIENTS,PRIX);

    listepanier.push(ree);
}

function enleverunproduit(){

}*/
/*
const fs = require("fs");
function sauvegarde(JSONString, nomdefichier){ //pour sauvegarder les modifications dans le fichier user.json
    fs.writeFileSync(nomdefichier, JSONString);
}
function ajouterproduit(id){  //ajoute un user dans le fichier user.json en utilisant sauvegarde()
    alert("test");
    let monProduit = id;
    let produitTrouve ;
    fs.readFile("datajson/menu.json", (error, data) => {
        if(error){
            console.error(error);
            throw err;
        }
        let menu = JSON.parse(data);
        console.log(menu);
        produitTrouve = menu.find(produit => produit.id == monProduit);
        console.log(produitTrouve);
    })


    fs.readFile("datajson/panier.json", (error, data) => {
        if(error){
            console.error(error);
            throw err;
        }
        let paniers = JSON.parse(data);
        paniers.panier.push(produitTrouve);
        sauvegarde(JSON.stringify(paniers), "datajson/panier.json");
        console.log(paniers);
    })

}
*/
//test pour ajouter un user dans user.json
