<style>
    #moreText_<?php echo e($dataInfo->ID); ?> {
      
        /* Display nothing for the element */
        display: none;
    }
</style>
<?php 
    $string = strip_tags($dataInfo->DESCRIPTION);
    
    if (strlen($string) > 50) {
        $stringCut = substr($string, 0, 50);
        $endPoint = strrpos($stringCut, ' ');
        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    }

?>
<div class="editDESCRIPTION">
    
    
</div>

<?php 
    $stringLength = strip_tags($dataInfo->DESCRIPTION); 
?> 
<span id="DESCRIPTION_<?php echo e($dataInfo->ID); ?>" class="text" style="width: 200px;
    display: block;">   
<p>
    <span id="first_<?php echo e($dataInfo->ID); ?>">  <?php echo e($string); ?>  <?php if(strlen($stringLength) > 50): ?>  <span id="points"></span> <?php endif; ?></span> 
      
    

    <span id="moreText_<?php echo e($dataInfo->ID); ?>">  <?php echo e($dataInfo->DESCRIPTION); ?>  </span>
</p>
</span>
<textarea type="text" value="" class="editbox" id="DESCRIPTION_input_<?php echo e($dataInfo->ID); ?>" style="display:none"> <?php echo e($dataInfo->DESCRIPTION); ?></textarea>
 
       
<?php if(strlen($stringLength) > 50): ?> 
    <button onclick="toggleText<?php echo e($dataInfo->ID); ?>()" id="textButton_<?php echo e($dataInfo->ID); ?>">
        ....
    </button>
<?php endif; ?>
  


<script>
    function toggleText<?php echo e($dataInfo->ID); ?>() {
      
        // Get all the elements from the page
        var points = 
            document.getElementById("points");
      
        var showMoreText =
            document.getElementById("moreText_<?php echo e($dataInfo->ID); ?>");
            
        var firstText =
            document.getElementById("first_<?php echo e($dataInfo->ID); ?>");
      
        var buttonText =
            document.getElementById("textButton_<?php echo e($dataInfo->ID); ?>");

        if (points.style.display === "none") {

            showMoreText.style.display = "none";
            firstText.style.display    = "inline";
            points.style.display       = "inline";
            buttonText.innerHTML    = "...";
        }

        else {

            showMoreText.style.display = "inline";
            firstText.style.display     = "none";
            points.style.display       = "none";
            buttonText.innerHTML       = "Show Less";
        }
    }
</script><?php /**PATH /home/mrh0idtypbzb/public_html/resources/views/admin/order/details/descraption.blade.php ENDPATH**/ ?>