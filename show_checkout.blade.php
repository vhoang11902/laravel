@extends('welcome')
@section('content')

    <section class="body">
        <h1>CHECK OUT</h1>
        <div class="body_content">
            <div class="content-left">
                <div class="top_lable">
                    <h2>My Details</h2>
                </div>
                <div class="body_content-left">
                    <div class="bill_detail-lable">
                        <h2>1. DELIVERY</h2>
                    </div>
                    <form action="{{URL::to('/save-checkout')}}" method="POST">
                        {{csrf_field()}}
                        <div class="bill-container-wrap">
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">First Name:</label>
                                    <input name="shipping_firstname" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">Last name:</label>
                                    <input name="shipping_lastname" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">State:</label>
                                    <input name="shipping_state" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">City:</label>
                                    <input name="shipping_city" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">Address:</label>
                                    <input name="shipping_address" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">Postal Code:</label>
                                    <input name="shipping_postal" type="text">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">Email:</label>
                                    <input name="shipping_email" type="email">
                                </div>
                            </div>
                            <div class="bill-container">
                                <div class="container-item">
                                    <label for="">Phone Number:</label>
                                    <input name="shipping_phone" type="text">
                                </div>
                            </div>
                        </div>
                        <button  href="{{URL::to('/payment')}}" class="btn btn-primary">
                            <span>Go to Payment</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="content-right">
                <div class="top_info">
                    <div class="top_info-right">
                        <h2>In Your Bag</h2>
                    </div>
                    <div class="top_info-right">
                        <a href="{{URL::to('/show-cart')}}">edit</a>
                    </div>
                </div>
                <div class="card_body-right">
                    <div class="sum-price-wrap">
                        <div class="sum-price-info">
                            <div class="sum-price-lable">
                                Subtotal
                            </div>
                            <div class="sum-price-text">
                                {{Cart::subtotal()}}
                            </div>
                        </div>
                        <div class="sum-price-info">
                            <div class="sum-price-lable">
                                Estimated Shipping
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
                        <div class="total-price-num">
                            {{Cart::total()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
