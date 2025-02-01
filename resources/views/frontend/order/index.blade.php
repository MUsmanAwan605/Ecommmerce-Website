@extends('frontend.body.main')

@section('main.content')
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="/l">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Checkout</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- checkout-section---------------->
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <form action="{{ route('order.page.add',$orders->first()->user_id) }}" method="post">
                    @csrf
                    <div class="row gy-5">
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">

                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Billing Details</h5>
                                    <div class="review-form">
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="fname" class="form-label">First Name*</label>
                                                <input type="text" id="fname" name="fname" class="form-control"
                                                    value="{{ Auth::user()->fname }}">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="lname" class="form-label">Last Name*</label>
                                                <input type="text" id="lname" name="lname" class="form-control"
                                                    value="{{ Auth::user()->lname }}">
                                            </div>
                                        </div>
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="email" class="form-label">Email*</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="phone" class="form-label">Phone*</label>
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>

                                        <div class="review-form-name address-form">
                                            <label for="address" class="form-label">Address*</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="{{ Auth::user()->address }}">
                                        </div>
                                        <div class=" account-inner-form city-inner-form">
                                            {{-- <div class="review-form-name">
                                        <label for="city" class="form-label">Town / City*</label>
                                        <select id="city" class="form-select">
                                            <option>Choose...</option>
                                            <option>Newyork</option>
                                            <option>Dhaka</option>
                                            <option selected>London</option>
                                        </select>
                                    </div> --}}
                                            {{-- <div class="review-form-name">
                                        <label for="number" class="form-label">Postcode / ZIP*</label>
                                        <input type="number" id="number" class="form-control" placeholder="0000">
                                    </div> --}}
                                        </div>


                                        {{-- <div class="review-form-name checkbox">
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="account">
                                        <label for="account" class="form-label">
                                            Create an account?</label>
                                    </div>
                                </div> --}}
                                        {{-- <div class="review-form-name shipping">
                                    <h5 class="wrapper-heading">Shipping Address</h5>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="remember">
                                        <label for="remember" class="form-label">
                                            Create an account?</label>
                                    </div>
                                </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">
                                {{-- <a href="#" class="shop-btn">Enter Coupon Code</a> --}}
                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Order Summary</h5>
                                    <div class="order-summery">
                                        <div class="subtotal product-total">
                                            <h5 class="wrapper-heading">PRODUCT</h5>
                                            <h5 class="wrapper-heading">Quantity</h5>
                                            <h5 class="wrapper-heading">Price</h5>
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                        </div>
                                        <hr>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                @foreach ($orders as $order)
                                                    <li>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading">{{ $order->prod_title }}</h5>
                                                            <input type="hidden" name="prod[]" value="{{ $order->prod_title }}">

                                                        </div>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading">{{ $order->qty }}</h5>
                                                            <input type="hidden" name="qty[]" value="{{ $order->qty }}">

                                                        </div>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading">{{ $order->price }}</h5>
                                                            <input type="hidden" name="price[]" value="{{ $order->price }}">

                                                        </div>

                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading"> {{ $order->total }}</h5>
                                                            <input type="hidden" name="total[]" value="{{ $order->qty }}">

                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="subtotal product-total">
                                            <h5 class="wrapper-heading">SUBTOTAL</h5>
                                            <h5 class="wrapper-heading">{{ $totalPrice }}</h5>
                                        </div>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                <li>
                                                    <div class="product-info">
                                                        <p class="paragraph">SHIPPING</p>
                                                        <h5 class="wrapper-heading">Free Shipping</h5>

                                                    </div>
                                                    <div class="price">
                                                        <h5 class="wrapper-heading">+$0</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="subtotal total">
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                            <h5 class="wrapper-heading price">{{ $totalPrice }}</h5>
                                            <input type="hidden" class="wrapper-heading price border-0 text-end"  name="totalAmount" value="{{ $totalPrice }}"  readonly>
                                        </div>

                                        <div class="subtotal payment-type">
                                            <div class="checkbox-item">
                                                <input type="radio" id="bank" name="payment_method" value="DirectBankTransfer" onclick="setPaymentMethod(this)">
                                                <div class="bank">
                                                    <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                                    <p class="paragraph">Make your payment directly into our bank account.
                                                        Please use
                                                        <span class="inner-text">your Order ID as the payment reference.</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="radio" id="cash" name="payment_method" value="CashonDelivery" onclick="setPaymentMethod(this)">
                                                <div class="cash">
                                                    <h5 class="wrapper-heading">Cash on Delivery</h5>
                                                </div>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="radio" id="credit" name="payment_method" value="Credit/DebitCardsorPaypal" onclick="setPaymentMethod(this)">
                                                <div class="credit">
                                                    <h5 class="wrapper-heading">Credit/Debit Cards or Paypal</h5>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <form id="stripeForm" action="{{ route('stripe.checkout') }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="payment_method" value="DirectBankTransfer">
                                        </form> --}}



                                        <!-- Hidden input to store the selected payment method -->
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="">
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="{{ $order->fname }}">
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="{{ $order->lname }}">

                                        <script>
                                            function setPaymentMethod(element) {
                                                // Set the selected radio button's value in the hidden input
                                                document.getElementById('selectedPaymentMethod').value = element.value;
                                            }
                                        </script>

                                        <button  class="shop-btn">Place Order Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
