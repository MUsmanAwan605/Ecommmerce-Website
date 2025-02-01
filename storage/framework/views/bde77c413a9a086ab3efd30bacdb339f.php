<?php $__env->startSection('main.content'); ?>
<!--------------- arrival-section--------------->
 <!--------------- products-info-section--------------->
 <section class="product product-info">
    <div class="container">
        <div class="blog-bradcrum">
            <span><a href="index.html">Home</a></span>
            <span class="devider">/</span>
            <span><a href="product-sidebar.html">Shop</a></span>
            <span class="devider">/</span>
            <span><a href="#">Product Details</a></span>
        </div>
        <div class="product-info-section">
            <div class="row ">
                <div class="col-md-6">
                    <div class="product-info-img" data-aos="fade-right">
                        <div class="swiper product-top">
                            <div class="product-discount-content">
                                <h4><?php echo e($Product->discount_percent); ?></h4>
                            </div>
                            <?php
                                $images=json_decode($Product->prod_img);
                            ?>

                            <div class="swiper-wrapper">

                                <div class="swiper-slide slider-top-img">
                                    <img src="<?php echo e(asset('uploads/products_img/' . $images[0])); ?>"
                                        alt="img">
                                </div>
                            </div>

                        </div>
                        <div class="swiper product-bottom">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!$loop->first): ?>
                                <div class="swiper-slide slider-bottom-img">
                                    <img src="<?php echo e(asset('uploads/products_img/' . $image)); ?>"
                                        alt="img">
                                </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-info-content" data-aos="fade-left">
                        <span class="wrapper-subtitle"><?php echo e($Product->category->title); ?></span>
                        <h5><?php echo e($Product->prod); ?>

                        </h5>
                        <div class="ratings">
                            <span>
                                <svg width="75" height="15" viewBox="0 0 75 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                        fill="#FFA800" />
                                    <path
                                        d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                        fill="#FFA800" />
                                    <path
                                        d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                        fill="#FFA800" />
                                    <path
                                        d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                        fill="#FFA800" />
                                    <path
                                        d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                        fill="#FFA800" />
                                </svg>
                            </span>
                            <span class="text">6 Reviews</span>
                        </div>
                        <div class="price">
                            <span class="price-cut"><?php echo e($Product->prod_price); ?></span>
                            <span class="new-price"><?php echo e($Product->prod_price); ?></span>
                        </div>
                        <p class="content-paragraph"> <?php echo e($Product->desc); ?>

                             <span class="inner-text"></span></p>
                        <hr>
                        <div class="product-availability">
                            <span>Availabillity : </span>
                            <span class="inner-text"><?php echo e($Product->stock); ?> Products Available</span>
                        </div>
                        <div class="product-size">
                            <P class="size-title">Size</P>

                            <div class="size-section">
                                <span class="size-text">Select your size</span>
                                <div class="toggle-btn">
                                    <span class="toggle-btn2"></span>
                                    <span class="chevron">
                                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.4 6.8L0 1.4L1.4 0L5.4 4L9.4 0L10.8 1.4L5.4 6.8Z"
                                                fill="#222222" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <?php
                            // $sizes=json_decode($Product->size)
                        ?>
                            <ul class="size-option">
                                <li class="option">
                                    

                                    
                                    
                                    
                                </li>
                            </ul>
                        </div>

                        <div class="product-quantity">
                            <div class="quantity-wrapper">

                                   <form action="<?php echo e(route('wish.page.add', $Product->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                                    <div class="wishlist">
                                        <button>
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                d="M17 1C14.9 1 13.1 2.1 12 3.7C10.9 2.1 9.1 1 7 1C3.7 1 1 3.7 1 7C1 13 12 22 12 22C12 22 23 13 23 7C23 3.7 20.3 1 17 1Z"
                                                stroke="#797979" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        
                                <div></div>
                                <div></div>

                                <form action="<?php echo e(route('cart.page.add',$Product->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                <div class="quantity">
                                    <a href="javascript:void(0)" class="minus">-</a>
                                    <input type="number" class="number quantity" name="qty" value="1" min="1" />
                                    <a href="javascript:void(0)" class="plus">+</a>
                                </div>

                            </div>
                             <div></div>
                             <div></div>

                                <button class="btn shop-btn">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.25357 3.32575C8.25357 4.00929 8.25193 4.69283 8.25467 5.37583C8.25576 5.68424 8.31536 5.74439 8.62431 5.74439C9.964 5.74603 11.3031 5.74275 12.6428 5.74603C13.2728 5.74767 13.7397 6.05663 13.9246 6.58104C14.2209 7.42098 13.614 8.24232 12.6762 8.25052C11.5919 8.25982 10.5075 8.25271 9.4232 8.25271C9.17714 8.25271 8.93107 8.25216 8.68501 8.25271C8.2913 8.2538 8.25412 8.29154 8.25412 8.69838C8.25357 10.0195 8.25686 11.3412 8.25248 12.6624C8.25029 13.2836 7.92603 13.7544 7.39891 13.9305C6.56448 14.2088 5.75848 13.6062 5.74863 12.6821C5.73824 11.7251 5.74645 10.7687 5.7459 9.81173C5.7459 9.41965 5.74754 9.02812 5.74535 8.63604C5.74371 8.30849 5.69012 8.2538 5.36204 8.25326C4.02235 8.25162 2.68321 8.25545 1.34352 8.25107C0.719613 8.24943 0.249902 7.93008 0.0710952 7.40348C-0.212153 6.57065 0.388245 5.75916 1.31017 5.74658C2.14843 5.73564 2.98669 5.74384 3.82495 5.74384C4.30779 5.74384 4.79062 5.74384 5.274 5.74384C5.72184 5.7433 5.7459 5.71869 5.7459 5.25716C5.7459 3.95406 5.74317 2.65096 5.74699 1.34786C5.74863 0.720643 6.0625 0.253102 6.58799 0.0704598C7.40875 -0.213893 8.21803 0.370671 8.25248 1.27349C8.25303 1.29154 8.25303 1.31013 8.25303 1.32817C8.25357 1.99531 8.25357 2.66026 8.25357 3.32575Z" fill="white" />
                                        </svg>
                                </span>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                        <hr>
                        <div class="product-details">
                            <p class="category">Category : <span class="inner-text"><?php echo e($Product->category->title); ?></span></p>
                            <p class="tags">Tags : <span class="inner-text">abc</span></p>
                            
                        </div>
                        <hr>
                    </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- products-info-end--------------->
<!--------------- arrival-section-end--------------->
<script>
    const minusBtn = document.querySelector('.minus');
    const plusBtn = document.querySelector('.plus');
    const inputField = document.querySelector('.number');

    minusBtn.addEventListener('click', () => {
        let currentValue = parseInt(inputField.value);
        if (currentValue > 1) {
            inputField.value = currentValue - 1;
        }
    });

    plusBtn.addEventListener('click', () => {
        let currentValue = parseInt(inputField.value);
        inputField.value = currentValue + 1;
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Jab form submit ho
        $('.wishlist-form').on('submit', function() {
            // Form submit hote hi button ka rang change kar do
            $(this).find('.wishlist-btn').css('background-color', 'red');
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/frontend/product/show.blade.php ENDPATH**/ ?>