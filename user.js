function sauvegarde(JSONString, nomdefichier){
    fs.writeFileSync(nomdefichier, JSONString);
}
function ajouteruser(user){
    fs.readFile("user.json", (error, data) => {
        if(error){
            console.error(error);
            throw err;
        }
        let users = JSON.parse(data);
        users.user.push(user);
        sauvegarde(JSON.stringify(users), "user.json");
        console.log(users);
    })
}

let user= {"nom": "ALex"};
ajouteruser(user);