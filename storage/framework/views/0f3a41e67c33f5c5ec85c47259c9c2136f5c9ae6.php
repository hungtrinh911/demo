<script src="<?php echo e(asset("backend/plugins/parsleyjs/parsley.min.js")); ?>"></script>
<script src="<?php echo e(asset("backend/plugins/parsleyjs/vi.js")); ?>"></script>
<script src="<?php echo e(asset("backend/assets/js/custom.js")); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        if ($('form').length > 0) {
            Parsley.setLocale('<?php echo e(env('LOCALE_DEFAULT')); ?>');
            $('form').parsley();
        }
    });
</script>