<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Tags:')); ?> <?php echo e(' '.$tag_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Tags:')); ?> <?php echo e(' '.$tag_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if(count($all_blogs) < 1): ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <?php echo e(__('No Post Available In').' '.$tag_name.__(' Tags')); ?>

                        </div>
                    </div>
                <?php endif; ?>
                    <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.blog.grid','data' => ['blog' => $data,'margin' => true]]); ?>
<?php $component->withName('frontend.blog.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['blog' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data),'margin' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <nav class="pagination-wrapper" aria-label="Page navigation ">
                       <?php echo e($all_blogs->links()); ?>

                    </nav>
                </div>
                <div class="col-lg-4">
                   <?php echo $__env->make('frontend.pages.blog.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/nexelit304/@core/resources/views/frontend/pages/blog/blog-tags.blade.php ENDPATH**/ ?>