<?php $__env->startComponent('mail::message'); ?>
<h1>Hello <?php echo e($recieverName); ?> </h1>

    
<?php $__env->startComponent('mail::panel'); ?>
<?php echo e($emailContent); ?>.
<?php echo $__env->renderComponent(); ?>


Thanks,<br>
<?php echo e(config('app.name')); ?><br>
Laravel Team.
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\xampp\htdocs\emailservice\resources\views/emails/dynamicMail.blade.php ENDPATH**/ ?>