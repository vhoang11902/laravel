@extends('welcome')
@section('content')
    <nav class="category">
        @foreach($category_name as $key => $name)
        <h1 class="label">{{$name -> category_name}}</h1>
        @endforeach
        <div class="category_filter">
            <div class="category_filter_btn" id="btn_1">
                <span class="filter_label">Material</span>
                <span class="filter_label_icon">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
                <ul class="category_filter_droplist">
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">

                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                </ul>
            </div>
            <div class="category_filter_btn" id="btn_2">
                <span class="filter_label">Cartegory</span>
                <span class="filter_label_icon">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
                <ul class="category_filter_droplist">
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                    <li class="filter_list">
                        <span class="checkbox">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="filter_text">Alumilum</span>
                    </li>
                </ul>
            </div>

        </div>
        <div class="category_sort">
            <div class="category_filter_btn" id="btn_3">
                <span class="filter_label">SORT BY RECOMMENDED</span>
                <span class="filter_label_icon">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
                <ul class="category_filter_droplist">
                    <li class="filter_list">
                        <span class="filter_text">Price: High to Low</span>
                    </li>
                    <li class="filter_list">
                        <span class="filter_text">Price: Low to High</span>
                    </li>
                    <li class="filter_list">
                        <span class="filter_text">New Arrivel</span>
                    </li>
                </ul>
            </div>
        </div>
            <div class="shop-content">
                <!-- product1 -->
                @foreach($category_by_id as $key => $product)
                <div class="product-box">
                    <a href="{{URL::to('/products/'.$product->product_id)}}">
                        <img class="product-img" src="{{URL::to('public/uploads/product',$product->product_image)}}" alt="">
                        <h2 class="product-title">{{$product->product_name}}</h2>
                        <span class="price">{{number_format($product->product_price,0,',','.').' '.'$'}}</span>
                    </a>
                    <button class="add-cart">Add to cart</button>
                </div>
                @endforeach
            </div>
    </nav>
@endsection
