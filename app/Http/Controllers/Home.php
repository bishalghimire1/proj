<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ProductManagement;
use App\Models\Sticker;
class Home extends Controller
{
    public function index(){
        $category = ['Laptop','Desktop','TV','Fridge','Monitor','CPU'];
        $product = ProductManagement::all();
        $sticker = Sticker::all();
        // dd($product);
        return view('layouts.home',compact('category','product','sticker'));
    }

    public function getCategory($category){
        // dd($category);
        $product = DB::table('product_management')->where('category','=',$category)->get();
        // dd($product);
        $category = ['Laptop','Desktop','TV','Fridge','Monitor','CPU'];
        // $product = ProductManagement::all();
        $sticker = Sticker::all();
        return view('layouts.home',compact('product','sticker','category'));
    }

    public function showProductDetail($product_id){
        // dd($product_id);
        $category = ['Horror','Funny','Dark','Mello','Nature','CPU'];
        $sticker = Sticker::all();
        $product = DB::table('product_management')->where('id','=',$product_id)->get();
        return view('productmanagement.productDetail',compact('category','sticker','product'));
    }

    public function getStickerCategory($category){
        
    }
}
