
@extends('admin.admin_dashboard')
@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('success-message').style.display = 'none';
                            }, 5000); // Hide after 5 seconds
                        </script>
                    @endif
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{route('admin.sale.create')}}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>New Product</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5" placeholder="Search Product..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Sort By</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-chevron-down'></i>
                                                  </button>
                                                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-white">Collection Type</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bxs-category'></i>
                                                  </button>
                                                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-white">Price Range</button>
                                                <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn btn-white dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='bx bx-slider'></i>
                                                  </button>
                                                  <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                  </ul>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($Products->count() > 0)


        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            @foreach ($Products as $Product )
            <div class="col">
                <div class="card">
                    <a href="{{ route('admin.product.show', $Product->id) }}">

                        @php
                        $images = json_decode($Product->prod_img);
                    @endphp

                    @if($Product->prod_img == '["image will be here"]')

                    <img src="{{ asset('/uploads/dummyimg/noimage.png') }}"  class="card-img-top" alt="...">
                    @else
                    <img src="{{ asset('/uploads/flash_img/' . $images[0]) }}" class="card-img-top" alt="Product Image">
                    @endif

                    <div class="">

                            <div  class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-{{ $Product->discount_percent }}</span></div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">{{ $Product->prod }}</h6>
                        {{-- <td>{{ $Product->category->title }}</td> <!-- Access the related category --> --}}
                        <div class="clearfix">
                            <p class="mb-0 float-start"><strong>134</strong> Sales</p>
                            <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">{{ $Product->prod_price }} </span><span>{{ $Product->selling_price }}</span></p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>
                            <span class="label" id="status-{{ $Product->id }}">
                                <!-- Bootstrap Switch (on/off toggle) -->
                                <div class="form-check form-switch">
                                    <!-- Check if the product is active or deactive -->
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheck{{ $Product->id }}"
                                        {{ $Product->status == 'active' ? 'checked' : '' }}
                                        onchange="toggleStatus({{ $Product->id }}, this)">
                                    <label class="form-check-label" for="flexSwitchCheck{{ $Product->id }}">
                                        {{ $Product->status == 'active' ? 'Active' : 'Deactive' }}
                                    </label>
                                </div>
                            </span>

                            <a href="{{ route('admin.sale.edit',$Product->id) }}"><p class="mb-0 ms-auto"><i class='bx bxs-edit'></i></a>
                                <form method="post" action="{{ route('admin.sale.destroy', $Product->id) }}" class="delete-form">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="ms-2 delete-button" data-id="{{ $Product->id }}" style="padding: 9px 10px; outline:none; border:none; border-radius:5px;">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </form>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            </div>
            @endforeach
        </div><!--end row-->
        <div class="mt-5">
            {!! $Products->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        @else
        <div class="alert alert-danger">No record found</div>
        @endif

    </div>
</div>
<!--end page wrapper -->







{{-- <-- Ajax Code Delete the Record  Start--> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Delete product
        $(document).on('click', '.delete-button', function() {
            const ProductId = $(this).data('id');
            const form = $(this).closest('.delete-form');

            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        alert('Product deleted successfully!');
                        // Remove the table row dynamically without refreshing
                        form.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        });
                    },
                    error: function(xhr) {
                        alert('Error deleting product: ' + xhr.responseText);
                    }
                });
            }
        });
    });
</script>

{{-- <-- Ajax Code Delete the Record  End--> --}}


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    function toggleStatus(Product, checkbox) {
        let newStatus = checkbox.checked ? 'active' : 'deactive';

        // Send AJAX request to update status
        $.ajax({
            url: checkbox.checked ? '/user/activate/' + Product : '/user/deactivate/' + Product,
            type: 'GET',
            success: function(response) {
                // Update the label and color based on the new status
                const label = document.querySelector(`#status-${Product} .form-check-label`);
                label.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

                if (newStatus === 'active') {
                    label.style.color = 'green';
                } else {
                    label.style.color = 'red';
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error updating the status. Please try again.');
                // Optionally, revert the checkbox state if there is an error
                checkbox.checked = !checkbox.checked;
            }
        });
    }
</script>


@endsection



