<?php

namespace App\Http\Controllers;

use App\Category;
use App\Size_attr;
use Illuminate\Http\Request;
use App\Attribute;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;

class AttributeController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_attribute(){
        $this->AuthLogin();
        return view('admin.add_attribute');
    }
    public function all_attribute(){
        $this->AuthLogin();
        $all_attribute = DB::table('tbl_attribute')->get();
        $all_size_attr = DB::table('tbl_size_attr')->get();
        $manager_attribute = view('admin.all_attribute')->with('all_attribute',$all_attribute)->with('all_size_attr',$all_size_attr);
        return view('admin_layout')->with('admin.all_category_product',$manager_attribute);
    }
    public function save_attribute(Request $request){
        $this->AuthLogin();
        $data=$request->all();
        $attr = new Attribute();
        $attr -> attr_name = $data['attr_name'];
        $attr -> value = $data['value'];
        $attr->save();
        Session::put('message','Thêm thuộc tính sản phẩm thành công !!!');
        return Redirect::to('add-attribute');
    }
    public function edit_attribute($attr_id){
        $this->AuthLogin();
        $edit_attribute = DB::table('tbl_attribute')->where('id',$attr_id)->get();

        $manager_attribute  = view('admin.edit_attribute')->with('edit_attribute',$edit_attribute);

        return view('admin_layout')->with('admin.edit_category_product', $manager_attribute);
    }
    public function delete_attribute($attr_id){
        $this->AuthLogin();
        DB::table('tbl_attribute')->where('id',$attr_id)->delete();
        Session::put('message','Xóa thuộc tính sản phẩm thành công');
        return Redirect::to('all-attribute');
    }
    public function update_attribute(Request $request,$attr_id){
        $this->AuthLogin();
        $data = array();
        $data['attr_name'] = $request->attr_name;
        $data['value'] = $request->attr_value;
        DB::table('tbl_attribute')->where('id',$attr_id)->update($data);
        Session::put('message','Cập nhật thuộc tính sản phẩm thành công');
        return Redirect::to('all-attribute');
    }
}
