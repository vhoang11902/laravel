<?php

namespace App\Http\Controllers;
use App\Category;
use App\Attribute;
use App\Product;
use App\product_attr;
use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){

        $product_id = $request ->productid_hidden;
        $quantity = $request -> qty;
        $product_info = DB::table('tbl_product')->where('product_id',$product_id)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = "0";
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        Cart::setGlobalTax(0);
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product) ;
    }
    public function delete_to_cart($rowId){
        Cart::remove($rowId);
        return Redirect::to('/show-cart');

    }
}
