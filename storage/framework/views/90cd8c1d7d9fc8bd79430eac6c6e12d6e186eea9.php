<div>
    <sidebar-header heading= "<?php echo e(__('velocity::app.menu-navbar.text-category')); ?>">

        
        <div class="main-category fs16 unselectable fw6 left">
            <i class="rango-view-list text-down-4 align-vertical-top fs18"></i>

            <span class="pl5"><?php echo e(__('velocity::app.menu-navbar.text-category')); ?></span>
        </div>

    </sidebar-header>
</div>

<div class="content-list right">
    <right-side-header :header-content="<?php echo e(json_encode(app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents())); ?>">

        
        <ul type="none" class="no-margin">
        </ul>

    </right-side-header>
</div><?php /**PATH C:\wamp64\www\bagisto\packages\Webkul\Velocity\src/resources/views/shop/layouts/header/desktop.blade.php ENDPATH**/ ?>