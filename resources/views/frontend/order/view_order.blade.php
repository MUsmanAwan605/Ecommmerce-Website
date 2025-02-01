<!-- resources/views/order/confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card for order confirmation -->
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-success text-white">
                        <h4>Order Confirmation</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-success text-center">Thank You for Your Order!</h5>
                        <p class="text-center">Your order has been successfully placed. Below are your order details:</p>

                        <div class="row mt-4">
                            <div class="col-12">
                                <p><strong>Order ID:</strong> # 123</p>
                                <p><strong>Name:</strong> jsnsakjxdnslk</p>
                                <p><strong>Address:</strong> dcd kcjnd</p>
                                <p><strong>Payment Method:</strong> djkasnxjksn</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h5 class="mb-3">Order Summary:</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example products, dynamically load this data -->
                                    <tr>
                                        <td>Product 1</td>
                                        <td>2</td>
                                        <td>$50</td>
                                        <td>$100</td>
                                    </tr>
                                    <tr>
                                        <td>Product 2</td>
                                        <td>1</td>
                                        <td>$30</td>
                                        <td>$30</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
                                        <td>$130</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="3" class="text-right"><strong>Shipping:</strong></td>
                                        <td>$10</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                        <td><strong>$140</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-primary">Go to Home</a>
                            <a href="" class="btn btn-secondary">View Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
