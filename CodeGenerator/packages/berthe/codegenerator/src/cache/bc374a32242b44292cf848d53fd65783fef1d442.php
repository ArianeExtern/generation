<?php $__env->startSection('controllerName'); ?><?php echo e(ucfirst($table['title'])."Controller"); ?><?php $__env->stopSection(); ?>


<?php echo $__env->make('controllerMaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>