<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function checkout(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.checkout.show_checkout')->with('category',$cate_product);
    }
    public function save_checkout(Request $request){
        $data = array();
        $data['shipping-firstname'] = $request->shipping_firstname;
        $data['shipping-lastname'] = $request->shipping_lastname;
        $data['shipping-address'] = $request->shipping_address;
        $data['shipping-state'] = $request->shipping_state;
        $data['shipping-city'] = $request->shipping_city;
        $data['shipping-postal'] = $request->shipping_postal;
        $data['shipping-phone'] = $request->shipping_phone;
        $data['shipping-email'] = $request->shipping_email;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);

        return Redirect::to('/payment');
    }
    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.checkout.show_payment')->with('category',$cate_product);
    }
}
