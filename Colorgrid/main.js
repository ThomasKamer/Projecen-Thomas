var dataURL = "data.php";
var list = [];

function convertToJSON(response){
    return response.json(); //zet het om van rauwe data naar json
}

function processData(data){
    console.log(data); //testen of je data hebt ontvangen
   //laat zien wat je hebt ontvangen

   for(var i=0; i < data.length; i++){
        var divje = document.createElement("div");
        divje.innerHTML = "";
        
        index = Math.floor(Math.random() * data.length);
        divje.style.backgroundColor = data[index];
        document.getElementById("colorgrid").className= "flex-container";

        document.getElementById("colorgrid").appendChild(divje);

        divje.classList.add("mystyle");
        divje.innerHTML = ".";
        divje.addEventListener('click', event => {
            event.target.style.backgroundColor = "black";
        })
        
        

    }
    
}


fetch(dataURL) //haal de data op
.then(convertToJSON) 
.then(processData) 
.catch(function(err) {console.log('Fetch Error :-S', err)});







