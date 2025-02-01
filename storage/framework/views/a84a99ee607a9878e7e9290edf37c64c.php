<style>
    .custom-checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .color-box {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
    }
</style>

<?php $__env->startSection('admin'); ?>
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Ecommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> Product</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <form method="POST" action="<?php echo e(route('admin.product.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Product</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" value="<?php echo e(old('Date')); ?>"
                                                class="form-control <?php $__errorArgs = ['Date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Date"
                                                name="Date">
                                            <span class="text-danger"><?php echo e($errors->first('Date')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Title" class="form-label">Category</label>
                                            <select class="form-select <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="brand"
                                                id="brand" aria-label="Default select example">
                                                <option value="">Open this select Title</option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"
                                                        <?php echo e(old('brand') == $category->id ? 'selected' : ''); ?>>
                                                        <?php echo e($category->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('brand')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Product</label>
                                            <input type="Product" value="<?php echo e(old('Product')); ?>"
                                                class="form-control <?php $__errorArgs = ['Product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Product"
                                                name="Product">
                                            <span class="text-danger"><?php echo e($errors->first('Product')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" value="<?php echo e(old('Stock')); ?>"
                                                class="form-control <?php $__errorArgs = ['Stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Stock"
                                                name="Stock">
                                            <span class="text-danger"><?php echo e($errors->first('Stock')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Product Price</label>
                                            <input type="text" value="<?php echo e(old('Price')); ?>"
                                                class="form-control <?php $__errorArgs = ['Price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Price"
                                                name="Price">
                                            <span class="text-danger"><?php echo e($errors->first('Price')); ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Discount_Price" class="form-label">Discount</label>
                                            <input type="text" value="<?php echo e(old('Discount_Price')); ?>"
                                                class="form-control <?php $__errorArgs = ['Discount_Price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="Discount_Price" name="Discount_Price" placeholder="Enter IN Percent">
                                            <span class="text-danger"><?php echo e($errors->first('Discount_Price')); ?></span>
                                        </div>



                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Short Description</label>
                                            <textarea name="Description" id="descp"
                                                class="form-control <?php $__errorArgs = ['Description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="3" rows="3"><?php echo e(old('Description')); ?></textarea>
                                            <span class="text-danger"><?php echo e($errors->first('Description')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="dscp" class="form-label">Long Description</label>
                                            <textarea name="LongDescription" id="l_desc"
                                                class="form-control <?php $__errorArgs = ['LongDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="5" rows="5"><?php echo e(old('LongDescription')); ?></textarea>
                                            <span class="text-danger"><?php echo e($errors->first('LongDescription')); ?></span>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-1 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="bsValidation1" class="form-label text-black">Products Picture
                                                <span style="font-size: 12px;">Maximum: 5 Images</span>
                                            </label>
                                            <input type="file" class="form-control <?php $__errorArgs = ['Images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   name="Images[]" id="bsValidation1" multiple>

                                            <!-- Display an error if the Images array itself has an error -->
                                            <?php $__errorArgs = ['Images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            <!-- Display errors for each individual file in the Images array -->
                                            <?php if($errors->has('Images.*')): ?>
                                                <?php $__currentLoopData = $errors->get('Images.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="text-danger"><?php echo e($error[0]); ?></span><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Model" class="form-label">Model</label>
                                            <input type="text" value="<?php echo e(old('Model')); ?>"
                                                class="form-control <?php $__errorArgs = ['Model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Model"
                                                name="Model" placeholder="Enter IN Percent">
                                            <span class="text-danger"><?php echo e($errors->first('Model')); ?></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Delivery" class="form-label">Delivery</label>
                                            <input type="text" value="<?php echo e(old('Delivery')); ?>"
                                                class="form-control <?php $__errorArgs = ['Delivery'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="Delivery" name="Delivery" placeholder="Enter Country">
                                            <span class="text-danger"><?php echo e($errors->first('Delivery')); ?></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Size" class="form-label">Size</label>
                                            <select class="form-select <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="size[]" id="Size" multiple>
                                                <?php if($Sizes->isEmpty()): ?>
                                                    <option value="" disabled>No Sizes Found Please Add Size</option>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $Sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($Size->size); ?>"
                                                            <?php echo e(in_array($Size->size, old('size', [])) ? 'selected' : ''); ?>>
                                                            <?php echo e($Size->size); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('size')); ?></span>
                                        </div>
                                        


                                        <div class="row">
                                            <!-- Color Red -->
                                            <?php $__empty_1 = true; $__currentLoopData = $Colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="colors[]"
                                                            value="<?php echo e($Color->id); ?>" id="color_<?php echo e($Color->id); ?>"
                                                            <?php echo e(in_array($Color->id, old('colors', [])) ? 'checked' : ''); ?>>

                                                        <label class="form-check-label"
                                                            for="color_<?php echo e($Color->id); ?>"><?php echo e($Color->name); ?></label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantityRed_<?php echo e($Color->id); ?>"
                                                            class="form-label">Quantity:</label>
                                                        <input type="number" class="form-control"
                                                            id="quantityRed_<?php echo e($Color->id); ?>"
                                                            name="quantity[<?php echo e($Color->id); ?>]"
                                                            value="<?php echo e(old('quantity.' . $Color->id)); ?>">
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                No Color Found
                                            <?php endif; ?>
                                        </div>

                                        








                                        


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>


    </div>
    <!--end page wrapper -->
<?php $__env->stopSection(); ?>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Enable or disable quantity inputs based on checkbox status
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const quantityInput = this.parentNode.nextElementSibling.querySelector('input');
            quantityInput.disabled = !this.checked;
        });
    });
</script>

<script>
    function generateSlug() {
        const title = document.getElementById('title').value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Special characters ko remove kare
            .trim()
            .replace(/\s+/g, '-') // Spaces ko hyphens se replace kare
            .replace(/-+/g, '-'); // Multiple hyphens ko single mein replace kare

        document.getElementById('Slug').value = slug;
    }
</script>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/admin/product/add.blade.php ENDPATH**/ ?>