<!doctype html>
<html lang="en">    
<head>
        
    <meta charset="utf-8" />
    <title>Laravel Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="">


    <!-- Plugins css -->
    <link href="<?php echo e(asset('assets/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/js/toast/toaster.css')); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
</head>
<style type="text/css">
    .invalid{
        color: red;
    }
</style>
<body data-layout="horizontal" data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        <?php echo $__env->yieldContent('content'); ?>;
    </div>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <!-- JAVASCRIPT -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenujs/metismenujs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/feather-icons/feather.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/pages/chartjs.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo e(asset('assets/libs/dropzone/min/dropzone.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset ('assets/js/toast/toaster.min.js')); ?>"></script>
    <script>
        <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch(type){
            case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;

            case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;
            case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;
            case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
        }
        <?php endif; ?>
    </script>
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\gt-task\resources\views/layouts/app.blade.php ENDPATH**/ ?>