<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;

use DB;

class Controllers extends Controller
{

    function index(){
        $manufacture = Manufacture::all();
        $products = Product::paginate(4);
        $protype = Protype::all();
        //return view('index',['data'=>$products]);
        return view('index')->with(compact('products'));
    }
    function get10Product(){
        $productsList = Product::orderBy('id', 'DESC')->get();
        return view('index')->with(compact('productsList'));
    }
    function addCart($id){

        //session()->flush('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else{
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'manu_id' => $product->manu_id,
                'type_id' => $product->type_id,
                'quantity' => 1,
                'description' => $product->description
            ];
        }
        session()->put('cart', $cart);
        //echo "<pre>";
        //print_r(session()->get('cart'));
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    function showCart(){
        //echo "<pre>";
        //print_r(session()->get('cart'));
        $carts = session()->get('cart');
        return view('cart',compact('carts'));
    }

    public function insertform(){
        return view('insert');
    }
}
