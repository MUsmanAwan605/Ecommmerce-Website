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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="card-body">
            <?php if(session('success')): ?>
            <div id="success-message" class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000); // Hide after 5 seconds
            </script>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    
                        <div class="d-lg-flex">
                            <div class="col-8">
                                <input type="search" name="search" class="form-control" placeholder="Search By  Name" >
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                            <div class="ms-2">
                                <a href="/store/rawmaterialbrand">
                                    <button type="button" class="btn btn-danger">Reset</button>
                                </a>
                            </div>
                        </div>
                    </form>
                
                     <div class="ms-auto"><a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Category</a></div>
                </div>
                <?php if($Categories->count()>0): ?>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="vertical-align: middle"><?php echo e(date('d M Y', strtotime($Category->date))); ?></td>
                                <td style="vertical-align: middle"><?php echo e($Category->title); ?></td>
                                <?php if($Category->b_img == 'Image will be here'): ?>
                                    <td>

                                        <img src="/uploads/dummyimg/noimage.png" style="width: 75px;" alt="">
                                    </td>
                                <?php else: ?>
                                <td style="vertical-align: middle">
                                    <img  src="/uploads/brand_img/<?php echo e($Category->b_img); ?>" style="width: 75px;"  alt="">
                                    </td>
                                <?php endif; ?>
                                <td style="vertical-align: middle">
                                    <span class="label" id="status-<?php echo e($Category->id); ?>">
                                        <?php if($Category->status == 'deactive'): ?>
                                            <button style="background-color: blue!important; color: white; padding: 10px 15px; border: none; border-radius: 5px;" class="btn btn-success"
                                                    onclick="toggleStatus(<?php echo e($Category->id); ?>, 'activate')">Deactive</button>
                                        <?php else: ?>
                                            <button style="background-color: red !important; color: white; padding: 10px 15px; border: none; border-radius: 5px;"
                                                    onclick="toggleStatus(<?php echo e($Category->id); ?>, 'deactivate')">Active</button>
                                        <?php endif; ?>
                                    </span>
                                </td>


                                <td style="vertical-align: middle">
                                    <div class="d-flex order-actions">
                                        <a href="<?php echo e(route('admin.category.edit', $Category->id)); ?>" class=""><i class='bx bxs-edit'></i></a>
                                        <form method="post" action="<?php echo e(route('admin.category.destroy', $Category->id)); ?>" class="delete-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('DELETE')); ?>

                                            <button type="button" class="ms-2 delete-button" data-id="<?php echo e($Category->id); ?>" style="padding: 9px 10px; outline:none; border:none; border-radius:5px;">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </form>



                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <?php echo $Categories->withQueryString()->links('pagination::bootstrap-5'); ?>

                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">No record found</div>
            <?php endif; ?>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.style.transition = 'opacity 1s';
                successMessage.style.opacity = 0;
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 1000);
            }, 3000); // Adjust the time (3000ms = 3 seconds) before hiding the message
        }
    });
</script>

  
<script>
    function toggleStatus(categoryId, action) {
        let url = '';
        if (action === 'activate') {
            url = '<?php echo e(route('user.activate', ":id")); ?>'.replace(':id', categoryId);
        } else {
            url = '<?php echo e(route('user.deactivate', ":id")); ?>'.replace(':id', categoryId);
        }

        // Send AJAX request
        $.ajax({
            url: url,
            type: 'GET', // or 'POST' depending on your routes
            success: function(response) {
                // Update the status text and link dynamically
                let statusElement = $('#status-' + categoryId);
                if (action === 'activate') {
                    statusElement.html('<a href="javascript:void(0);" onclick="toggleStatus(' + categoryId + ', \'deactivate\')">Active!</a>');
                } else {
                    statusElement.html('<a href="javascript:void(0);" onclick="toggleStatus(' + categoryId + ', \'activate\')">Deactive!</a>');
                }

                // Show a success message as an alert
                alert(response.message);
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Handle any errors here
            }
        });
    }

    </script>

  



  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Delete color
        $(document).on('click', '.delete-button', function() {
            const CategoryId = $(this).data('id');
            const form = $(this).closest('.delete-form');

            if (confirm('Are you sure you want to delete this color?')) {
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '<?php echo e(csrf_token()); ?>' // CSRF token
                    },
                    success: function(response) {
                        alert('Color deleted successfully!');
                        form.closest('tr').remove(); // Assuming the form is inside a <tr>
                    },
                    error: function(xhr) {
                        alert('Error deleting color: ' + xhr.responseText);
                    }
                });
            }
        });
    });
    </script>

  





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\website\resources\views/admin/category/index.blade.php ENDPATH**/ ?>