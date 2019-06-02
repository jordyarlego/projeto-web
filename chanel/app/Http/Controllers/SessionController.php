<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SessionController extends Controller
{

    public function checkout(Request $request){

        if(!$request->session()->has('cart')) return redirect()->back()->with('error', 'O seu carrinho esta vazio... Começe comprando algo!');
        if(!count($request->session()->get('cart')) >0 )  return redirect()->back()->with('error', 'O seu carrinho esta vazio... Começe comprando algo!');
        return view('checkout');
    }

    public function cart(Request $request){
        if(!$request->session()->has('cart')) $request->session()->put('cart', []);
        
        return view('shopping_cart');
    }

    public function addToCart(Request $request){  

        if(!$request->session()->has('cart')){
            if($request->quantity > $request->maxQuantity) return redirect()->back()->with('error', 'A quantidade é maior que temos em estoque.');

            $data = [];

            $cart = [
                'id'        =>      $request->id,
                'image'     =>      $request->image,
                'quantity'  =>      $request->quantity,
                'cost'      =>      $request->cost,
                'totalCost' =>      $request->cost*$request->quantity,
            ];

            array_push($data, $cart);
            $request->session()->put('cart', $data);

            return redirect()->back()->with('success', 'Novo item no carrinho! Uhuul');
        }

            if($request->quantity > $request->maxQuantity) return redirect()->back()->with('error', 'A quantidade é maior que temos em estoque.');

            $cart = $request->session()->get('cart');
            $find = false;
            for ($i=0; $i < count($cart); $i++) { 
                if($cart[$i]['id'] == $request->id){
                    if($cart[$i]['quantity'] >= $request->maxQuantity) return redirect()->back()->with('error', 'A quantidade é maior que temos em estoque.');
                    $find = true;
                    $cart[$i]['quantity'] += $request->quantity;
                    $cart[$i]['totalCost'] =  $cart[$i]['cost']*$cart[$i]['quantity'];
                }
            }
            if($find){
        $request->session()->put('cart', $cart);
            }else{
                $cart = [
                    'id'            =>      $request->id,
                    'image'         =>      $request->image,
                    'quantity'      =>      $request->quantity,
                    'cost'          =>      $request->cost,
                    'totalCost'     =>      $request->cost*$request->quantity,
                ];
                $request->session()->push('cart', $cart);
            }          
       

        return redirect()->back()->with('success', 'Carrinho atualizado. Continue as compras!');    
    }

    public function removeToCart(Request $request){
        if(!$request->session()->has('cart')) return redirect()->back()->with('error', 'O seu carrinho já esta vazio!');
       
        $cart = $request->session()->get('cart');

        if(count($cart) > 0){
            for ($i=0; $i < count($cart); $i++) { 
                if($cart[$i]['id'] == $request->id){
                    if($cart[$i]['quantity'] > 1){
                        $cart[$i]['quantity'] = $cart[$i]['quantity']-1;
                        $cart[$i]['totalCost'] = $cart[$i]['cost']*$cart[$i]['quantity'];
                    }else{
                        unset($cart[$i]);
                    }
                }
            }
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produto removido do carrinho!');
    }

    public function cleanAllCart(Request $request){

        if(!$request->session()->has('cart')) return redirect()->back()->with('error', 'O seu carrinho já esta vazio!');

        $request->session()->forget('products');
        $request->session()->forget('cart');

        return redirect()->back()->with('success', 'Carrinho limpo com sucesso!');
    }
}
