@extends('frontend.body.main')
@section('main.content')
       <!--------------- wishlist-section---------------->
       <section class="blog about-blog footer-padding">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-item" data-aos="fade-up">
                <div class="cart-img">
                    <img src="./assets/images/homepage-one/empty-wishlist.webp" alt="">
                </div>
                <div class="cart-content">
                    <p class="content-title">Empty! You don’t Cart any Products </p>
                    <a href="/" class="shop-btn">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
    <!--------------- wishlist-section-end---------------->
@endsection
