@extends('frontend.body.main')
@section('main.content')
   <!--------------- blog-tittle-section---------------->
   <section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Cart</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Cart</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- cart-section---------------->
<section class="product-cart product footer-padding">
    <div class="container">
        <div class="cart-section">
            <table>
                <tbody>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUCT Image</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Product</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Price</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Quantity</h5>
                        </td>
                        <td class="table-wrapper">
                            <h5 class="table-heading">Total</h5>
                        </td>
                        <td class="table-wrapper" >
                            <h5 class="table-heading">Action</h5>
                        </td>
                    </tr>
                    @foreach ($Carts as $Cart)
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            @php
                                $image=json_decode($Cart->prod_img);
                            @endphp
                            <div class="wrapper-img">
                                <img src="{{ asset('uploads/products_img/'. $image[0])  }}" alt="img" style="width: 100%;">
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">{{ $Cart->prod_title }}</h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">{{ $Cart->price }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">{{ $Cart->qty }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading">{{ $Cart->total }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <form action="{{ route('cart.remove', $Cart->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="wishlist-btn cart-btn">
            <form action="{{ route('cart.page.delete',$Cart->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="clean-btn">
                    Clear Cart
                </button>
                {{-- <a href="empty-cart.html" ></a> --}}
            </form>
            {{-- <a href="#" class="shop-btn update-btn">Update Cart</a> --}}
            <a href="{{ route('order.page', $Cart->user_id) }}" class="shop-btn">Proceed to Checkout</a>
        </div>

    </div>
</section>
<!--------------- cart-section-end---------------->
@endsection
