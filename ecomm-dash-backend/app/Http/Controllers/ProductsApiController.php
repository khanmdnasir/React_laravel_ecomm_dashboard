<?php

namespace App\Http\Controllers;

use App\Models\ProductApiModel;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    function addProduct(Request $req){
        $product=new ProductApiModel;
        $product->name=$req->input('name');
        $product->file_path=$req->file('file')->store('products');
        $product->description=$req->input('desc');
        $product->price=$req->input('price');
        $product->save();
        return $product;
    }

    function list(){
        return ProductApiModel::all();
    }
    function getProduct($id){
        return ProductApiModel::find($id);
    }

    function update(Request $req){

        return "hello";
    }
    function delete($id){
        $result=ProductApiModel::where('id',$id)->delete();
        if($result){
            return ['result'=>'Data has been deleted'];
        }else{
            return ['result'=>'Operation failled'];
        }
    }

    function search($key){
        return ProductApiModel::where('name','Like',"%$key%")->get();
    }
}
