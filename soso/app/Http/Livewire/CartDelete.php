<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Http\Cart;
use Session;

class CartDelete extends Component
{
    public $item = [];

    public function mount($item){
        $this->item = $item;
    }

    public function delete(){
      
        $id= $this->item['item']['id'];
        
        $product= Product::find($id);
        $oldCart= Session::has('cart') ? Session::get('cart') : null;

        $cart= new Cart($oldCart);
        $cart->delete($product, $id);

        Session()->put('cart', $cart);

        $this->emit('deleted');
        $this->emit('agregado');
    }

    public function render()
    {
        return view('livewire.cart-delete');
    }
}
