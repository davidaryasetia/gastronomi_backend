<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gastronomi Lombok - <?php echo e($title); ?> </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/images/asset_gastronomi/ic_icon.png')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/quill/dist/quill.snow.css')); ?>">

    <!-- Load FilePond library -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <!-- Tagify -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
   

    <style>
        .alert-container {
            position: fixed;
            top: 90px;
            right: 54px;
            width: 320px;
            z-index: 9999;
        }

        .alert {
            margin-bottom: 10px;
        }
    </style>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--  Sidebar End -->


        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--  Header End -->

            <div id="main" class="container-fluid">
                <?php echo $__env->yieldContent('row'); ?>
                </main>
            </div>

        </div>
    </div>
    <script src="<?php echo e(asset('assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/dist/simplebar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/quill/dist/quill.min.js')); ?>"></script>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldPushContent('script'); ?>;
</body>

</html>
<?php /**PATH D:\Gapulo_Project_Web\gastronomi_backend\resources\views/layouts/main.blade.php ENDPATH**/ ?>