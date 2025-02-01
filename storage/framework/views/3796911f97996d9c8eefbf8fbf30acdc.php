<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
                </li>
                <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
                </li>
                <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="<?php echo e(route('admin.category.index')); ?>"><i class='bx bx-radio-circle'></i>Category</a>
                </li>
                <li> <a href="<?php echo e(route('admin.product.index')); ?>"><i class='bx bx-radio-circle'></i>Products</a>
                </li>
            </li><li> <a href="<?php echo e(route('admin.sale.index')); ?>"><i class='bx bx-radio-circle'></i>Flash Sale</a>
            </li>
            </li><li> <a href="<?php echo e(route('admin.slider.index')); ?>"><i class='bx bx-radio-circle'></i>Slider</a>
            </li>
                <li> <a href="<?php echo e(route('admin.about.index')); ?>"><i class='bx bx-radio-circle'></i>About Us</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class='bx bx-radio-circle'></i>Add New Products</a>
                </li>
                <li> <a href="<?php echo e(route('admin.order.index')); ?>"><i class='bx bx-radio-circle'></i>Orders</a>
                </li>
                <li> <a href="<?php echo e(route('admin.product_size.index')); ?>"><i class='bx bx-radio-circle'></i>Product Size</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Color And Size</div>
            </a>
            <ul>
                <li> <a href="<?php echo e(route('admin.size.index')); ?>"><i class='bx bx-radio-circle'></i>Size</a>
                </li>
                <li> <a href="<?php echo e(route('admin.color.index')); ?>"><i class='bx bx-radio-circle'></i>Color</a>
                </li>
                <li> <a href="content-text-utilities.html"><i class='bx bx-radio-circle'></i>Text Utilities</a>
                </li>
            </ul>
        </li>
       
         <li>
            <a href="form-froala-editor.html">
                <div class="parent-icon"><i class='bx bx-code-alt'></i>
                </div>
                <div class="menu-title">Froala Editor</div>
            </a>
        
        
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
<?php /**PATH C:\xampp\htdocs\website\resources\views/admin/body/sidebar.blade.php ENDPATH**/ ?>