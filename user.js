var fs = require("fs").promises;

function sauvegarde(JSONString, nomdefichier){ //pour sauvegarder les modifications dans le fichier user.json
    fs.writeFileSync(nomdefichier, JSONString);
}

function ajouteruser(){  //ajoute un user dans le fichier user.json en utilisant sauvegarde()
    const nom = document.getElementById("RegisterNom").value;
    console.log(nom);
    const courriel = document.getElementById("RegisterCourriel").value;
    const motDePasse = document.getElementById("RegistermotDePasse").value;
   
    

    let user = JSON.parse('{"name":"'+nom+'", "courriel":"'+courriel+'", "motDePasse":"'+motDePasse+'"}')


    fs.readFile("datajson/user.json", (error, data) => {
        if(error){
            console.error(error);
            throw err;
        }
        let users = JSON.parse(data);
        users.user.push(user);
        sauvegarde(JSON.stringify(users), "datajson/user.json");
        console.log(users);
    })


}

