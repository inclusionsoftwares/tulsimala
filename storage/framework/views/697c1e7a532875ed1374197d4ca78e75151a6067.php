<div class="mini-cart-container">
    <mini-cart
        is-tax-inclusive="<?php echo e(Webkul\Tax\Helpers\Tax::isTaxInclusive()); ?>"
        view-cart-route="<?php echo e(route('shop.checkout.cart.index')); ?>"
        checkout-route="<?php echo e(route('shop.checkout.onepage.index')); ?>"
        check-minimum-order-route="<?php echo e(route('shop.checkout.check-minimum-order')); ?>"
        cart-text="<?php echo e(__('shop::app.minicart.cart')); ?>"
        view-cart-text="<?php echo e(__('shop::app.minicart.view-cart')); ?>"
        checkout-text="<?php echo e(__('shop::app.minicart.checkout')); ?>"
        subtotal-text="<?php echo e(__('shop::app.checkout.cart.cart-subtotal')); ?>">
    </mini-cart>
</div><?php /**PATH C:\wamp64\www\bagisto/resources/themes/velocity/views/checkout/cart/mini-cart.blade.php ENDPATH**/ ?>