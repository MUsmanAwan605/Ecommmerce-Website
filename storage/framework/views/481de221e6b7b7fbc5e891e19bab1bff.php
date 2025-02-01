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
								<li class="breadcrumb-item active" aria-current="page">Category</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  <form method="POST" action="<?php echo e(route('admin.category.store')); ?>" enctype="multipart/form-data" >
				 <?php echo csrf_field(); ?>
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Add Raw Materials</h5>
					  <hr/>
                       <div class="form-body mt-4">
                        <div class="row">
						   <div class="col-lg-8">
                           <div class="border border-3 p-4 rounded">
                               <div class="mb-3">
                                 <label for="date" class="form-label">Date</label>
                                 <input type="date" value="<?php echo e(old('Date')); ?>" class="form-control <?php $__errorArgs = ['Date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Date" name="Date">
                                 <span class="text-danger"><?php echo e($errors->first('Date')); ?></span>
                               </div>

                               <div class="mb-3">
                                 <label for="title" class="form-label">Title</label>
                                 <input type="text" value="<?php echo e(old('title')); ?>" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title" name="title">
                                 <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                               </div>

                               <div class="mb-3">
                                <label for="file" class="form-label">Brand </label>
                                <input type="file" value="<?php echo e(old('file')); ?>" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="file" name="file">
                                <span class="text-danger"><?php echo e($errors->first('file')); ?></span>
                              </div>

                               <div class="mb-3">
                                 <label for="dscp" class="form-label">Description</label>
                                <textarea name="descp" id="descp" value="<?php echo e(old('descp')); ?>" class="form-control <?php $__errorArgs = ['descp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="5" rows="5"></textarea>
                                 <span class="text-danger"><?php echo e($errors->first('descp')); ?></span>
                               </div>

                              <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/admin/category/add.blade.php ENDPATH**/ ?>