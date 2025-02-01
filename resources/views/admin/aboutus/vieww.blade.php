<div class="header-cart">
    <a href="{{ route('cart.page') }}" class="cart-item">
        <span>
            <svg width="35" height="28" viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG content here -->
            </svg>
        </span>
        <span class="cart-text">
            Cart ({{ $cartCount ?? 0 }})
        </span>
    </a>
    <div class="cart-submenu">
        <div class="cart-wrapper-item">
            @if(isset($cartItems) && $cartItems->count() > 0)
                @foreach($cartItems as $item)
                    <div class="wrapper">
                        <div class="wrapper-item">
                            <div class="wrapper-img">
                                {{-- <img src="{{ $item->product->image_url }}" alt="img"> --}}
                            </div>
                            <div class="wrapper-content">
                                <h5 class="wrapper-title">{{ $item->prod_title }}</h5>
                                <div class="price">
                                    <p class="new-price">${{ $item->price }}</p>
                                    <p class="qty">Qty: {{ $item->qty }}</p>
                                </div>
                            </div>
                        </div>
                        <span class="close-btn">
                            <!-- SVG close button -->
                        </span>
                    </div>
                @endforeach
            @else
                <p>No items in cart</p>
            @endif
        </div>
        <div class="cart-wrapper-section">
            <div class="wrapper-line"></div>
            <div class="wrapper-subtotal">
                <h5 class="wrapper-title">Subtotal</h5>
                <h5 class="wrapper-title">$ {{ $cartItems->sum('total') ?? 0 }}</h5>
            </div>
            <div class="cart-btn">
                <a href="{{ route('cart.page') }}" class="shop-btn view-btn">View Cart</a>
                {{-- <a href="{{ route('checkout.page') }}" class="shop-btn checkout-btn">Checkout Now</a> --}}
            </div>
        </div>
    </div>
</div>












// migration file
public function up()
{
    Schema::create('about_us_pages', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Main title like "Know More About Us"
        $table->text('main_content'); // Main content text
        $table->string('sanitization_title')->nullable(); // Subsection title for sanitization
        $table->text('sanitization_content')->nullable(); // Sanitization description
        $table->string('contact_title')->nullable(); // Contact title
        $table->text('contact_content')->nullable(); // Contact description
        $table->string('payment_title')->nullable(); // Title for payment section
        $table->text('payment_content')->nullable(); // Content for payment section
        $table->string('delivery_title')->nullable(); // Title for delivery section
        $table->text('delivery_content')->nullable(); // Content for delivery section
        $table->timestamps();
    });
}



<!-- Blade view for admin to manage About Us page -->
<form action="{{ route('about_us.update', $aboutUs->id ?? null) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Main Title Input -->
    <div class="form-group">
        <label for="title">Main Title (e.g., Know More About Us)</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $aboutUs->title ?? '' }}" required>
    </div>

    <!-- Main Content Input -->
    <div class="form-group">
        <label for="main_content">Main Content</label>
        <textarea name="main_content" id="main_content" class="form-control" rows="5" required>{{ $aboutUs->main_content ?? '' }}</textarea>
    </div>

    <!-- Sanitization Section -->
    <div class="form-group">
        <label for="sanitization_title">Sanitization Section Title</label>
        <input type="text" name="sanitization_title" id="sanitization_title" class="form-control" value="{{ $aboutUs->sanitization_title ?? '' }}">
    </div>
    <div class="form-group">
        <label for="sanitization_content">Sanitization Section Content</label>
        <textarea name="sanitization_content" id="sanitization_content" class="form-control" rows="4">{{ $aboutUs->sanitization_content ?? '' }}</textarea>
    </div>

    <!-- Contact Section -->
    <div class="form-group">
        <label for="contact_title">Contact Section Title</label>
        <input type="text" name="contact_title" id="contact_title" class="form-control" value="{{ $aboutUs->contact_title ?? '' }}">
    </div>
    <div class="form-group">
        <label for="contact_content">Contact Section Content</label>
        <textarea name="contact_content" id="contact_content" class="form-control" rows="4">{{ $aboutUs->contact_content ?? '' }}</textarea>
    </div>

    <!-- Payment Section -->
    <div class="form-group">
        <label for="payment_title">Payment Section Title</label>
        <input type="text" name="payment_title" id="payment_title" class="form-control" value="{{ $aboutUs->payment_title ?? '' }}">
    </div>
    <div class="form-group">
        <label for="payment_content">Payment Section Content</label>
        <textarea name="payment_content" id="payment_content" class="form-control" rows="4">{{ $aboutUs->payment_content ?? '' }}</textarea>
    </div>

    <!-- Delivery Section -->
    <div class="form-group">
        <label for="delivery_title">Delivery Section Title</label>
        <input type="text" name="delivery_title" id="delivery_title" class="form-control" value="{{ $aboutUs->delivery_title ?? '' }}">
    </div>
    <div class="form-group">
        <label for="delivery_content">Delivery Section Content</label>
        <textarea name="delivery_content" id="delivery_content" class="form-control" rows="4">{{ $aboutUs->delivery_content ?? '' }}</textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Save</button>
</form>


// AboutUsController.php
public function update(Request $request, $id)
{
    $aboutUs = AboutUs::findOrFail($id);

    $aboutUs->update([
        'title' => $request->input('title'),
        'main_content' => $request->input('main_content'),
        'sanitization_title' => $request->input('sanitization_title'),
        'sanitization_content' => $request->input('sanitization_content'),
        'contact_title' => $request->input('contact_title'),
        'contact_content' => $request->input('contact_content'),
        'payment_title' => $request->input('payment_title'),
        'payment_content' => $request->input('payment_content'),
        'delivery_title' => $request->input('delivery_title'),
        'delivery_content' => $request->input('delivery_content'),
    ]);

    return redirect()->back()->with('success', 'About Us page updated successfully!');
}



