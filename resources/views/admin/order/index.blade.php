@extends('admin.admin_dashboard')

@section('admin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Employees</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--Message Start-->
        @if (session('success'))
        <div class="alert alert-success" id="alertMessage">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('alertMessage').style.display = 'none';
            }, 3000);
        </script>
        @endif
        <!--Message End-->
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="d-lg-flex">
                        <div class="col-8">
                            <input type="search" name="search" class="form-control" placeholder="Search By Name">
                        </div>
                        <div class="ms-2">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                        <div class="ms-2">
                            <a href="/hr/employee">
                                <button type="button" class="btn btn-danger">Reset</button>
                            </a>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('admin.order.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i> Add Employee
                        </a>
                    </div>
                </div>

                @if ($Orders->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0" id="hiringTable">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Order Number</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Total</th>
                                <th>View Full Record</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Orders as $Order)
                            <tr>
                                <td style="vertical-align: middle">{{ $Order->order_date }}</td>
                                <td style="vertical-align: middle">{{ $Order->order_number }}</td>
                                <td style="vertical-align: middle">{{ $Order->cus_fname }} {{ $Order->cus_lname }}</td>
                                <td style="vertical-align: middle">{{ $Order->customer_phone }}</td>
                                <td style="vertical-align: middle">{{ $Order->total_amount }}</td>
                                {{-- <a href="{{ route('admin.order.show',$Order->id) }}">
                                <td class="btn btn-danger">View Order</td>
                            </a> --}}
                            <td><a href="{{ route('admin.order.show', $Order->id) }}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a></td>

                                <!-- Modal to view product details -->
                                {{-- <td style="vertical-align: middle">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $Order->id }}">View Product</a>
                                    <div class="modal fade" id="exampleModal{{ $Order->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">
                                                        Order Items</h5>
                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-black">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <table class="table">
                                                                <tbody>
                                                                    @foreach ($orderitems as $orderitem)
                                                                    @if ($orderitem->order_id == $Order->id)
                                                                    <tr>
                                                                        <th class="text-primary text-center"
                                                                            colspan="2">Products Order</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-info">Order Number:</td>
                                                                        <td>{{ $orderitem->order_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-info">Product Name:</td>
                                                                        <td>{{ $orderitem->product_name }}</td>
                                                                    </tr>
                                                                    @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
                                <!-- Modal to view product details -->

                                <!-- Actions -->
                                <td style="vertical-align: middle">
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.order.edit', ['id' => $Order->id]) }}"><i
                                                class='bx bxs-edit'></i></a>
                                        <form method="POST" action="{{ route('admin.order.destroy', ['id' => $Order->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete?')"
                                                style="outline:none;border:none;background:transparent">
                                                <a href="{{ route('admin.order.destroy', ['id' => $Order->id]) }}"
                                                    class="ms-3"><i class='bx bxs-trash'></i></a>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-danger">No Record Found</div>
                @endif
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection
