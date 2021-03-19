<div>
    {{-- The whole world belongs to you --}}

  
  
      	<div class="pedido-qty">
          <button wire:click="oneLess" type="button" class="change-qty less-qty">-</button>
            <input wire:model="quantity" type="number"  class="qty-input" min="1"  name="qty">
            <input type="hidden" name="id" value="{{$item->id}}">
          <button wire:click="oneMore" type="button" class="change-qty add-qty">+</button>
        </div>
        
          <button wire:click="addToCart"  class="btn--add">Agregar al carrito <span  class="modal-price">
          @if (is_numeric($quantity))
              ${{$price * $quantity}}
          @else
               0
          @endif
          </span></button>
  
  
</div>
