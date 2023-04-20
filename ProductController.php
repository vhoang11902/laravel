<?php

namespace App\Http\Controllers;
use App\Category;
use App\Attribute;
use App\Product;
use App\product_attr;
use App\Size_attr;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
session_start();
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate = Category::all();
//        $attr = Attribute::all();
        return view('admin.add_product',compact('cate'));

    }

    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->orderby('tbl_product.product_id','desc')->paginate(5);
        $manager_product  = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
        $this->AuthLogin();
//        $data = array();
//        $data['product_name'] = $request->product_name;
//        $data['product_price'] = $request->product_price;
//        $data['product_desc'] = $request->product_desc;
//        $data['product_content'] = $request->product_content;
//        $data['category_id'] = $request->product_cate;
//        $data['product_status'] = $request->product_status;
//        $data['product_image'] = $request->product_status;
//        $data['product_size'] = $request->product_size;

        $data = $request -> all();
        $product = new Product();
        $product -> product_name = $data['product_name'];
        $product -> product_price = $data['product_price'];
        $product -> product_desc = $data['product_desc'];
        $product -> product_content = $data['product_content'];
        $product -> category_id = $data['product_cate'];
        $product -> product_status = $data['product_status'];
        $product -> product_image = $data['product_status'];
        $product -> product_sku = $data['product_sku'];
        $get_image = $request->file('product_image');

//        foreach ($request -> id_attr as $value)
//        {
//            $attr_product = new ProductAttr();
//            $attr_product -> product_id = $product['product_name'];
//            $attr_product -> attr_id = $value;
//            $attr_product -> save();
//        }
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $product -> product_image = $new_image;
            $product -> save();
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function add_product_attr($product_id){
        $this->AuthLogin();
        $product_attr = product_attr::all();
        $pro_id=$product_id;
        $timber = Attribute::where('attr_name','timber')->get();
        $size = Attribute::where('attr_name','size')->get();
        return view('admin.product_attr',compact('timber','size','pro_id','product_attr'));
    }

    public function save_product_attr(Request $request,$product_id){
        $this->AuthLogin();
//        dd($request->all());
        $pro_attr = new product_attr();
        $pro_attr->product_id = $product_id;
        $pro_attr->price_attr = $request['price'];
        $pro_attr->storge_attr = $request['storge'];
         foreach($request -> timber_id as $value) {
             Attribute::where('attr_name','timber');
            $pro_attr->timber_id = $value;
        }
        foreach($request -> size_id as $value) {
            Attribute::where('attr_name','size');
            $pro_attr->size_id = $value;
        }
        $pro_attr->save();
        Session::put('message', 'Thêm thuộc tính sản phẩm thành công !!!');
         return Redirect() -> back();
    }
    public function delete_product_attr($id){
        $this->AuthLogin();
        DB::table('tbl_product_attr')->where('id',$id)->delete();
        Session::put('message','Xóa thuộc tính thành công');
        return Redirect() -> back();
    }

    //End Admin Page
    public function details_product($product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_product.product_id',$product_id)->get();
        foreach ($details_product as $key => $value){
            $product_id = $value ->product_id;
          $category_id=$value->category_id;
        }
        $product_attr = product_attr::where('product_id',$product_id)->get();
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();
        return view('pages.product.show_details')->with('category',$cate_product)->with('product_details',$details_product)->with('relate',$related_product)->with('product_attr',$product_attr);
    }
}
