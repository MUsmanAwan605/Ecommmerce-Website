

    <section class="product-category product-category-two">
        <div class="container">
            <div class="section-title">
                <h5>Our Categories</h5>
                <a href="<?php echo e(route('product')); ?>" class="view">View All</a>
            </div>
            <?php if($categories->count() > 0): ?>

            <div class="category-section category-section-two">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <?php if(empty($category->b_img) || $category->b_img == 'Image will be here'): ?>
                    <img src="/uploads/dummyimg/noimage.png" alt="dress">
                    <?php else: ?>
                    
                    <img src="/uploads/brand_img/<?php echo e($category->b_img); ?>" alt="shoes" />
                    <?php endif; ?>
                    </div>
                    <div class="wrapper-info">
                        <a href="product-sidebar.html" class="wrapper-details"><?php echo e($category->title); ?></a>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="alert alert-danger  text-center align-text-center" style="height: 60px; font-size: 25px">No Category Found</div>
            <?php endif; ?>

        </div>
    </section>
<?php /**PATH C:\xampp\htdocs\website\resources\views/frontend/category/index.blade.php ENDPATH**/ ?>