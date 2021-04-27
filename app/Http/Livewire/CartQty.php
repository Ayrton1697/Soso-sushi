<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Http\Cart;
use Session;

class CartQty extends Component
{
    public $quantity = 13;
    protected $listeners = ['agregado'=> 'updateQty'];

    // {{ Session::get('cart')->totalQty}}
    public function mount(){

       $cart = Session::get('cart');

        if(isset($cart)){
            $this->quantity = Session::get('cart')->totalQty;
        }else{
            $this->quantity = 0;
        }
       
    }
    public function updateQty(){
        $this->mount();

    }
    public function render()
    {
        return view('livewire.cart-qty');
    }
}
