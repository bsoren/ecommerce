<?php $__env->startSection('title','Dasbboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="dasboard">

        <div class="row expanded">

                <h2>Dashboard</h2>

            <p> <?php echo \App\classes\CSRFToken::_token(); ?></p>
            <p> <?php echo \App\classes\Session::get('token'); ?></p>

            <p> <?php echo \App\classes\CSRFToken::verifyCSRFToken(\App\classes\Session::get('token')); ?></p>


            <form action="/admin" method="post" enctype="multipart/form-data">
                <input name="product" value="testing">
                <input type="file" name="image">
                <input type="submit" value="Go" name="submit">
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>