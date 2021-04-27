<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    protected $listeners = ['cartUpdated'=> 'onCartUpdate',
                            'deleted' => 'onCartUpdate'];

    public function mount(){
        if(session('cart')){
            $this->cart = (array) session('cart');
        }else{
            $this->cart = null;
        }
      
    }
    
    public function onCartUpdate(){
        // $this->cart = (array) session('cart');;
        $this->mount();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
