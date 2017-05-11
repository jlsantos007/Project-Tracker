<div class="card card-default text-left z-depth-2" style="border: 2px solid #1CB2CB; width: 70% !important; margin: 5px auto;" >
 <div class="card-block">
  <?php echo $issue_desc; ?>

        <?php if (empty($dropdown)): ?>
        	<?php $this->load->view('_partials/current_dropdown'); ?>
        <?php else: ?>
        	<?php
        	echo '<div class="btn-group pull-right">';
        	echo '</div>';
        	?>
        <?php endif ?>
 </div>
</div>
