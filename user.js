const fs = require("fs");
function sauvegarde(JSONString, nomdefichier){ //pour sauvegarder les modifications dans le fichier user.json
    fs.writeFileSync(nomdefichier, JSONString);
}
function ajouteruser(user){  //ajoute un user dans le fichier user.json en utilisant sauvegarde()
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

let user= {"nom": "Alex"}; //test pour ajouter un user dans user.json
ajouteruser(user);