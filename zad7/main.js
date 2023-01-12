const zdjecie = (zdj) =>{
    if (zdj == "lanza"){
        document.getElementById('zdj').src = "lanzarotte.jpg";
    } 
    else if (zdj == "chiny"){
        document.getElementById('zdj').src = "pekin.jpg";        
    } 
    else if (zdj == "seren"){
        document.getElementById('zdj').src = "serengeti.jpg";
    }    
    else if (zdj == "italia"){
        document.getElementById('zdj').src = "wenecja.jpg";
    }   
    else if (zdj == "indioch"){
        document.getElementById('zdj').src = "tajlandia.jpg";
    }   
}

function iconic(){
    const icon = document.querySelector("#icon");
    
    if  (icon.getAttribute("src") == "icon-off.png") {
        icon.setAttribute("src", "icon-on.png");
    }
    else if (icon.getAttribute("src") == "icon-on.png") {
        icon.setAttribute("src", "icon-off.png");
    }
}