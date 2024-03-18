let users = [];

fetch('datajson/user.json')
  .then(response => response.json())
  .then(data => {
    users = data;
    console.log('Fetched data:', users);
  })
  .catch(error => {
    console.error('Error fetching users data:', error);
  });

  function seConnecter() {
    const courriel = document.getElementById("courrielSignIn").value;
    const motDePasse = document.getElementById("motDePasseSignIn").value;


    const user = users.find(user => {
        return (user.courriel === courriel || user.motDePasse === courriel) && user.password === motDePasse;
    });

    if (user) {
        alert("Connexion réussie!");
    } else {
        alert("Courriel ou mot de passe invalide!");
    }
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

