<style>
    .custom-checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .color-box {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
    }
</style>
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
            <form method="POST" action="{{ route('admin.sale.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Product</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" value="{{ old('Date') }}"
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
                                                        {{ old('brand') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('brand') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Product</label>
                                            <input type="Product" value="{{ old('Product') }}"
                                                class="form-control @error('Product') is-invalid @enderror" id="Product"
                                                name="Product">
                                            <span class="text-danger">{{ $errors->first('Product') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" value="{{ old('Stock') }}"
                                                class="form-control @error('Stock') is-invalid @enderror" id="Stock"
                                                name="Stock">
                                            <span class="text-danger">{{ $errors->first('Stock') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Product Price</label>
                                            <input type="text" value="{{ old('Price') }}"
                                                class="form-control @error('Price') is-invalid @enderror" id="Price"
                                                name="Price">
                                            <span class="text-danger">{{ $errors->first('Price') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Discount_Price" class="form-label">Discount</label>
                                            <input type="text" value="{{ old('Discount_Price') }}"
                                                class="form-control @error('Discount_Price') is-invalid @enderror"
                                                id="Discount_Price" name="Discount_Price" placeholder="Enter IN Percent">
                                            <span class="text-danger">{{ $errors->first('Discount_Price') }}</span>
                                        </div>



                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Short Description</label>
                                            <textarea name="Description" id="descp"
                                                class="form-control @error('Description') is-invalid @enderror" cols="3" rows="3">{{ old('Description') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('Description') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Long Description</label>
                                            <textarea name="LongDescription" id="l_desc"
                                                class="form-control @error('LongDescription') is-invalid @enderror" cols="5" rows="5">{{ old('LongDescription') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('LongDescription') }}</span>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="bsValidation1" class="form-label text-black">Products Picture
                                                <span style="font-size: 12px;">Maximum: 5 Images</span>
                                            </label>
                                            <input type="file" class="form-control @error('Images') is-invalid @enderror"
                                                   name="Images[]" id="bsValidation1" multiple>

                                            <!-- Display an error if the Images array itself has an error -->
                                            @error('Images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <!-- Display errors for each individual file in the Images array -->
                                            @if ($errors->has('Images.*'))
                                                @foreach ($errors->get('Images.*') as $error)
                                                    <span class="text-danger">{{ $error[0] }}</span><br>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="Model" class="form-label">Model</label>
                                            <input type="text" value="{{ old('Model') }}"
                                                class="form-control @error('Model') is-invalid @enderror" id="Model"
                                                name="Model" placeholder="Enter IN Percent">
                                            <span class="text-danger">{{ $errors->first('Model') }}</span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Delivery" class="form-label">Delivery</label>
                                            <input type="text" value="{{ old('Delivery') }}"
                                                class="form-control @error('Delivery') is-invalid @enderror"
                                                id="Delivery" name="Delivery" placeholder="Enter Country">
                                            <span class="text-danger">{{ $errors->first('Delivery') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Size" class="form-label">Size</label>
                                            <select class="form-select @error('size') is-invalid @enderror"
                                                name="size[]" id="Size" multiple>
                                                @if ($Sizes->isEmpty())
                                                    <option value="" disabled>No Sizes Found Please Add Size</option>
                                                @else
                                                    @foreach ($Sizes as $Size)
                                                        <option value="{{ $Size->size }}"
                                                            {{ in_array($Size->size, old('size', [])) ? 'selected' : '' }}>
                                                            {{ $Size->size }}
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
                                                            value="{{ $Color->id }}" id="color_{{ $Color->id }}"
                                                            {{ in_array($Color->id, old('colors', [])) ? 'checked' : '' }}>

                                                        <label class="form-check-label"
                                                            for="color_{{ $Color->id }}">{{ $Color->name }}</label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantityRed_{{ $Color->id }}"
                                                            class="form-label">Quantity:</label>
                                                        <input type="number" class="form-control"
                                                            id="quantityRed_{{ $Color->id }}"
                                                            name="quantity[{{ $Color->id }}]"
                                                            value="{{ old('quantity.' . $Color->id) }}">
                                                    </div>
                                                </div>
                                            @empty
                                                No Color Found
                                            @endforelse
                                        </div>

                                        {{-- <div class="row d-flex">
                                            @if ($Colors->isEmpty())
                                                <p class="text-muted">No Colors Found Please Add Colors</p>
                                            @else
                                                <div class="col-md-5">
                                                    <label class="form-label">Select Colors</label> <!-- Label for clarity -->
                                                    @foreach ($Colors as $Color)
                                                        <div class="form-check mb-5"> <!-- Added mb-2 for margin bottom -->
                                                            <input type="checkbox"
                                                                   class="form-check-input"
                                                                   id="color-{{ $Color->id }}"
                                                                   value="{{ $Color->id }}"
                                                                   name="colors[]">
                                                            <br />
                                                            Quantity: <input type="number">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div> --}}








                                        {{-- <label for="Color" class="form-label"></label>

                                            <span class="text-danger">{{ $errors->first('Color') }}</span>
                                         --}}


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>


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
