@extends('welcome')
@section('content')

    <section class="body_cart">
        <h1>cart</h1>
        <div class="cart_body">
            <div class="cart_body-left">
                <?php
                $content = Cart::content();
//                echo'<pre>';
//                print_r($content);
//                echo'</pre>';
                ?>
                @foreach($content as $v_content)
                <div class="cart_list" id="product">
                    <div class="cart_list-img">
                        <img src="{{URL::to('public/uploads/product/',$v_content->options->image)}}" alt="">
                    </div>

                    <div class="cart_list-info">
                        <div class="item-name">
                            <a href="#">{{$v_content->name}}</a>
                        </div>
                        <div class="item-info">
                            <span>Olive</span> <span>, </span> <span>4 Piece</span>
                        </div>
                        <div class="item-price">
                            <div class="price">
                                $ <span id="price">{{number_format($v_content->price)}}</span>
                            </div>

                            <div class="wrapper quantity">
                                <button class="input-group-prepend decrement-btn">
                                    <ion-icon name="remove-outline"></ion-icon>
                                </button>
                                <input name="qty" class="cart-quantity-input form-control"  type="number" id="quantity" value="{{$v_content->qty}}" readonly>
                                <button class="input-group-prepend increment-btn">
                                    <ion-icon name="remove-outline"></ion-icon>
                                </button>
                            </div>
                            <div class="price"> $
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal);
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="cart_list-delbtn">
                        <a class="del-item" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">X</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="cart_body-right">
                <h3>ORDER SUMMARY</h3>
                <div class="sum-price-wrap">
                    <div class="sum-price-info">
                        <div class="sum-price-lable">
                            Product total
                        </div>
                        <div class="sum-price-text">
                            <span>$ {{Cart::subtotal()}}</span>
                        </div>
                    </div>
                    <div class="sum-price-info">
                        <div class="sum-price-lable">
                            shipping fee
                        </div>
                        <div class="sum-price-text">
                            free
                        </div>
                    </div>
                </div>
                <div class="total-price">
                    <div class="total-price-lable">
                        Total
                    </div>
                    <div class="total">
                        <span>$ {{Cart::total()}}</span>
                    </div>
                </div>
                <div class="btn-checkout">
                    <button class="checkout" >
                        <a href="{{URL::to('/checkout')}}">CHECKOUT</a>
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
