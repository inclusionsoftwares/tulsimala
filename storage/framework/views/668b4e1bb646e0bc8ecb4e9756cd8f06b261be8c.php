<?php ($locale = core()->getRequestedLocaleCode()); ?>



<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.categories.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1><?php echo e(__('admin::app.catalog.categories.title')); ?></h1>
            </div>

            <div class="page-action">
                <a href="<?php echo e(route('admin.catalog.categories.create')); ?>" class="btn btn-lg btn-primary">
                    <?php echo e(__('admin::app.catalog.categories.add-title')); ?>

                </a>
            </div>

            <div class="control-group">
                <select class="control" id="locale-switcher" name="locale"
                        onchange="reloadPage('locale', this.value)">
                    <option value="all" <?php echo e(! isset($locale) ? 'selected' : ''); ?>>
                        <?php echo e(__('admin::app.admin.system.all-locales')); ?>

                    </option>
                    <?php $__currentLoopData = core()->getAllLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($localeModel->code); ?>" <?php echo e((isset($locale) && ($localeModel->code) == $locale) ? 'selected' : ''); ?>>
                            <?php echo e($localeModel->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <?php echo view_render_event('bagisto.admin.catalog.categories.list.before'); ?>


        <div class="page-content">
            <?php $categories = app('Webkul\Admin\DataGrids\CategoryDataGrid'); ?>

            <?php echo $categories->render(); ?>

        </div>

        <?php echo view_render_event('bagisto.admin.catalog.categories.list.after'); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $("input[type='checkbox']").change(deleteCategory);
        });

        /**
         * Delete category function. This function name is present in category datagrid.
         * So outside scope function should be loaded `onclick` rather than `v-on`.
         */
        let deleteCategory = function(e, type) {
            let indexes;

            if (type == 'delete') {
                indexes = $(e.target).parent().attr('id');
            } else {
                $("input[type='checkbox']").attr('disabled', true);

                let formData = {};
                $.each($('form').serializeArray(), function(i, field) {
                    formData[field.name] = field.value;
                });

                indexes = formData.indexes;
            }

            if (indexes) {
                $.ajax({
                    type : 'POST',
                    url : '<?php echo e(route("admin.catalog.categories.product.count")); ?>',
                    data : {
                        _token: '<?php echo e(csrf_token()); ?>',
                        indexes: indexes
                    },
                    success:function(data) {
                        $("input[type='checkbox']").attr('disabled', false);
                        if (data.product_count > 0) {
                            let message = "<?php echo e(trans('ui::app.datagrid.massaction.delete-category-product')); ?>";

                            if (type == 'delete') {
                                doAction(e, message);
                            } else {
                                $('form').attr('onsubmit', 'return confirm("'+message+'")');
                            }
                        } else {
                            let message = "<?php echo e(__('ui::app.datagrid.click_on_action')); ?>";

                            if (type == 'delete') {
                                doAction(e, message);
                            } else {
                                $('form').attr('onsubmit', 'return confirm("'+message+'")');
                            }
                        }
                    }
                });
            } else {
                $("input[type='checkbox']").attr('disabled', false);
            }
        }

        /**
         * Do action function. Not directly calling the datagrid components.
         * Instead taking a copy and using in this scope.
         */
        function doAction (e, message, type) {
            let element = e.currentTarget;

            if (message) {
                element = e.target.parentElement;
            }

            message = message || '<?php echo e(__('ui::app.datagrid.massaction.delete')); ?>';

            if (confirm(message)) {
                axios.post(element.getAttribute('data-action'), {
                    _token: element.getAttribute('data-token'),
                    _method: element.getAttribute('data-method')
                }).then(function (response) {
                    this.result = response;

                    if (response.data.redirect) {
                        window.location.href = response.data.redirect;
                    } else {
                        location.reload();
                    }
                }).catch(function (error) {
                    location.reload();
                });

                e.preventDefault();
            } else {
                e.preventDefault();
            }
        }

        /**
         * Reload page.
         */
        function reloadPage(getVar, getVal) {
            let url = new URL(window.location.href);

            url.searchParams.set(getVar, getVal);

            window.location.href = url.href;
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bagisto\packages\Webkul\Admin\src/resources/views/catalog/categories/index.blade.php ENDPATH**/ ?>