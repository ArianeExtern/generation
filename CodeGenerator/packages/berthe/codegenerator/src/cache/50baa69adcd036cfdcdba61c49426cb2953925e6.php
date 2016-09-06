<?php echo ""; ?>

<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('formMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>