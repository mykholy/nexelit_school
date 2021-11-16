<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <?php echo render_og_meta_image_by_attachment_id(get_static_option('service_page_'.$user_select_lang_slug.'_meta_image')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="service-area service-page padding-120">
        <div class="container">
            <div class="row">
                <?php $a = 1; ?>
                <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.service.grid','data' => ['increment' => $a,'service' => $data]]); ?>
<?php $component->withName('frontend.service.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['increment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($a),'service' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                    <?php
                        if($a == 4){ $a = 1;}else{$a++;}; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        <?php echo e($all_services->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/nexelit/@core/resources/views/frontend/pages/service/services.blade.php ENDPATH**/ ?>