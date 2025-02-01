<?php $__env->startSection('main.content'); ?>
    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="/l">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Checkout</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- checkout-section---------------->
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <form action="<?php echo e(route('order.page.add',$orders->first()->user_id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-5">
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">

                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Billing Details</h5>
                                    <div class="review-form">
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="fname" class="form-label">First Name*</label>
                                                <input type="text" id="fname" name="fname" class="form-control"
                                                    value="<?php echo e(Auth::user()->fname); ?>">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="lname" class="form-label">Last Name*</label>
                                                <input type="text" id="lname" name="lname" class="form-control"
                                                    value="<?php echo e(Auth::user()->lname); ?>">
                                            </div>
                                        </div>
                                        <div class=" account-inner-form">
                                            <div class="review-form-name">
                                                <label for="email" class="form-label">Email*</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                    value="<?php echo e(Auth::user()->email); ?>">
                                            </div>
                                            <div class="review-form-name">
                                                <label for="phone" class="form-label">Phone*</label>
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    value="<?php echo e(Auth::user()->phone); ?>">
                                            </div>
                                        </div>

                                        <div class="review-form-name address-form">
                                            <label for="address" class="form-label">Address*</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                value="<?php echo e(Auth::user()->address); ?>">
                                        </div>
                                        <div class=" account-inner-form city-inner-form">
                                            
                                            
                                        </div>


                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout-wrapper">
                                
                                <div class="account-section billing-section">
                                    <h5 class="wrapper-heading">Order Summary</h5>
                                    <div class="order-summery">
                                        <div class="subtotal product-total">
                                            <h5 class="wrapper-heading">PRODUCT</h5>
                                            <h5 class="wrapper-heading">Quantity</h5>
                                            <h5 class="wrapper-heading">Price</h5>
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                        </div>
                                        <hr>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading"><?php echo e($order->prod_title); ?></h5>
                                                            <input type="hidden" name="prod[]" value="<?php echo e($order->prod_title); ?>">

                                                        </div>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading"><?php echo e($order->qty); ?></h5>
                                                            <input type="hidden" name="qty[]" value="<?php echo e($order->qty); ?>">

                                                        </div>
                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading"><?php echo e($order->price); ?></h5>
                                                            <input type="hidden" name="price[]" value="<?php echo e($order->price); ?>">

                                                        </div>

                                                        <div class="product-info">
                                                            <h5 class="wrapper-heading"> <?php echo e($order->total); ?></h5>
                                                            <input type="hidden" name="total[]" value="<?php echo e($order->qty); ?>">

                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="subtotal product-total">
                                            <h5 class="wrapper-heading">SUBTOTAL</h5>
                                            <h5 class="wrapper-heading"><?php echo e($totalPrice); ?></h5>
                                        </div>
                                        <div class="subtotal product-total">
                                            <ul class="product-list">
                                                <li>
                                                    <div class="product-info">
                                                        <p class="paragraph">SHIPPING</p>
                                                        <h5 class="wrapper-heading">Free Shipping</h5>

                                                    </div>
                                                    <div class="price">
                                                        <h5 class="wrapper-heading">+$0</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="subtotal total">
                                            <h5 class="wrapper-heading">TOTAL</h5>
                                            <h5 class="wrapper-heading price"><?php echo e($totalPrice); ?></h5>
                                            <input type="hidden" class="wrapper-heading price border-0 text-end"  name="totalAmount" value="<?php echo e($totalPrice); ?>"  readonly>
                                        </div>

                                        <div class="subtotal payment-type">
                                            <div class="checkbox-item">
                                                <input type="radio" id="bank" name="payment_method" value="DirectBankTransfer" onclick="setPaymentMethod(this)">
                                                <div class="bank">
                                                    <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                                    <p class="paragraph">Make your payment directly into our bank account.
                                                        Please use
                                                        <span class="inner-text">your Order ID as the payment reference.</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="radio" id="cash" name="payment_method" value="CashonDelivery" onclick="setPaymentMethod(this)">
                                                <div class="cash">
                                                    <h5 class="wrapper-heading">Cash on Delivery</h5>
                                                </div>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="radio" id="credit" name="payment_method" value="Credit/DebitCardsorPaypal" onclick="setPaymentMethod(this)">
                                                <div class="credit">
                                                    <h5 class="wrapper-heading">Credit/Debit Cards or Paypal</h5>
                                                </div>
                                            </div>
                                        </div>

                                        



                                        <!-- Hidden input to store the selected payment method -->
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="">
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="<?php echo e($order->fname); ?>">
                                        <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="<?php echo e($order->lname); ?>">

                                        <script>
                                            function setPaymentMethod(element) {
                                                // Set the selected radio button's value in the hidden input
                                                document.getElementById('selectedPaymentMethod').value = element.value;
                                            }
                                        </script>

                                        <button  class="shop-btn">Place Order Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/frontend/order/index.blade.php ENDPATH**/ ?>