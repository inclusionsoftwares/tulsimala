<script
    type="text/javascript"
    src="<?php echo e(asset('themes/velocity/assets/js/velocity-core.js')); ?>">
</script>

<script type="text/javascript">
    (() => {
        /* activate session messages */
        let message = <?php echo json_encode($velocityHelper->getMessage(), 15, 512) ?>;
        if (message.messageType && message.message !== '') {
            window.showAlert(message.messageType, message.messageLabel, message.message);
        }

        /* activate server error messages */
        window.serverErrors = [];
        <?php if(isset($errors)): ?>
            <?php if(count($errors)): ?>
                window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
            <?php endif; ?>
        <?php endif; ?>

        /* add translations */
        window._translations = <?php echo json_encode($velocityHelper->jsonTranslations(), 15, 512) ?>;
    })();
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
    <?php echo core()->getConfigData('general.content.custom_scripts.custom_javascript'); ?>

</script><?php /**PATH C:\wamp64\www\bagisto/resources/themes/velocity/views/layouts/scripts.blade.php ENDPATH**/ ?>