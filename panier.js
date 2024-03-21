
let panier = [];



function displayPanier() {
    let currentPanier = sessionStorage.getItem("panier");
    if (currentPanier) {
        if (currentPanier.length > 0) {
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
                        let prixT = 0;
                        currentPanier.forEach(e => {
                            if (p.id == e.id) {
                                qt += 1;


                                prixT += parseFloat(p.prix);
                            }
                        });


                        cp = 1;
                        let index = 0
                        currentPanier.forEach(e => {
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
function supprimer(itemId) {
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

function enregistrerPanier() {
    sessionStorage.setItem("panier", JSON.stringify(panier));
}

function supprimerToutPanier() {
    panier = [];
    sessionStorage.setItem("panier", "");
    location.reload();
    displayPanier();
}

function payer() {
    $('form > input').keyup(function () {

        var empty = false;
        $('form > input').each(function () {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#payer').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        } else {
            $('#payer').removeAttr('disabled');
            // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
            alert("payer");
        }

    });
}


window.onload = displayPanier();