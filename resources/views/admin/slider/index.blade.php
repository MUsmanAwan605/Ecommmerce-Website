
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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Slider</li>
                    </ol>
                </nav>
            </div>

        </div>

            <!-- Success Alert -->

        <!--end breadcrumb-->
        <div class="card-body">
            @if(session('success'))


            <script>
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 15000); // Hide after 5 seconds
            </script>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    {{-- <form method="GET"  action="{{ route('admin.slider.search') }}"> --}}
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By  Name" >
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="{{ route('admin.slider.index') }}">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                {{-- </div> --}}
                     <div class="ms-auto"><a href="{{route('admin.slider.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Slider</a></div>
                </div>
                @if($Sliders->count()>0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Discount</th>
                                <th>Offer</th>
                                <th>Slider Image</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Sliders as $Slider)
                            <tr>
                                <td style="vertical-align: middle">{{$Slider->discount}}%</td>
                                <td style="vertical-align: middle">{{$Slider->heading}}</td>
                                <td>

                                    <img src="/uploads/slider_img/{{ $Slider->img }}" alt="Slider Image" width="100">
                                </td>
                                <td style="vertical-align: middle">
                                    <button class="btn btn-sm btn-{{ $Slider->status ? 'success' : 'danger' }}" data-id="{{ $Slider->id }}" id="toggle-status-btn">
                                        {{ $Slider->status ? 'Deactivate' : 'Active' }}
                                    </button>
                                </td>



                                <td style="vertical-align: middle">
                                    <div class="d-flex order-actions">
                                        <a href="{{route('admin.slider.edit', $Slider->id)}}" class=""><i class='bx bxs-edit'></i></a>
                                        <form method="post" action="{{ route('admin.slider.destroy', $Slider->id) }}" class="delete-color-form">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="button" class="ms-2 delete-button" data-id="{{ $Slider->id }}" style="padding: 9px 10px; outline:none; border:none; border-radius:5px;">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {!! $Sliders->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        @else
            <div class="alert alert-danger">No record found</div>
            @endif
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.transition = 'opacity 1s';
                successMessage.style.opacity = 0;
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 1000);
            }, 3000); // Adjust the time (3000ms = 3 seconds) before hiding the message
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Delete color
    $(document).on('click', '.delete-button', function() {
        const colorId = $(this).data('id');
        const form = $(this).closest('.delete-color-form');

        if (confirm('Are you sure you want to delete this color?')) {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}' // CSRF token
                },
                success: function(response) {
                    alert('Color deleted successfully!');
                    form.closest('tr').remove(); // Assuming the form is inside a <tr>
                },
                error: function(xhr) {
                    alert('Error deleting color: ' + xhr.responseText);
                }
            });
        }
    });

    // Toggle status
    $(document).on('click', '.toggle-status', function(event) {
        event.preventDefault(); // Prevent default form submission

        const form = $(this).closest('.toggle-status-form');
        const colorId = $(this).data('id');
        const status = $(this).data('status');

        if (confirm(`Are you sure you want to ${status} this color?`)) {
            $.ajax({
                url: form.attr('action'), // Get the form action URL
                type: 'POST',
                data: form.serialize(), // Serialize form data
                success: function(response) {
                    alert(`Color status changed to ${status}!`);

                    // Update the button text and status
                    const newStatus = status === 'Inactive' ? 'Active' : 'Inactive';
                    const newText = newStatus === 'Active' ? 'Deactivate' : 'Activate';
                    const newClass = newStatus === 'Active' ? 'btn-danger' : 'btn-success';

                    $(form).find('input[name="status"]').val(newStatus);
                    $(form).find('.toggle-status')
                        .text(newText)
                        .removeClass('btn-success btn-danger')
                        .addClass(newClass)
                        .data('status', newStatus);
                },
                error: function(xhr) {
                    alert('Error changing status: ' + xhr.responseText);
                }
            });
        }
    });
});


</script>
@endsection
