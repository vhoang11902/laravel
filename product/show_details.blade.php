@extends('welcome')
@section('content')

        <section class="content_product">
            <!-- --------------------------Breadcrumb -->
            @foreach($product_details as $key => $value)
            <article class="content_product-body">
                <!-- --------------------------Content PRODUCT -->
                <div class="product_img">
                    <div class="product_big-img">
                        <img src="{{URL::to('/public/uploads/product/'.$value ->product_image)}}" alt="">
                    </div>
                    <div class="product_small-img">
                        <img src="{{URL::to('/public/uploads/product/'.$value ->product_image)}}" alt="">
                    </div>
                </div>
                <div class="product_content">
                    <div class="product_content-name">
                        <h1>{{$value -> product_name}}</h1>
                        <p>$
                        </p>
                    </div>
                    <div class="product_content-timber">
                        <select class="form-select-attr" aria-label="Default select example">
                            @foreach($product_attr as $key => $value_attr)
                            <option >{{$value_attr->timber_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="product-content_pd-size">
                        <p style="font-weight: lighter;">Select Size: </p>
                        <div class="product-content_pd-size-btn">
                            @foreach($product_attr as $key => $value_attr)
                            <button><span>{{$value_attr->size_id}} </span></button>
                            @endforeach
                        </div>
                    </div>
                    <form action="{{URL::to('/save-cart')}}" method="POST">
                        {{csrf_field()}}
                    <div class="product-content-btn-pay">
                        <div class="wrapper-pro">
                            <i id="decrement" onclick="stepper(this)">-</i>
                            <input name="qty" type="number" min="1" max="1000" value="1" step="1"
                                   id="my-input" readonly>
                            <i id="increment" onclick="stepper(this)">+</i>
                        </div>
                        <input name="productid_hidden" type="hidden" value="{{$value -> product_id}}">
                        <button class="add-to-cart btn-primary" type="submit"><p>Add To Cart</p></button>
                    </div>
                    </form>
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                DESCRIPTION + DIMENSIONS
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h1>DESCRIPTION:</h1>
                                    <span>{{$value -> product_content}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                WARRANTY & CARE
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h1>DESCRIPTION:</h1>
                                    <span>Tempt your family to relax and spend more time outdoors by setting up a casual and comfy outdoor living space with the Zanzibar modular sofa. This sofa package includes two modular 3-seater sofas and one corner sofa. Stylish rope woven around an aluminium frame and the curved design accentuate the timeless elegance and strength of this outdoor sofa. The aluminium frame is powder coated for extra protection from the elements. Topped with removable cushions upholstered in easy-care polyester, the sofas are absolutely comfortable. Create different arrangements with the three pieces to fit the space and match your seating needs. Add a matching coffee table to complete the look.</span>
                                    <h1>DIMENSIONS:</h1>
                                    <p>- 1 Seater: 81cm x D77cm x H76cm</p><p>- Coffee Table: L75cm x W75cm x H40cm</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                DELIVERY
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h1>DESCRIPTION:</h1>
                                    <span>Tempt your family to relax and spend more time outdoors by setting up a casual and comfy outdoor living space with the Zanzibar modular sofa. This sofa package includes two modular 3-seater sofas and one corner sofa. Stylish rope woven around an aluminium frame and the curved design accentuate the timeless elegance and strength of this outdoor sofa. The aluminium frame is powder coated for extra protection from the elements. Topped with removable cushions upholstered in easy-care polyester, the sofas are absolutely comfortable. Create different arrangements with the three pieces to fit the space and match your seating needs. Add a matching coffee table to complete the look.</span>
                                    <h1>DIMENSIONS:</h1>
                                    <p>- 1 Seater: 81cm x D77cm x H76cm</p><p>- Coffee Table: L75cm x W75cm x H40cm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <article class="product_related">
                <h2 class="product-rel-category">product related</h2>
                <button class="pre-rel-btn"><img src="images/arrow.png" alt=""></button>
                <button class="nxt-rel-btn"><img src="images/arrow.png" alt=""></button>
                <div class="product-rel-container">
                    @foreach($relate as $key => $pro_related)
                    <a href="#" class="product-rel-card">
                        <div class="product-rel-image">
                            <img src="{{URL::to('/public/uploads/product/'.$pro_related ->product_image)}}" class="product-rel-thumb" alt="">
                            <button class="card-rel-btn">add to bag</button>
                        </div>
                        <div class="product-rel-info">
                            <h2 class="product-rel-brand">{{$pro_related->product_name}}</h2>
                            <span class="price-rel">From ${{$pro_related->product_price}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </article>
        </section>
@endsection
