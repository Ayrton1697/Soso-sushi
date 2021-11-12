<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Cart;
use Session;

class ProductController extends Controller
{
    public function getProducts(){

        $productos= Product::All();

        // foreach($productos as $products){
        //     echo $products;
        //     echo "</br>";
        //     echo "\n";
        // }
    
        
     return view('pedidos', ['productos' => $productos]);

    }

    public function getProductos($id){

        $productos = Product::where('tipo', $id)
                                ->whereNull('stock')
                                ->Where('tipo', '!=', 'pastas')
                                ->orderBy('name')->get();
                                // ->paginate(16);
                                //->get();

        return view('productos', ['productos' => $productos]);

    }

    public function masProductos($id){

        $data=  Product::where('tipo', $id)->paginate(10);
        return response()->json($data);
        return view('productos', ['productos' => $data]);
     }

    public function addtoCart(Request $request, $id){

        $product= Product::find($id);

        // session()->flush();

        $oldCart= Session::has('cart') ? Session::get('cart') : null;
        

        $cart= new Cart($oldCart);
        $cart->add($product, $product->id);
        
        

        $request->session()->put('cart', $cart);
        return back();

    }
    
    public function addWithQty(Request $request){

        $id = $request->input('id');
        $qty= $request->input('qty');

        $product= Product::find($id);
        
        //  session()->flush();



        $oldCart= Session::has('cart') ? Session::get('cart') : null;
        

        $cart= new Cart($oldCart);
        $cart->addWithQty($product, $product->id, $qty);
        

        $request->session()->put('cart', $cart);
       
        
        return back();

    }

    public function addWithQtyPOST(Request $request){

        $id= $request->input('id');
        $qty= $request->input('qty');
        $product= Product::find($id);
        
        $oldCart= Session::has('cart') ? Session::get('cart') : null;
        

        $cart= new Cart($oldCart);
        $cart->addWithQty($product, $product->id, $qty);
        
        

        $request->session()->put('cart', $cart);
        return back();
    }


    public function search(Request $request){

        $request->validate([
            'search'=> 'required' 

        ]);

        $name= $request->input('search');

        $productos= Product::where('name','like','%'.$name.'%')
                            ->orWhere('tipo', 'like','%'.$name.'%')
                            ->orderBy('name')->get();
                            // ->paginate(16);
        


        return view('pedidos',['products'=>$productos]);

    }


    public function delete(Request $request, $id){

        $product= Product::find($id);
        $oldCart= Session::has('cart') ? Session::get('cart') : null;

        $cart= new Cart($oldCart);
        $cart->delete($product, $product->id);

        $request->session()->put('cart', $cart);
        return back();
    }

    public function cart(){
        
        $oldCart= Session::get('cart');

        $cart = new Cart($oldCart);    
        //  dd(Session::get('cart'));

        return view('carrito',['products'=> $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
