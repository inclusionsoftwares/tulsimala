<div class="navbar-top">
    <div class="navbar-top-left">
        <div class="brand-logo">
            <a href="<?php echo e(route('admin.dashboard.index')); ?>">
                <?php if(core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode())): ?>
                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image', core()->getCurrentChannelCode()))); ?>" alt="<?php echo e(config('app.name')); ?>" style="height: 40px; width: 110px;"/>
                <?php else: ?>
                    <img src="<?php echo e(asset('vendor/webkul/ui/assets/images/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>"/>
                <?php endif; ?>
            </a>
        </div>
    </div>

    <div class="navbar-top-right">
        <div class="profile">
            <span class="avatar">
            </span>

            <div class="profile-info">
                <?php
                    $allLocales = core()->getAllLocales()->pluck('name', 'code');

                    $currentLocaleCode = core()->getRequestedLocaleCode('admin_locale');
                ?>

                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="name">
                            <?php echo e(__('admin::app.datagrid.locale')); ?>

                        </span>

                        <span class="role">
                            <?php echo e($allLocales[$currentLocaleCode]); ?>

                        </span>
                    </div>

                    <i class="icon arrow-down-icon active"></i>
                </div>

                <div class="dropdown-list bottom-right">
                    <div class="dropdown-container">
                        <ul>
                            <?php $__currentLoopData = $allLocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(url()->current() . '?' . http_build_query(array_merge(request()->all(), ['admin_locale' => $code]))); ?>">
                                        <?php echo e($name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="profile-info">
                <div class="dropdown-toggle">
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="name">
                            <?php echo e(auth()->guard('admin')->user()->name); ?>

                        </span>

                        <span class="role">
                            <?php echo e(auth()->guard('admin')->user()->role['name']); ?>

                        </span>
                    </div>
                    <i class="icon arrow-down-icon active"></i>
                </div>

                <div class="dropdown-list bottom-right">
                    <span class="app-version"><?php echo e(__('admin::app.layouts.app-version', ['version' => 'v' . config('app.version')])); ?></span>

                    <div class="dropdown-container">
                        <label>Account</label>
                        <ul>
                            <li>
                                <a href="<?php echo e(route('shop.home.index')); ?>" target="_blank"><?php echo e(__('admin::app.layouts.visit-shop')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('admin.account.edit')); ?>"><?php echo e(__('admin::app.layouts.my-account')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('admin.session.destroy')); ?>"><?php echo e(__('admin::app.layouts.logout')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\bagisto\packages\Webkul\Admin\src/resources/views/layouts/nav-top.blade.php ENDPATH**/ ?>