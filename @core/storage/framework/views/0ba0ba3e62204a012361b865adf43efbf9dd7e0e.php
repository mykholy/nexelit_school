<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Category:')); ?> <?php echo e($category->lang_front->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Category:')); ?> <?php echo e($category->lang_front->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="appointment-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                <?php $a=1; ?>
                <?php $__empty_1 = true; $__currentLoopData = $all_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6">
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.course.grid','data' => ['course' => $data,'increment' => $a]]); ?>
<?php $component->withName('frontend.course.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['course' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data),'increment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($a)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                    <?php if($a == 4){ $a=1;}else{$a++;} ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-lg-12 text-center">
                    <div class="alert alert-warning"><?php echo e(__('nothing found')); ?> <strong><?php echo e($search_term); ?></strong></div>
                </div>
            <?php endif; ?>
            <div class="col-lg-12 text-center">
                <nav class="pagination-wrapper " aria-label="Page navigation ">
                    <?php echo e($all_courses->links()); ?>

                </nav>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        (function($) {
            'use strict';
            $(document).on('change','select[name="sorting"]',function (e){
                e.preventDefault();
                $('input[name="sort"]').val($(this).val());
            })
            $(document).on('change','select[name="category"]',function (e){
                e.preventDefault();
                $('input[name="cat"]').val($(this).val());
            })
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/nexelit/@core/resources/views/frontend/pages/courses/courses-category.blade.php ENDPATH**/ ?>