<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items;
    public $totalQty= 0;
    public $totalPrice=0;

    public function __construct($oldCart){

        if($oldCart){

           
            $this->items= $oldCart->items;
            $this->totalQty= $oldCart->totalQty;
            $this->totalPrice= $oldCart->totalPrice;
           
        }

    }

    public function add($item, $id){

        $storedItem=[
            'qty'=> 0,
            'price'=>$item->price,
            'item'=>$item
        ];
        
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $storedItem= $this->items[$id];
                     }
            }
            
          
            //   unset($this->items);
            //    unset($storedItem);
            //    session_unset();
              //dd($this->items);
            //   dd($storedItem);

            $storedItem['qty']++;
            $storedItem['price']= $item->price *  $storedItem['qty'];
            $this->items[$id]= $storedItem;
            $this->totalQty++;
            $this->totalPrice+= $item->price;
    }

    public function addWithQty($item, $id, $qty){

        $storedItem=[
            'qty'=> 0,
            'price'=>$item->price,
            'item'=>$item
        ];
        
            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $storedItem= $this->items[$id];
                    // $this->totalPrice-= $item->price;
                     }
            }
            
           
            //   unset($this->items);
            //    unset($storedItem);
            //    session_unset();
              //dd($this->items);
            //   dd($storedItem);

            $storedItem['qty']=$qty;
            $storedItem['price']= $item->price *  $storedItem['qty'];
            $this->items[$id]= $storedItem;
           // $this->totalQty+=$storedItem['qty'];
           $this->totalQty=0;
            $this->totalPrice=0;
            foreach($this->items as $prod){
                $this->totalQty+=$prod['qty'];
                $this->totalPrice+= $prod['price'];
            }

           
            //$this->totalPrice+= $item->price;
    }

//     public function reduce($item , $id){

//         $storedItem=[
//             'qty'=> 0,
//             'price'=>$item->price,
//             'item'=>$item
//         ];

//         if($this->items){
//             if(array_key_exists($id, $this->items)){
//                 $storedItem= $this->items[$id];
//                  }
//         }
//         if($storedItem['qty'] > 1){

//             $storedItem['qty']--;
//             $storedItem['price']= $item->price *  $storedItem['qty'];
//             $this->items[$id]= $storedItem;
//             $this->totalQty--;
//             $this->totalPrice-= $item->price;
//         }
//         elseif($storedItem['qty']==1){

//             // $storedItem['qty']--;
//             // $storedItem['price']= $item->price *  $storedItem['qty'];

//             unset($this->items[$id]);
//              $this->totalQty--;
//              $this->totalPrice-= $item->price;
//         }

     
      
// }

    public function delete($item ,$id){

        $storedItem=[
            'qty'=> 0,
            'price'=>$item->price,
            'item'=>$item
        ];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem= $this->items[$id];
                 }
        }
        $this->totalPrice-= $this->items[$id]['price'];
        unset($this->items[$id]);
        $this->totalQty--;
    
    }
}
