<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}

    <section class="section-cart">
        dd($cart)
    
        <h2 class="heading--secondary">Mi Carrito</h2>
        <div class="cart">
        <!-- count($cart['items']) -->
                @if(isset($cart) && count($cart['items']))
                    <table class="cart-table">
                    <tr>
                        <th>Item</th>
                        <th>Cant.</th>
                        <th>Precio</th>
                        <th>Eliminar</th>
                    </tr>
                        @foreach($cart['items'] as $item)
                            <tr>
                                <td>{{$item['item']['tipo']. ':' .$item['item']['name']}}</td>
                                    <td >
                                        <livewire:cart-update-form :item="$item" :key="$item['item']['id']"/>
                                    </td>
                                    <td>
                                        {{$item['price']}}
                                        
                                    </td>
                                    <td>
                                        <livewire:cart-delete :item="$item" :key="$item['item']['tipo'].$item['item']['name']"/>
                                    </td>
                            </tr>
                        @endforeach
                        </table>
                @else
                     <h2 class="heading--secondary">No hay articulos en el carrito</h2>
                @endif
         
        </div>
        @if (isset($cart) && count($cart['items']))              
                    <a class="send__pedido" target="_blank" href="https://wa.me/541126396961?text= 

                        Hola! Me gustaria realizar el siguiente pedido:%0A%09
                        
                        <?php foreach ($cart['items'] as $item): ?>
                            %0A	&#x25cf; {{ $item['item']['name']. ' x ' .$item['qty']. ' = $ '.$item['price']}}%0A%0A
                        <?php  endforeach; ?>
                        
                        %0a  Total: $ {{$cart['totalPrice']}}
                        " 
                            >Hacer pedido
                    </a>     

        @endif
    </section>

</div>
