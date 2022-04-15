let codeB;
let stateProd;

let sendEntry = document.getElementById("btnEntry");

let productos = document.getElementById("productsAll").value;
let productosParse = JSON.parse(productos);

const allCodes = productosParse.map(function (product) {
    return product.number;
});
console.log(allCodes);

sendEntry.addEventListener("click", () => {
    stateProd = document.getElementById("state-entry").value;
    codeB = document.getElementById("bar-code").value;
    if (allCodes.includes(codeB)) {
        let index = allCodes.indexOf(codeB);
        if (productosParse[index].status_service === 1) {
            $.ajax({
                url: "/admin/products/entry/store",
                method: "POST",
                data: {
                    products_id: productosParse[index].id,
                    detail_products: stateProd,
                    _token: $('input[name="_token"]').val(),
                },
            }).done(function (res) {
                console.log("hecho");
            }).catch(err => console.error(err));
        } else {
            console.log("Producto no disponible");
            alert("Producto no disponible");
        }
    } else {
        console.log("Producto no existente");
        alert("Producto no existente");
    }
});
