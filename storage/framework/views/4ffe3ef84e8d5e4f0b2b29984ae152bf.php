<?php $__env->startSection('main.content'); ?>
   <!--------------- blog-tittle-section---------------->
   <section class="blog about-blog">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="/">Home</a></span>
            <span class="devider">/</span>
            <span><a href="#">Cart</a></span>
        </div>
        <div class="blog-heading about-heading">
            <h1 class="heading">Cart</h1>
        </div>
    </div>
</section>
<!--------------- blog-tittle-section-end---------------->

<!--------------- cart-section---------------->
<section class="product-cart product footer-padding">
    <div class="container">
        <div class="cart-section">
            <table>
                <tbody>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading">PRODUCT Image</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Product</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Price</h5>
                        </td>
                        <td class="table-wrapper wrapper-product" >
                            <h5 class="table-heading">Quantity</h5>
                        </td>
                        <td class="table-wrapper">
                            <h5 class="table-heading">Total</h5>
                        </td>
                        <td class="table-wrapper" >
                            <h5 class="table-heading">Action</h5>
                        </td>
                    </tr>
                    <?php $__currentLoopData = $Carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="table-row table-top-row">
                        <td class="table-wrapper wrapper-product">
                            <?php
                                $image=json_decode($Cart->prod_img);
                            ?>
                            <div class="wrapper-img">
                                <img src="<?php echo e(asset('uploads/products_img/'. $image[0])); ?>" alt="img" style="width: 100%;">
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-product">
                            <h5 class="table-heading"><?php echo e($Cart->prod_title); ?></h5>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading"><?php echo e($Cart->price); ?></h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading"><?php echo e($Cart->qty); ?></h5>
                            </div>
                        </td>
                        <td class="table-wrapper wrapper-total">
                            <div class="table-wrapper-center">
                                <h5 class="table-heading"><?php echo e($Cart->total); ?></h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <form action="<?php echo e(route('cart.remove', $Cart->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="wishlist-btn cart-btn">
            <form action="<?php echo e(route('cart.page.delete',$Cart->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo e(method_field('DELETE')); ?>

                <button class="clean-btn">
                    Clear Cart
                </button>
                
            </form>
            
            <a href="<?php echo e(route('order.page', $Cart->user_id)); ?>" class="shop-btn">Proceed to Checkout</a>
        </div>

    </div>
</section>
<!--------------- cart-section-end---------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/frontend/cart/index.blade.php ENDPATH**/ ?>