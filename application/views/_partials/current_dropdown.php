<div class="btn-group pull-right">
        <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
		<div class="dropdown-menu">
		    <a class="dropdown-item history" data-raw="<?php echo $track_issue_id; ?>" href="#">History</a>
        <?php if($this->session->userdata('access_type') == 1): ?>
        <?php echo  '<a class="dropdown-item finish" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Finish</a>';?>
        <?php endif ?>
        <?php if($this->session->userdata('access_type') == 2): ?>
        <?php echo  '<a class="dropdown-item developer" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Back to Dev</a>';?>
        <?php echo  '<a class="dropdown-item done" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Done</a>';?>
        <?php endif ?>
		</div>
</div>
