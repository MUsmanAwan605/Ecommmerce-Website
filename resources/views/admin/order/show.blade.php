@extends('admin.admin_dashboard')
@section('admin')

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Billing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Billing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="toolbar hidden-print">
            <div class="text-end">
                <button type="button" class="btn btn-dark" onclick="printInvoice()">
                    <i class="fa fa-print"></i> Print
                </button>
                <a href="{{ route('admin.order.index') }}" class="btn btn-primary">
                     Back
                </a>
            </div>
            <hr/>
        </div>


        <div class="card">
            <div class="card-body">
                <div id="invoice">

                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col">
                                        <a href="javascript:;">
                                            <img src="assets/images/logo-icon.png" width="80" alt="" />
                                        </a>
                                    </div>
                                    <div class="col company-details">
                                        <h1 class="name text-uppercase">
                                        <a target="_blank" href="javascript:;">
                                            Haq Yarn Cone Dyeing
                                        </a>
                                        </h1>
                                        <div>Plot/SHED # Mile-1219, Gali # 49-50, Block-C, JINNAH ROAD</div>
                                        <div>SHER SHAH COLONY, KARACHI, PAKISTAN</div>
                                        <div>(123) 456-789</div>
                                        <div>company@example.com</div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">Billing TO:</div>
                                        <h2 class="to">{{ $Order->cus_fname . ' ' . $Order->cus_lname ?? 'Customer Name' }}</h2>
                                        <div class="address">{{ $Order->customer_address ?? 'Customer Address' }}</div>
                                        <div class="address">{{ $Order->customer_phone ?? 'Customer Address' }}</div>
                                <div class="email"><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $Order->customer_email ?? 'email@example.com' }}&subject=Order%20#{{ $Order->id }}&body=Hello%20{{ $Order->cus_name }},%0A%0AYour%20order%20has%20been%20received%20successfully." target="_blank">{{ $Order->customer_email ?? 'email@example.com' }}</a></div>
                                    </div>
                                    <div class="col invoice-details">
                                        <h1 class="invoice-id">Bill # {{ $Order->id }}</h1>
                                        <div class="date">Date of Billing: {{ \Carbon\Carbon::parse($Order->date)->format('d F Y') ?? 'N/A' }}</div>
                                        {{-- <div class="date">Due Date: {{ \Carbon\Carbon::parse($bill->due_date)->format('d F Y') ?? 'N/A' }}</div> --}}
                                    </div>
                                </div>

                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-left">Products</th>
                                            <th class="text-left">Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($billings->count() > 0)
                                            @foreach ($billings as $key => $billing)
                                                <tr>
                                                    <td class="no">{{ $key + 1 }}</td>
                                                    <td class="qty-left">{{ $billing->product_name ?? 0 }}</td>
                                                    <td class="text-left">{{ $billing->quantity ?? 'N/A' }}</td>
                                                    <td class="unit">{{ $billing->product_price ?? 0 }}</td>
                                                    <td class="total">{{ $billing->total_price ?? 0 }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center alert alert-danger">No Record Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        @if($billings->count() > 0)
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Bill Amount</td>
                                                <td colspan="2">{{ $Order->total_amount ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Pre. Amount</td>
                                                <td colspan="2">{{ $Order->p_amt ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Total Amount</td>
                                                <td colspan="2">{{ $Order->tot_amt ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Receive Amount</td>
                                                <td colspan="2">{{ $Order->r_amt ?? 0 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2">Balance Amount</td>
                                                <td colspan="2">{{ $Order->bal_amt ?? 0 }}</td>
                                            </tr>
                                        @endif
                                    </tfoot>
                                </table>

                                <div class="thanks">Thank you!</div>
                                <div class="notices">
                                    <div>NOTICE:</div>
                                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                </div>
                            </main>

                            <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        var originalContents = document.body.innerHTML;
        var invoiceContents = document.getElementById('invoice').innerHTML;
        document.body.innerHTML = invoiceContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>



<style>
    @media print {
        body * {
            visibility: hidden; /* Hide everything */
        }
        #invoice, #invoice * {
            visibility: visible; /* Show the invoice */
        }
        div.toolbar {
            visibility: hidden !important; /* Force hide toolbar */
        }
        #invoice {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
    }
</style>

@endsection
