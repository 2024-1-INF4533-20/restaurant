const monPanier = document.getElementById("panierContenu");
let panier = [];



function displayPanier() {
    let currentPanier = sessionStorage.getItem("panier");
    if (currentPanier) {
        if (currentPanier.length>0) {          
        
        let prixTOTAL = 0;
        currentPanier = JSON.parse(currentPanier);
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
        }
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
            enregistrerPanier();

        });

}

function testAjoutTrigger(itemId) {
    alert("test ajout de l'item " + itemId);
}

function enregistrerPanier() {
    sessionStorage.setItem("panier", JSON.stringify(panier)); //pas sûr que j'enregistre comme du monde... :(
    displayPanier()
}

function supprimerToutPanier() {
    panier = [];
    sessionStorage.setItem("panier", "");
}

//TODO découvrir pourquoi le onload ne fonctionne pas 
window.onload = displayPanier();