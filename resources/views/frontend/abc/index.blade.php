<section id="hero" class="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper hero-wrapper">
            @if ($sliders->isEmpty())
                <p>No promotions available at the moment.</p>
            @else
            @foreach ($sliders as $hero)
            <div class="swiper-slide hero-slider-one "

            style="background-image: url('/uploads/slider_img/{{ $hero->img }}');">
                <div class="container">
                    <div class="col-lg-6">
                        <div class="wrapper-section" data-aos="fade-up">
                            <div class="wrapper-info">
                                <h5 class="wrapper-subtitle"> <span class="wrapper-inner-title">{{$hero->discount}}</span>
                                </h5>
                                <h1 class="wrapper-details">{{$hero->heading}}
                                    </h1>
                                {{-- <a href="product-sidebar.html" class="shop-btn">Shop Now</a> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif


        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

    <style>
    .hero-slider-one {
    background-size: cover; /* Ensures the image covers the entire slide */
    background-position: center; /* Centers the image */
    height: 100vh; /* Sets the height to full viewport */
    display: flex; /* Allows for centering content */
    align-items: center; /* Centers content vertically */
    justify-content: center; /* Centers content horizontally */
    }

    .wrapper-info {
        color: white; /* Default text color */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Optional shadow for contrast */
    }
    </style>
