const fs = require('fs');
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

}