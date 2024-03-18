const fs = require("fs");

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


    function ajouteruser2(){
        $.ajax({ 
            url: 'user.json', 
            type: 'POST', 
            data: {user},
            success: function(response) { 
              console.log('Data added successfully!'); 
            }, 
            error: function(error) { 
              console.log('Error: ' + error); 
            } 
          }); 
    }

    function saveJSONFile(filename, newUser,callback) {
        fetch(filename)
            .then(response => response.json())
            .then(data => callback(data))
            .catch(error => console.error('Error reading JSON file:', error));
    }

    ajouteruser();


     // Function to fetch and parse JSON file
     function readJSONFile(filename, callback) {
        fetch(filename)
            .then(response => response.json())
            .then(data => callback(data))
            .catch(error => console.error('Error reading JSON file:', error));
    }

    // Usage: Call the function with the file name and a callback to handle the data
    readJSONFile('datajson/user.json', function(data) {
        // Do something with the data
        console.log(data);

        // Example: Display the data in the HTML
        document.getElementById('output').innerText = JSON.stringify(data, null, 2);
    });

    

}

