var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "pizza_info"
});

let monMenu = "menu";

const mesPizza = document.querySelector('table#tableMesPizza');
var compteur = 1;
con.connect(function(err) {
    if (err) throw err;
    con.query(`SELECT * FROM ${monMenu} ORDER BY id`, function (err, data, fields) {
      if (err) throw err;
      let pizzas = data.filter(produit => produit.type == "Pizza");
      var row = mesPizza.insertRow(0);
      pizzas.forEach(p => {
        if(compteur>4)
        {
          
          compteur = 0;
          row = mesPizza.insertRow(-1);
          
        } 
          var mycell = row.insertCell(-1);
          mycell.innerHTML =`
        <td>
          <div class="card shadow p-3 mx-auto btnShow" style="width: 18rem;">
            <img class="card-img-top" src="${p.image}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">${p.nom}</h5>
              <p class="card-text">${p.ingredients}</p>
              <table>
                <tr>
                  <td>
                    <a href="#" class="btn" onClick="ajouterAuPanier(${p.id});" >Ajouter au panier</a>
                  </td>
                  <td>
                    <div class="hide">
                      <p class="prix-item">${p.prix}$</p>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </td>                      
        `;
        compteur++;
        }
        
      );

    });
  });

    

