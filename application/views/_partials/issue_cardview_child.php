<div class="card card-default text-left z-depth-2" style="border: 2px solid #1CB2CB; width: 70% !important; margin: 5px auto;" >
 <div class="card-block">
  <?php echo $issue_desc; ?>
    
        <?php if (empty($dropdown)): ?>
        	<?php $this->load->view('_partials/dropdown'); ?>
        <?php else: ?>
        	<?php 
        	echo '<div class="btn-group pull-right">';
        	echo '<button type="button" class="btn btn-info details" style="height: 30px; margin-top: 10px; line-height: 5px;">Details</button>';
        	echo '</div>';
        	?>
        <?php endif ?>
 </div>
</div>