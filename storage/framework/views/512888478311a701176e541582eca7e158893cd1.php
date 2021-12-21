<?php echo view_render_event('bagisto.shop.layout.header.account-item.before'); ?>


    <div class="dropdown">
        <div id="account">
            <div class="d-inline-block welcome-content" @click="togglePopup">
                <i class="material-icons align-vertical-top">perm_identity</i>

                <span class="text-center">
                    <?php if(auth()->guard('customer')->guest()): ?>
                        <?php echo e(__('velocity::app.header.welcome-message', ['customer_name' => trans('velocity::app.header.guest')])); ?>!
                    <?php endif; ?>

                    <?php if(auth()->guard('customer')->check()): ?>
                        <?php echo e(__('velocity::app.header.welcome-message', ['customer_name' => auth()->guard('customer')->user()->first_name])); ?>

                    <?php endif; ?>
                </span>

                <span class="select-icon rango-arrow-down"></span>
            </div>
        </div>

        <div id="account-modal" class="account-modal sensitive-modal hide mt5">
            <?php if(auth()->guard('customer')->guest()): ?>
                <div class="modal-content">
                    <div class="modal-header no-border pb0">
                        <label class="fs18 grey"><?php echo e(__('shop::app.header.title')); ?></label>

                        <button type="button" class="close disable-box-shadow" data-dismiss="modal" aria-label="Close" @click="togglePopup">
                            <span aria-hidden="true" class="white-text fs20">×</span>
                        </button>
                    </div>

                    <div class="pl10 fs14">
                        <p><?php echo e(__('shop::app.header.dropdown-text')); ?></p>
                    </div>

                    <div class="modal-footer">
                        <div>
                            <a href="<?php echo e(route('customer.session.index')); ?>">
                                <button
                                    type="button"
                                    class="theme-btn fs14 fw6">

                                    <?php echo e(__('shop::app.header.sign-in')); ?>

                                </button>
                            </a>
                        </div>

                        <div>
                            <a href="<?php echo e(route('customer.register.index')); ?>">
                                <button
                                    type="button"
                                    class="theme-btn fs14 fw6">
                                    <?php echo e(__('shop::app.header.sign-up')); ?>

                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(auth()->guard('customer')->check()): ?>
                <div class="modal-content customer-options">
                    <div class="customer-session">
                        <label class="">
                            <?php echo e(auth()->guard('customer')->user()->first_name); ?>

                        </label>
                    </div>

                    <ul type="none">
                        <li>
                            <a href="<?php echo e(route('customer.profile.index')); ?>" class="unset"><?php echo e(__('shop::app.header.profile')); ?></a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('customer.orders.index')); ?>" class="unset"><?php echo e(__('velocity::app.shop.general.orders')); ?></a>
                        </li>

                        <?php
                            $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;

                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;
                        ?>

                        <?php if($showWishlist): ?>
                            <li>
                                <a href="<?php echo e(route('customer.wishlist.index')); ?>" class="unset"><?php echo e(__('shop::app.header.wishlist')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($showCompare): ?>
                            <li>
                                <a href="<?php echo e(route('velocity.customer.product.compare')); ?>" class="unset"><?php echo e(__('velocity::app.customer.compare.text')); ?></a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a href="<?php echo e(route('customer.session.destroy')); ?>" class="unset"><?php echo e(__('shop::app.header.logout')); ?></a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php echo view_render_event('bagisto.shop.layout.header.account-item.after'); ?>

<?php /**PATH C:\wamp64\www\bagisto/resources/themes/velocity/views/layouts/top-nav/login-section.blade.php ENDPATH**/ ?>