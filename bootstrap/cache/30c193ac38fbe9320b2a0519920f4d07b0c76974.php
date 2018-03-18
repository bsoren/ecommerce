<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Panel - <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" href="/css/all.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="/js/all.js"></script>

</head>
<body>

    <?php echo $__env->make('includes.admin-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="off-canvas-content admin_title_bar" data-off-canvas-content>

        <div class="title-bar">
            <div class="title-bar-left">
                <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
                <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
            </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

</body>
</html>