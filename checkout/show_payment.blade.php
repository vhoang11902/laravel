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
                    <div class="payment-lable">
                        <h2>2.PAYMENT</h2>
                    </div>
                    <div class="payment-form">
                        <div class="payment-method">
                            <button class="method selected">
                                <ion-icon name="card"></ion-icon>

                                <span>Credit/Debit Card</span>

                                <ion-icon class="checkmark fill" name="checkmark-circle"></ion-icon>
                            </button>
                            <button class="method">
                                <ion-icon name="logo-paypal"></ion-icon>

                                <span>Paypal</span>

                                <ion-icon class="checkmark" name="checkmark-circle-outline"></ion-icon>
                            </button>
                        </div>
                        <form action="#">
                            <div class="card-container">
                                <label for="card-number" class="label-default">Card number</label>
                                <input type="number" name="card-number" id="card-number" class="input-default">
                            </div>
                            <div class="card-container">
                                <label for="cardholder-name" class="label-default">Cardholder name</label>
                                <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
                            </div>
                            <div class="card-container">
                                <div class="expire-date">
                                    <label for="expire-date" class="label-default">Expiration date</label>

                                    <div class="input-flex">

                                        <input type="number" name="day" id="expire-date" placeholder="31" min="1" max="31"
                                               class="input-default">
                                        /
                                        <input type="number" name="month" id="expire-date" placeholder="12" min="1" max="12"
                                               class="input-default">

                                    </div>
                                </div>
                                <div class="cvv">
                                    <label for="cvv" class="label-default">CVV</label>
                                    <input type="number" name="cvv" id="cvv" class="input-default">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-primary">
                    <b>Pay</b> $ <span id="payAmount">2.15</span>
                </button>
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

