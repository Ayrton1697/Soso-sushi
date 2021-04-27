<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Http\Cart;
use Session;

class CartUpdateForm extends Component
{

    public $item = [];
    public $quantity = 0;

    public function mount($item){
        $this->item = $item;
        $this->quantity = $item['qty'];
       
    }
    
    public function updateCart(){
        //dd($this->item);
        $id = $this->item['item']['id'];
    
        $product= Product::find($id);
        
        $oldCart= Session::has('cart') ? Session::get('cart') : null;
       
        $cart= new Cart($oldCart);
        $cart->add($product, $id, $this->quantity);
       
        Session()->put('cart', $cart);
        
        $this->emit('cartUpdated'); 
        $this->emit('agregado'); 
    }

    public function render()
    {
        return view('livewire.cart-update-form');
    }
}
