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
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-product-attr/'.$pro_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Timber </label>
                                <div class="checkbox_attribute">
                                    @foreach($timber as $data )
                                        <lable>
                                            <input type="checkbox" name="timber_id[]" value="{{$data -> attr_id}}" id="">{{$data-> value}}
                                        </lable>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Size </label>
                                <div class="checkbox_attribute">
                                    @foreach($size as $data )
                                        <lable>
                                            <input type="checkbox" name="size_id[]" value="{{$data -> attr_id}}" id="">{{$data-> value}}
                                        </lable>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price:</label>
                                <input type="text" name="price" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Storge:</label>
                                <input type="text" name="storge" class="form-control" id="exampleInputEmail1" >
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm thuộc tính sản phẩm</button>
                        </form>
                    </div>

                </div>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Gỗ</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Kho tồn</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product_attr as $pro_attr)
                        <tr>
                            <td></td>
                            <td>{{$pro_attr->timber_id}}</td>
                            <td>{{$pro_attr->size_id}}</td>
                            <td>{{$pro_attr->price_attr}}</td>
                            <td>{{$pro_attr->storge_attr}}</td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product-attr/'.$pro_attr->id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>

        </div>
@endsection

