<!-- resources/views/products/partials/product_list.blade.php -->
<div class="product-list">
    @if($products->count())
        @foreach ($products as $product)
            <div class="product-item">
                <h3>{{ $product->title }}</h3>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->price }}</p>
                <!-- Add other product details as necessary -->
            </div>
        @endforeach
    @else
        <p>No products found.</p>
    @endif
</div>
