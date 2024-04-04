
function displayHistorique() {
  
  //la page historique ne se refresh pas si on appelle pas cette fonction là... étrange mais ça fonctionne, alors on laisse ça comme tel
    console.log("je refresh des choses wow!");
}

function payer() {

  let currentPanier = sessionStorage.getItem("panier");
  let commande = []
  if (currentPanier) {
    if (currentPanier.length > 0) {
      let prixTOTAL = 0;
      currentPanier = JSON.parse(currentPanier);
      panier = currentPanier;
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
            currentPanier.forEach(e => { //boucle pour afficher chaque item du panier dans la page panier.php
              if (p.id == e.id && cp == 1) {
                commande.push({ "id": e.id, "qte": qt })
                prixTOTAL += prixT;
                cp++;
              }



            });
          })

          
          let nom = document.getElementById("fname").value + " " + document.getElementById("lname").value
          let prix = prixTOTAL.toFixed(2);

          let date = new Date();
          let adresse = document.getElementById("numporte").value + ", " + document.getElementById("ville").value
          
          let MaCommande = {
            "nom": nom,
            "commande": JSON.stringify(commande),
            "prix": prix,
            "date": date,
            "adresse": adresse
          }

          //appelle un script php qui met le panier dans la table historique de la BD
        fetch("panierToBD.php", {

            "method": "POST",
        
            "headers": {
                "Content-Type": "application/json; charsert=utf-8"
        
            },
        
        "body": JSON.stringify(MaCommande)
        
        }).then(function(response){
        
            return response.json();
        
        })
          supprimerToutPanier();
          displayHistorique(); //refresh "magiquement" la page historique
          window.location.assign("./historique.php"); //envoie le user vers la page historique
        })
    }
  }





}


