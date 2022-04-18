<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;

class Controllers extends Controller
{
    function index(){
        $manufacture = Manufacture::all();
        $products = Product::all();
        $protype = Protype::all();
        return view('index',['data'=>$products]);
    }
    public function insertform(){
        return view('insert');
    }
}
