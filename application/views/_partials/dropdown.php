<div class="btn-group pull-right">
        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
		<div class="dropdown-menu">
		    <a class="dropdown-item history" data-raw="<?php echo $track_issue_id; ?>" href="#">History</a>
		    <a class="dropdown-item details" href="#">Details</a>
		    <?php if (($this->session->userdata('access_type') == 2) || ($this->session->userdata('access_type') == 3)) : ?>
		    <?php endif ?>
		    <?php if ($this->session->userdata('access_type') != 0): ?>
		        <?php echo  '<a class="dropdown-item cart" href="#" data-raw="' . $id . '">Add to cart</a>';?>
		    <?php endif ?>
		           
		</div>
</div>