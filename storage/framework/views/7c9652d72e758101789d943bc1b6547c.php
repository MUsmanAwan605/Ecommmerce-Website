<?php $__env->startSection('main.content'); ?>


<!--------------- login-section --------------->
<section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title">Forgot Password</h5>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one</p>
                <div class="review-inner-form">
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- Email Address -->
                        <div class="review-form-name">
                            
                             <label for="email">Email</label>
                             <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                             name="email">
                         <span><p class="text-danger"><?php echo e($errors->first()); ?></p></span>

                        </div>

                        <!-- Remember Me -->
                        <div class="review-form-name checkbox">

                            
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Email Password Reset Link</button>

                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- login-section-end --------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>