<div>
   <form action="<?php echo e(route('mail')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="my-2">
        <input type="text" class="form-control" name="name" placeholder="Your Name">
    </div>
    <div class="my-2">
        <input type="email" class="form-control" name="customer_email" placeholder="Your Email">
    </div>
    <div class="my-2">
        <input type="hidden" name="order_id" value="<?php echo e($id); ?>">
        <input type="hidden" name="mode" value="<?php echo e($mode); ?>">
        <textarea name="message" id="" cols="30" rows="10" class="form-control"> </textarea>
    </div>
    <div class="my-2">
        <button class="btn btn-sm btn-success">Send</button>
    </div>
   </form>
</div>
<?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/components/mail-component.blade.php ENDPATH**/ ?>