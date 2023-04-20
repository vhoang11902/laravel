@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thuộc tính sản phẩm
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    @foreach($edit_attribute as $key => $edit_attr)

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-attribute/'.$edit_attr->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thuộc tính </label>
                                <select name="attr_name" value="{{$edit_attr->attr_name}}" class="form-control input-sm m-bot15">
                                    <option >Timber</option>
                                    <option >Size</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá trị:</label>
                                <input type="text" name="attr_value" class="form-control" id="exampleInputEmail1" value="{{$edit_attr->value}}" placeholder="Tên danh mục">
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật thuộc tính</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
@endsection

