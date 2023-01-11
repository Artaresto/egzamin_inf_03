const indi = () => {
    document.getElementById('prawy').style.backgroundColor = "Indigo";
}
const steel = () => {
    document.getElementById('prawy').style.backgroundColor = "Steelblue";
}
const oliv = () => {
    document.getElementById('prawy').style.backgroundColor = "Olive";
}
const kolor_czcionki = () => {
    let x = document.getElementById('lista').value;
    document.getElementById('prawy').style.color = x;
}
const rozmiar = () => {
    let x = document.getElementById('proc').value;
    document.getElementById('prawy').style.fontSize = x;
}
const border = () =>{
    if(document.getElementById('ramka').checked){
        document.getElementById('img').style.border = '1px solid white';
    }
    else{
        document.getElementById('img').style.border = 'none';
    }
}
const punktor = (rad) =>{
    let x = document.getElementById('lista1');
    if (rad == 'dysk'){
        x.style.listStyle = 'disc'
    } 
    if (rad == 'kwadrat'){
        x.style.listStyle = 'square'
    } 
    if (rad == 'okrąg'){
        x.style.listStyle = 'circle'
    } 
    
}