
<link rel="preload" href="<?php echo e(asset('themes/velocity/assets/fonts/font-rango/rango.ttf') . '?o0evyv'); ?>" as="font" crossorigin="anonymous" />


<link rel="stylesheet" href="<?php echo e(asset('themes/velocity/assets/css/bootstrap.min.css')); ?>" />


<?php if(core()->getCurrentLocale() && core()->getCurrentLocale()->direction == 'rtl'): ?>
    <link href="<?php echo e(asset('themes/velocity/assets/css/bootstrap-flipped.css')); ?>" rel="stylesheet">
<?php endif; ?>


<link rel="stylesheet" href="<?php echo e(asset(mix('/css/velocity.css', 'themes/velocity/assets'))); ?>" />


<?php echo $__env->yieldPushContent('css'); ?>


<style>
    <?php echo core()->getConfigData('general.content.custom_scripts.custom_css'); ?>

</style><?php /**PATH C:\wamp64\www\bagisto/resources/themes/velocity/views/layouts/styles.blade.php ENDPATH**/ ?>