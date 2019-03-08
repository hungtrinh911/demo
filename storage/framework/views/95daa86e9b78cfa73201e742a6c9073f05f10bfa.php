<div class="select-lang">
    <ul class="list-unstyled">
        <li>
            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus"></i></button>
        </li>
        <?php $__currentLoopData = \App\Helper::localeList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="<?php if(\App\Helper::currentLocale() === $item->locale): ?> active <?php endif; ?>">
                <a href="?lang=<?php echo e($item->locale); ?>"><img src="<?php echo e($item->flag); ?>"/> <?php echo e($item->name); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>