<div class="navbar-left">

    
    <nav-slide-button id="nav-expand-button" icon-class="accordian-right-icon" style="display: none;"></nav-slide-button>

    
    <ul class="menubar">
        <?php $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item <?php echo e($menu->getActive($menuItem)); ?>">
                <a href="<?php echo e(count($menuItem['children']) ? current($menuItem['children'])['url'] : $menuItem['url']); ?>">
                    <span class="icon <?php echo e($menuItem['icon-class']); ?>"></span>

                    <span><?php echo e(trans($menuItem['name'])); ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

</div><?php /**PATH C:\wamp64\www\bagisto\packages\Webkul\Admin\src/resources/views/layouts/nav-left.blade.php ENDPATH**/ ?>