<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacture = Manufacture::all();
        $products = Product::orderBy('id', 'DESC')->get();
        $protype = Protype::all();
        //return view('index',['data'=>$products]);
        return view('/admin/product')->with(compact('products'));
    }
    public function addproduct(Request $request)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $product = new Product;
            $product->name = $data['name'];
            //Upload image
            if($request->hasfile('image')){
                echo $img_tmp= $request->file('image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image = $filename;
                }
            }
            $product->price = $data['price'];
            $product->manu_id = $data['manu_id'];
            $product->type_id = $data['type_id'];
            $product->quantity = $data['quantity'];
            $product->description = $data['description'];
            $product->save();
            return redirect('/admin/add-product')->with('flash_message_success','Product has been added successfully!');
        }
        return view('admin.add-product');
    }

    public function editproduct(Request $request,$id=null)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                echo $img_tmp= $request->file('image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image = $filename;
                }
            }else{
                $filename = $data['current_image'];
            }
            if(empty($data['description'])){
                $data['description'];
            }
            Product::where(['id'=>$id])->update(['name'=>$data['name'],'image'=>$filename,'price'=>$data['price'],
            'manu_id'=>$data['manu_id'],'type_id'=>$data['type_id'],'quantity'=>$data['quantity'],'description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Product has been edit');
        }
        $productDetails = Product::where(['id'=>$id])->first();
        return view('admin.edit-product')->with(compact('productDetails'));
    }

    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Day la phuong thuc show " .$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "Day la phuong thuc edit " .$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "Day la phuong thuc update" .$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "Day la phuong thuc destroy " .$id;
    }
}
