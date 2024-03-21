const mesBoutons = document.querySelector('div.tab');
const mesCommandes = document.querySelector('section.content');
let historique = [];

window.onload = onLoadTrigger();

function onLoadTrigger() {
  console.log("log");
  getHistoriqueJSON().then(
    displayHistorique());
}

function getHistoriqueJSON() {
  fetch('./datajson/historique.json')
    .then(res => res.json())
    .then(data => {
      historique = data;
      let currentHistorique = sessionStorage.getItem("historique");
      if (currentHistorique) {
        if (currentHistorique.length > 0) {
          console.log("historique get pre parse"+currentHistorique);
          currentHistorique = JSON.parse(currentHistorique);
          historique += currentHistorique;
        }
      }
      
      enregistrerHistorique();
    });
}

function enregistrerHistorique() {
  sessionStorage.setItem("historique", JSON.stringify(historique));
}

function displayHistorique() {
  let currentHistorique = sessionStorage.getItem("historique");
  if (currentHistorique) {
    if (currentHistorique.length > 0) {

      currentHistorique = JSON.parse(currentHistorique);
      console.log("parsed" +currentHistorique);
      historique = currentHistorique;
      let bouttonHTML = "";
      let historiqueHTML = "";

      let commandes = historique;

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
  } else {
    console.log("panier vide");
  }


}