<?php $__env->startSection('title','Dasbboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="dasboard">

        <div class="row expanded">

                <h2>Dashboard</h2>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>