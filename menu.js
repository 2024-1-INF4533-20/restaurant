const fs = require("fs");
fs.readFile("datajson/menu.json", (error, data) => {
    if(error){
        console.error(error);
        throw err;
    }
    let menu = JSON.parse(data);
    console.log(menu);
    console.log(menu[1].nom);
})


