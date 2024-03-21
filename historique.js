const mesBoutons = document.querySelector('div.tab');
const mesCommandes = document.querySelector('section.content');
let historique = JSON.parse(sessionStorage.getItem("historique"));

window.onload = onLoadTrigger();

function onLoadTrigger() {

  if (historique) {
    displayHistorique();
  }
}


if (!historique) {
  fetch('./datajson/historique.json')
    .then(res => res.json())
    .then(data => {
      //console.log(data);
      historique = data;
      enregistrerHistorique();
    });
}


function enregistrerHistorique() {
  sessionStorage.setItem("historique", JSON.stringify(historique));
  displayHistorique();
}

function displayHistorique() {
  let currentHistorique = sessionStorage.getItem("historique");
  currentHistorique = JSON.parse(currentHistorique);


  let bouttonHTML = "";
  let historiqueHTML = "";

  let commandes = currentHistorique;
  fetch('./datajson/menu.json')
    .then(res => res.json())
    .then(data => {
      let menu = data;
      commandes.forEach(p => {
        var mesItems = "";
        p.commande.forEach(i => {

          mesItems += `${menu.find(item => item.id == i.id).nom} x${i.qte}, `;
        });
        bouttonHTML += `<button class="tablinks" onclick="commandee(event, '${p.numeroCommande}')">Commande ${p.numeroCommande}</button>`;
        historiqueHTML += `<div id="${p.numeroCommande}" class="tabcontent"><h3>Commande ${p.numeroCommande}</h3>
                    <p>Commande au nom de ${p.nom}
                    <br>
                      ${mesItems}
                    <br>
                    Prix total de la commande (taxes incluses) : ${p.prix}
                    <br>${p.date}
                    <br> Adresse : ${p.adresse}
                    </p>
                    </div>`;

      });
      document.querySelector('div.tab').innerHTML = bouttonHTML;
      document.querySelector('section.content').innerHTML = historiqueHTML;
      //ceci rend les commandes invisibles jusqu'à ce qu'une commande soit sélectionnée
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

    });


}

function payer() {
  let currentHistorique = sessionStorage.getItem("historique");
  currentHistorique = JSON.parse(currentHistorique);
  let numeroCommande = currentHistorique.length + 1;
  let nom = document.getElementById("fname").value + " " + document.getElementById("lname").value

  let commande = []
  let prix = 1;
  let currentPanier = sessionStorage.getItem("panier");
  if (currentPanier) {
    if (currentPanier.length > 0) {
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
           currentPanier.forEach(e => { //boucle pour afficher chaque item du panier dans la page panier.html
              if (p.id == e.id && cp == 1) {
                commande.push({"id":e.id,"qte":qt})
                console.log(prixT);
                console.log(prix)
                cp++;
              }
            });
          })
        })
    }}


    let date = new Date();
    let adresse = document.getElementById("numporte").value + ", " + document.getElementById("ville").value

    let MaCommande = {
      "numeroCommande": numeroCommande,
      "nom": nom,
      "commande": commande,
      "prix":prix,
      "date": date,
      "adresse": adresse
    }
    console.log(MaCommande);
    //supprimerToutPanier()
    //window.location.assign("./historique.html");

  }


