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
    public function insertform(){
        return view('insert');
    }
}
