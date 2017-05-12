<div class="btn-group pull-right">
    <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sort pull-right" aria-hidden="true"></i></a>
    <div class="dropdown-menu">
        <a class="dropdown-item history" data-raw="<?php echo $track_issue_id; ?>" href="#">History</a>
        <?php if ($this->session->userdata('access_type') != 0): ?>
        <?php if ($userdata['linkData'] == 1 && $this->session->userdata('access_type') == 1) {
           echo  '<a class="dropdown-item finish" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Finish</a>';
         }
         elseif ($userdata['linkData'] == 1 && $this->session->userdata('access_type') == 2) {
           echo  '<a class="dropdown-item developer" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Back to Dev</a>';
           echo  '<a class="dropdown-item done" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Done</a>';
         }
         elseif ($userdata['linkData'] == 3 && $this->session->userdata('access_type') == 3) {
           echo  '<a class="dropdown-item approved" href="'.base_url().'index.php/common/index/3'.'" data-raw="' . $id . '">Approved</a>';
         }
         elseif ($userdata['linkData'] != 1 && $userdata['linkData'] != 2 && $userdata['linkData'] != 3) {
           echo  '<a class="dropdown-item cart" href="#" data-raw="' . $id . '">Add to cart</a>';
         }
        ?>
        <?php endif ?>
    </div>
</div>
