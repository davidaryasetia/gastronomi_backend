

<?php $__env->startSection('row'); ?>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="d-flex align-items-center mb-3 mb-sm-0">
                                <div class="me-3">
                                    <span class="card-title fw-semibold">List Food Culinary</span>
                                </div>
                                <div class="me-2">
                                    <a href="food/create" type="button" class="btn btn-primary"><i
                                            class="ti ti-plus me-1"></i>Add Food</a>
                                </div>

                            </div>
                        </div>

                        <!-- Main Section -->
                        <div class="col-lg-12">
                            <div id="foodContainer">
                                <?php $__currentLoopData = $food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="shadow-none border mb-3 food-item">
                                        <div class="card-body d-flex flex-column flex-md-row align-items-center">
                                            <div class="me-3 mb-3 mb-md-0">
                                                <img src="<?php echo e(asset('storage/' . $data_food->photo_path)); ?>"
                                                    class="img-fluid" alt="..." style="border-radius: 8px"
                                                    width="128px">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="card-title" style="font-weight: 400"> <?php echo e($data_food->name); ?>

                                                    </h5>
                                                </div>
                                                <p class="card-text"> <?php echo e(Str::limit($data_food->description, 140)); ?> </p>
                                                <span><a href="">Detail Food......</a></span>
                                            </div>
                                            <div class="col-md-1 text-center d-flex">
                                                <p class="mb-0 fw-normal me-2"><a href=""><i
                                                            class="ti ti-pencil"></i></a>
                                                <div class="divider"></div>
                                                <p class="mb-0 fw-normal ms-2"><a href=""><i class="ti ti-trash"
                                                            style="color: red"></i></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div id="pagination" class="mt-3"></div>
                        </div>
                        <!-- END Main Section -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php $__env->startPush('script'); ?>
        <script>
            $(document).ready(function() {
                // Initialize pagination
                const itemsPerPage = 5;
                const items = $(".food-item");
                const numItems = items.length;

                items.slice(itemsPerPage).hide();

                $("#pagination").pagination({
                    items: numItems,
                    itemsOnPage: itemsPerPage,
                    cssStyle: 'light-theme',
                    onPageClick: function(pageNumber) {
                        const start = (pageNumber - 1) * itemsPerPage;
                        const end = start + itemsPerPage;
                        items.hide().slice(start, end).show();
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Gapulo_Project_Web\gastronomi_backend\resources\views/sections/food/food.blade.php ENDPATH**/ ?>