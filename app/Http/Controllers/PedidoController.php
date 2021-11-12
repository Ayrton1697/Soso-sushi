<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function enviarInfo(Request $request){
        //validar info Request $InfoRequest

        //redireccionar a checkout
        $nombre = $request->input('name');
        $ciudad = $request->input('city');
        $direccion = $request->input('address');
        
        $pedido = [
            'nombre'=>$nombre,
            'ciudad'=>$ciudad,
            'direccion'=>$direccion
        ]; 

        $request->session()->put('info', $pedido);

        return redirect()->route('carrito');
                  
    }
}
//1126396961