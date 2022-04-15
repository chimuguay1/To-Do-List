let employee;
let place;
let codeP;
let stat;
let datePDF;
let fleg = [];
let charge = document.getElementById("carga");
let send = document.getElementById("enviosalida");
let generatePDF = document.getElementById("btnPDF");

var productos = document.getElementById("productsAll").value;
var productosParse = JSON.parse(productos);
const allCodes = productosParse.map(function (product) {
    return product.number;
});
console.log(allCodes);

//Obtiene los datos de cliente y lugar de destino
charge.addEventListener("click", () => {
    employee = document.getElementById("client-name").value;
    place = document.getElementById("place-to-go").value;
});

//Obtiene datos del producto
send.addEventListener("click", () => {
    stat = document.getElementById("product-state").value;
    codeP = document.getElementById("code-product-charged").value;
    //Verifica si el producto existe
    if (allCodes.includes(codeP)) {
        let index = allCodes.indexOf(codeP);
        //Verifica si el producto esta disponible
        if(productosParse[index].status_service === 0 && fleg.includes(productosParse[index].id)==false){
            //Hace el metodo post mediante ajax
            $.ajax({
                url: '/admin/products/exit/store',
                method: 'POST',
                data: {
                        products_id : productosParse[index].id,
                        status_products : stat,
                        place : place,
                        name_employee: employee,
                        _token: $('input[name="_token"]').val()
                    }
            }).done(function(res){
                fleg.push(productosParse[index].id)
                console.log("hecho")
            })
        }else{
            console.log("Producto no disponible");
            alert("Producto no disponible")
        }
    } else {
        console.log("Producto no existente");
        alert("Producto no existente")
    }
});
