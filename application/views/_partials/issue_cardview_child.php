<div class="card card-default text-left z-depth-2" style="border: 2px solid #1CB2CB; width: 70% !important; margin: 5px auto;" >
 <div class="card-block">
  <?php if($issue_status == "PENDING"): ?>
  <p>DETAILS (PENDING):</p>
  <?php elseif($issue_status == "DONE"): ?>
  <p>DETAILS (DONE):</p>
  <?php endif ?>
  <?php echo $issue_desc; ?>
  <?php if (!$image == null): ?>
  <?php echo '<img src="uploads/'.$image.'" alt="sample">';?>
  <?php endif ?>

        <?php if (empty($dropdown)): ?>
        	<?php
          if($track_issue_id == null) {
          $this->load->view('_partials/dropdown');
          }
          if(!$track_issue_id == null) {
          $this->load->view('_partials/dropdown');
          }
          elseif ($track_issue_id == null) {
            // no dropdown-item
          }
          ?>
        <?php else: ?>
        	<?php
        	echo '<div class="btn-group pull-right" val>';
        	echo '</div>';
        	?>
        <?php endif ?>
 </div>
</div>
