var nombreVal;
var ciudadVal;
var direccionVal;
var pagoVal = 'Efectivo';

$('#nombre').on('keyup', function() {
    nombreVal = $(this).val()
    console.log(nombreVal)
});
$('#ciudad').on('keyup', function() {
    ciudadVal = $(this).val()
    console.log(ciudadVal)
});
$('#direccion').on('keyup', function() {
    direccionVal = $(this).val()
    console.log(direccionVal)
});
$('#pago').on('change', function() {
    pagoVal = $(this).val()
    console.log(pagoVal)
});

pedido = $('#btn--send').attr('href');
console.log(pedido)

// USAR INPUT CON UN ONCHANGE EVENT PARA IR ACTUALIZANDO EL VALOR DE NOMBRE Y EL RESTO DE LOS CAMPOS
// function sendPedido(){ 
//     console.log(nombre)
//     console.log(direccion)
//     console.log(ciudad)
//     window.location.href = pedido +
//                 'Nombre: '+ nombre + '%0A%09' +
//                 'Ciudad: '+ ciudad + '%0A%09' +
//                 'Direccion: '+ direccion + '%0A%09'
//             }

function sendPedido(){ 
    console.log(nombre)
    console.log(direccion)
    console.log(ciudad)
    if(nombreVal == undefined || ciudadVal  == undefined || direccionVal == undefined){
        console.log('Debes introducir tus datos para enviar el pedido!')
        errorText = 'Debes introducir tus datos para enviar el pedido!'
        mensajeError = $('#mensajeError');
        mensajeError.text(errorText);
        return;
    }
    window.open(pedido + '%0A%09' + '%0a' +
                'Nombre: '+ nombreVal + '%0A' +
                'Ciudad: '+ ciudadVal + '%0A' +
                'Direccion: '+ direccionVal + '%0A' +
                'Método de pago: '+ pagoVal + '%0A', '_blank');
            }
            //26396961