@extends('layouts.layout')

@section('content')
<section class="section-cart">
       dd(session('info')['nombre'])
       dd(($cart))
        @if(isset($cart) && count($cart->items) >= 0 )
            <h2 class="heading--secondary">Ingresa tus datos de envío</h2>
        @endif 
        <div class="cart">
        <!-- count($cart['items']) -->
                @if(isset($cart) && count($cart->items) >= 0 )
    
                    <form  onsubmit="event.preventDefault();" method="post" class="contacto__form">
                        @csrf

                            <input class="contacto__input" id="nombre" type="text" name="name" placeholder="Nombre">
                            <input class="contacto__input" id="ciudad" type="text" name="city" placeholder="Ciudad">
                            <input class="contacto__input" id="direccion" type="text" name="address" placeholder="Direccion">
                            
                            <label for="payment" class="heading--primary">Metodo de pago</label>
                            <select name="payment" id="pago" class="contacto__input" style="background:black">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Mercado Pago">Mercado Pago</option>
                
                            </select>
                            
        
                    
                        <a class="send__pedido" id="btn--send" onclick="event.preventDefault(); sendPedido()" target="_blank" href="https://wa.me/541126396961?text= 

                            Hola! Me gustaria realizar el siguiente pedido:%0A%09
                
                            <?php foreach ($cart->items as $item): ?>
                                %0A	&#x25cf; {{ $item['item']['name']. ' x ' .$item['qty']. ' = $ '.$item['price']}}%0A%0A
                            <?php  endforeach; ?>

                            %0a  Total: $ {{$cart->totalPrice}}
                            " 
                                href="javascript">Enviar pedido
                            </a> 
                            <h2 id="mensajeError" class="error-msg"></h2>
                        </form>
                @else
                     <h2 class="heading--secondary">Agrega productos al carrito para continuar</h2>
                @endif
         
        </div>
  
    </section>

@endsection
  <!-- Remember to include jQuery :) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- <script>
// function enviarPedido(){
//     nombre = $('#nombre');
//     console.log(nombre.val())
//     boton = $('#btn-pedido')


// $.ajax({
//     url:'http://localhost/Soso-Sushi/soso/public/enviar-info',
//            method:'post',
//            cache:false,
//            data: {nombre:nombre},
//            success:function(response){
//                location.reload();
//            },
//            error: function (request, status, error) {
//             console.log(request.responseText);
//         }
//        });


// }

$('#nombre').on('keyup', function() {
    console.log('hola')
    value = $(this).val()
    console.log(value)
});
$('#nombre').keyup(function() {
  value = $(this).val()
  console.log(value)
});
nombre = $('#nombre').val();
// USAR INPUT CON UN ONCHANGE EVENT PARA IR ACTUALIZANDO EL VALOR DE NOMBRE Y EL RESTO DE LOS CAMPOS
function sendPedido(){ 
    console.log(nombre).val();
    window.location.href = 'https://wa.me/541126396961?text= Hola! Me gustaria realizar el siguiente pedido:%0A%09'+ nombre;
            }
</script> -->