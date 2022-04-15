let checkb = document.getElementById("flexSwitchCheckDefault");
let show = document.getElementById("labelSubproducts");
let thereSubProd = false;
let contenido = document.getElementById("contenedor");
let newSub = document.getElementById("addSub");
let sendData = document.getElementById("sendData");
let arrS = [];
let arrSubSend = [];

checkb.addEventListener("click", ()=>{
    if(thereSubProd){
        show.setAttribute("class", "nShowL");
        thereSubProd = false
        contenido.innerHTML = "";
        arrSubSend = [];

    }else{
        show.setAttribute("class", "showL");
        thereSubProd =true
    }
})

function newS(){
    let clonado = document.querySelector('.labSub');
    let clon = clonado.cloneNode(true);
    contenido.appendChild(clon);
}

//update
sendData.addEventListener("click", ()=>{
    if(thereSubProd){
        arrS = document.getElementsByName('name_subproducts');
        for(x=0; x<arrS.length; x++){
            arrSubSend.push(arrS[x].value)
        }

        console.log(arrSubSend)
    }else{
        arrS = document.getElementsByName('name_subproducts');
        console.log(arrS)
    }
})