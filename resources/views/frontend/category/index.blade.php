

    <section class="product-category product-category-two">
        <div class="container">
            <div class="section-title">
                <h5>Our Categories</h5>
                <a href="{{route('product')}}" class="view">View All</a>
            </div>
            @if ($categories->count() > 0)

            <div class="category-section category-section-two">
                @foreach($categories as $category)
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        @if (empty($category->b_img) || $category->b_img == 'Image will be here')
                    <img src="/uploads/dummyimg/noimage.png" alt="dress">
                    @else
                    {{-- <img src="/uploads/brand_img/{{ $category->b_img }}" style="height: 80px; width: 80px;" alt="dress"> --}}
                    <img src="/uploads/brand_img/{{ $category->b_img }}" alt="shoes" />
                    @endif
                    </div>
                    <div class="wrapper-info">
                        <a href="product-sidebar.html" class="wrapper-details">{{ $category->title }}</a>
                    </div>
                </div>

                @endforeach
            </div>
            @else
            <div class="alert alert-danger  text-center align-text-center" style="height: 60px; font-size: 25px">No Category Found</div>
            @endif

        </div>
    </section>
