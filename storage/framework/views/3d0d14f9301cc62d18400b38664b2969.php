<?php
    // @dd($monthly_visitors->toArray());
?>

<?php $__env->startPush('css'); ?>
    <style>
        #myChart {
            width: 100%;
            height: 100%;
            /* Atur tinggi myChart agar memenuhi container */
        }

        .card-body {
            height: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('row'); ?>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
      
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Tourist Overview Visitors</h5>
                            </div>
                            <form id="filterForm" action="<?php echo e(route('visitor.store')); ?>" method="POST" class="d-flex">
                                <?php echo csrf_field(); ?>
                                <div class="me-1">
                                    <select id="yearSelector" name="year" class="form-select">
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>
                                </div>
                                <div class="me-1">
                                    <select id="monthSelector" name="month" class="form-select">
                                        <option value="all">Semua Bulan</option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo e($i); ?>">
                                                <?php echo e(DateTime::createFromFormat('!m', $i)->format('F')); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div>
                            <canvas id="myChart" style="height: 380px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-9 fw-semibold">Weekly Number Of Visitors</h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3"> <?php echo e($amount_weekly_visitor['count']); ?> </h4>
                                        <div class="d-flex align-items-center mb-3">
                                            
                                            
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="me-4">
                                                <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                <span class="fs-2"> <?php echo e($amount_weekly_visitor['range']); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold"> Mountly Number Of Visitors</h5>
                                        <h4 class="fw-semibold mb-3"> <?php echo e($amount_monthly_visitor['count']); ?> </h4>
                                        <div class="d-flex align-items-center pb-1">
                                            <span
                                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-arrow-down-right text-danger"></i>
                                            </span>
                                            
                                            <p class="fs-3 mb-0"> <?php echo e($amount_monthly_visitor['range']); ?> </p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end">
                                            <div
                                                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-timeline fs-6"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="earning"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <div class="card-title fw-semibold">
                                    Tracking Access Of IP Address Data Visitors in : <a
                                        href="https://gastronomi.projectbase.site/"
                                        target="_blank">https://gastronomi.projectbase.site/</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="table-visitors"
                                class="table table-hover table-bordered text-nowrap mb-0 align-middle">
                                <thead class="text-dart fs-4">
                                    <tr style="color: black">
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                IP Address
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Visit Date
                                            </div>
                                        </th>

                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Location
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Country
                                            </div>
                                        </th>
                                        <th class="border-bottom-0">
                                            <div class="fw-semibold mb-0 text-center">
                                                Timezone
                                            </div>
                                        </th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $visitor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_visitor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($no++); ?> </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($data_visitor->ip_address); ?> </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($data_visitor->visit_date); ?> </h6>
                                            </td>

                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($data_visitor->city); ?>,
                                                    <?php echo e($data_visitor->region); ?> </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($data_visitor->country); ?> </h6>
                                            </td>
                                            <td class="border-bottom-0 text-center">
                                                <h6 class="fw-semibold mb-0"> <?php echo e($data_visitor->timezone); ?> </h6>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $__env->startPush('script'); ?>
        <script>
            //    ----------- Home ------------------------------
            $('#table-visitors').DataTable({
                responsive: true,

                columns: [{
                        width: '2px'
                    },

                    {
                        width: '32px'
                    },
                    {
                        width: '32px'
                    },
                    {
                        width: '32px'
                    },
                    {
                        width: '12px'
                    },
                    {
                        width: '32px'
                    },

                ]
            });
        </script>
        <script src="<?php echo e(asset('assets/js/customize-line-chart.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Gapulo_Project_Web\gastronomi_backend\resources\views/sections/dashboard/dashboard.blade.php ENDPATH**/ ?>