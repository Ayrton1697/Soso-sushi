<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Http\Cart;
use Session;

class AddToCart extends Component
{

    public $item = [];
    public $price = 0;
    public $quantity = 1;

    public function mount($item){

        $this->item = $item;
        $this->price = $item['price'];
        // $this->quantity = $item['qty'];
    }
    public function oneMore(){
        $this->quantity++;
    }
    public function oneLess(){
        if($this->quantity > 0){
            $this->quantity--;
        }
        
    }
    public function addToCart(){
       if (is_numeric($this->quantity)){
           
        $id = $this->item['id'];
    
        $product= Product::find($id);
        
        //  session()->flush();

        $oldCart= Session::has('cart') ? Session::get('cart') : null;
        

        $cart= new Cart($oldCart);
        $cart->addWithQty($product, $product->id, $this->quantity);
        

        Session()->put('cart', $cart);

        $this->emit('agregado');
       }
   
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
