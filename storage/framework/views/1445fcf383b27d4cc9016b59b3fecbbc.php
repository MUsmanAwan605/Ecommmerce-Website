<?php $__env->startSection('main.content'); ?>


<!--------------- login-section --------------->
<section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title">Log In</h5>
                <div class="review-inner-form">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- Email Address -->
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger mt-2"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- Password -->
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- Remember Me -->
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="address"><?php echo e(__('Remember me')); ?></label>
                            </div>
                            <div class="forget-pass">
                                <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot your password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="login-btn text-center">
                            <button type="submit" class="shop-btn">Log In</button>
                            <span class="shop-account">Don't have an account? <a href="<?php echo e(route('register')); ?>">Sign Up Free</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------- login-section-end --------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.body.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/auth/login.blade.php ENDPATH**/ ?>