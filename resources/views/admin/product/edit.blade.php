@extends('admin.admin_dashboard')
@section('admin')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Ecommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Product</li>
                        </ol>
                    </nav>
                </div>


            </div>
            <!--end breadcrumb-->
            <form method="POST" action="{{ route('admin.product.update', $Product->id) }}" enctype="multipart/form-data">

                @csrf
                {{ method_field('put') }}
                <div class="card">
                    <div class="card-body p-4 ">
                        <h5 class="card-title">Edit Product</h5>
                        {{-- <a href="{{route('admin.product.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a> --}}

                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" value="{{ old('Date', $Product->date) }}"
                                                class="form-control @error('Date') is-invalid @enderror" id="Date"
                                                name="Date">
                                            <span class="text-danger">{{ $errors->first('Date') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Title" class="form-label">Category</label>
                                            <select class="form-select @error('brand') is-invalid @enderror" name="brand"
                                                id="brand" aria-label="Default select example">
                                                <option value="">Open this select Title</option>
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('brand', $Product->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('brand') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Product</label>
                                            <input type="Product" value="{{ old('Product', $Product->prod) }}"
                                                class="form-control @error('Product') is-invalid @enderror" id="Product"
                                                name="Product">
                                            <span class="text-danger">{{ $errors->first('Product') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" value="{{ old('Stock', $Product->stock) }}"
                                                class="form-control @error('Stock') is-invalid @enderror" id="Stock"
                                                name="Stock">
                                            <span class="text-danger">{{ $errors->first('Stock') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Product Price</label>
                                            <input type="text" value="{{ old('Price', $Product->prod_price) }}"
                                                class="form-control @error('Price') is-invalid @enderror" id="Price"
                                                name="Price">
                                            <span class="text-danger">{{ $errors->first('Price') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Discount_Price" class="form-label">Discount</label>
                                            <input type="text"
                                                value="{{ old('Discount_Price', $Product->discount_percent) }}"
                                                class="form-control @error('Discount_Price') is-invalid @enderror"
                                                id="Discount_Price" name="Discount_Price" placeholder="Enter IN Percent">
                                            <span class="text-danger">{{ $errors->first('Discount_Price') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Short Description</label>
                                            <textarea name="Description" id="descp" class="form-control @error('Description') is-invalid @enderror"
                                                cols="3" rows="3">{{ old('Description', $Product->desc) }}</textarea>
                                            <span class="text-danger">{{ $errors->first('Description') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Long Description</label>
                                            <textarea name="LongDescription" id="l_desc" class="form-control @error('LongDescription') is-invalid @enderror"
                                                cols="5" rows="5">{{ old('LongDescription', $Product->l_desc) }}</textarea>
                                            <span class="text-danger">{{ $errors->first('LongDescription') }}</span>
                                        </div>



                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">
                                        {{-- <h4>Uploaded Images:</h4> --}}
                                        @php
                                            $images = json_decode($Product->prod_img); // Decoding as associative array
                                        @endphp

                                        <div class="mb-3">
                                            <label for="images" class="form-label">Images</label>
                                            <!-- Apply 'is-invalid' class when there is any validation error related to the 'images' array -->
                                            <input type="file"
                                                class="form-control {{ $errors->has('Images') || $errors->has('Images.*') ? 'is-invalid' : '' }}"
                                                id="Images" name="Images[]" multiple>

                                            <!-- Display error for exceeding the max number of images -->
                                            @if ($errors->has('Images'))
                                                <span class="text-danger">{{ $errors->first('Images') }}</span>
                                            @endif

                                            <!-- Display error for individual image validation -->
                                            @if ($errors->has('Images.*'))
                                                @foreach ($errors->get('Images.*') as $error)
                                                    <span class="text-danger">{{ $error[0] }}</span><br>
                                                @endforeach
                                            @endif
                                        </div>


                                        @if ($Product->prod_img == '["image will be here"]')
                                            <div class="alert alert-danger">No Image Found</div>
                                        @else
                                            <h5 class="text-primary alert-danger">Uploaded Images</h5>
                                            @foreach (json_decode($Product->prod_img) as $image)
                                                <img src="{{ asset('/uploads/products_img/' . $image) }}" width="100"
                                                    height="100">
                                            @endforeach
                                        @endif

                                        <div class="mb-5 pt-4">
                                            <label for="Model" class="form-label">Model</label>
                                            <input type="text" value="{{ old('Model', $Product->model) }}"
                                                class="form-control @error('Model') is-invalid @enderror" id="Model"
                                                name="Model" placeholder="Enter IN Percent">
                                            <span class="text-danger">{{ $errors->first('Model') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Delivery" class="form-label">Delivery</label>
                                            <input type="text" value="{{ old('Delivery', $Product->delivery) }}"
                                                class="form-control @error('Delivery') is-invalid @enderror"
                                                id="Delivery" name="Delivery" placeholder="Enter Country">
                                            <span class="text-danger">{{ $errors->first('Delivery') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Size" class="form-label">Size</label>
                                            <select class="form-select @error('size') is-invalid @enderror"
                                                name="size[]" id="Size" multiple>
                                                @if (empty($sizes))
                                                    <option value="" disabled>No Sizes Found. Please Add Size
                                                    </option>
                                                @else
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size }}"
                                                            {{ in_array($size, old('size', $Product->size ? json_decode($Product->size) : [])) ? 'selected' : '' }}>
                                                            {{ $size }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="text-danger">{{ $errors->first('size') }}</span>
                                        </div>




                                        {{-- <h6 class="text-muted">Select Colors</h6> --}}


                                        <div class="row">
                                            <!-- Color Red -->
                                            @forelse ($Colors as $Color)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="colors[]"
                                                            value="{{ $Color->id }}"
                                                            id="color_{{ $Color->id }}">{{ $Color->name }}
                                                        <label class="form-check-label" for="colorRed"></label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantityRed" class="form-label">Quantity:</label>
                                                        <input type="number" class="form-control" id="quantityRed"
                                                            name="quantity[{{ $Color->id }}]">
                                                    </div>
                                                </div>
                                            @empty
                                                No Color Found
                                            @endforelse
                                        </div>

                                        <h3 class="mt-5">Color List</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="pt-2">
                                                @foreach ($Product->product_colors as $prod_color)
                                                    <tr>
                                                        <td>{{ $prod_color->color->name ?? 'No Color Found' }}</td>
                                                        <td>
                                                            <input type="number" id="quantity-{{ $prod_color->id }}"
                                                                value="{{ $prod_color->qty }}" class="form-control">
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="productcolorupdate btn btn-primary update-btn"
                                                                data-id="{{ $prod_color->id }}">Update</button>
                                                            <button type="button"
                                                                class="productcolordelete btn btn-danger delete-btn"
                                                                data-product-id="{{ $Product->id }}"
                                                                data-color-id="{{ $prod_color->id }}">Delete</button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>



    <!--end page wrapper -->
@endsection

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Enable or disable quantity inputs based on checkbox status
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const quantityInput = this.parentNode.nextElementSibling.querySelector('input');
            quantityInput.disabled = !this.checked;
        });
    });
</script>

<script>
    function generateSlug() {
        const title = document.getElementById('title').value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Special characters ko remove kare
            .trim()
            .replace(/\s+/g, '-') // Spaces ko hyphens se replace kare
            .replace(/-+/g, '-'); // Multiple hyphens ko single mein replace kare

        document.getElementById('Slug').value = slug;
    }
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Update button functionality
        $('.update-btn').click(function() {
            var colorId = $(this).data('id');
            var quantity = $(this).closest('tr').find('input[type="number"]').val();

            $.ajax({
                url: '{{ route('product-color.update', ['productId' => $Product->id, 'colorId' => '__colorId__']) }}'
                    .replace('__colorId__', colorId),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    qty: quantity,
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('Error updating the color.');
                }
            });
        });

        // Delete button functionality
        $('.productcolordelete').click(function() {
            var productId = $(this).data('product-id');
            var colorId = $(this).data('color-id');

            if (confirm('Are you sure you want to delete this color?')) {
                $.ajax({
                    url: '{{ route('product-color.delete', ['productId' => '__productId__', 'colorId' => '__colorId__']) }}'
                        .replace('__productId__', productId)
                        .replace('__colorId__', colorId),
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        alert(response.message); // Show success message
                        location.reload(); // Reload the page to see the changes
                    },
                    error: function(xhr) {
                        alert('Error deleting the color.');
                    }
                });
            }
        });

    });
</script>
