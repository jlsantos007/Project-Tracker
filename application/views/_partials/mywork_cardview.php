<div class="card" style="width: 41.5rem;">
    <div class="card-header" role="tab" id="heading<?php echo $id; ?>">
        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'col-' . $id; ?>" aria-expanded="true" aria-controls="#<?php echo 'col-' . $id; ?>" class="hidePrepend"> -->
<div class="row">
        <div class="col-sm-1"  style="text-align: center;">
        <?php if ($issue_type_id == 1): ?>
          <img src="public/img/ladybug.png" width="30px" height="30px">
        <?php elseif ($issue_type_id == 2): ?>
          <img src="public/img/magic-wand.jpg" width="30px" height="30px">
        <?php elseif ($issue_type_id == 3): ?>
          <img src="public/img/star.png" width="30px" height="30px">
        <?php endif ?>
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <p style="color: <?php echo $priority_color;?> ;" class="mb-0"><?php echo $issue_title;?></p>
        </div>
        <div class="col-sm-3" style="text-align: center;">
          <?php if (!$assigned_to == null): ?>
          (<?php echo $this->themodeloftruth->dev($assigned_to); ?>)
          <?php endif ?>
        </div>
        <div class="col-sm-5" style="text-align: center;">
          <?php
          if (base_url(uri_string()) == base_url().'home') {
            if ($this->session->userdata('access_type') == 1) {
              echo '<a class="btn btn-primary btn-sm finish" href="'.base_url().'index.php/home'.'" data-raw="'.$id.'">Finish</a>';
              echo '<a class="btn btn-primary btn-sm details" data-toggle="modal" data-target="#myModalDetails" data-raw="'.$id.'">Details</a>';
            }
            elseif ($this->session->userdata('access_type') == 2 || $this->session->userdata('access_type') == 3) {
              echo '<a class="btn btn-primary btn-sm developer" href="'.base_url().'index.php/home'.'" data-raw="'.$id.'">Back to Dev</a>';
              echo '<a class="btn btn-primary btn-sm done" href="'.base_url().'index.php/home'.'" data-raw="'.$id.'">Done</a>';
            }
          }
          elseif (($userdata['linkData'] == 1 && $this->session->userdata('access_type') == 1) || ($userdata['linkData'] == 1 && $this->session->userdata('access_type') == 2) || ($userdata['linkData'] == 1 && $this->session->userdata('access_type') == 3)) {
            echo '<a class="btn btn-primary btn-sm mywork" href="'.base_url().'index.php/common/index/1'.'" data-raw="' . $id . '">Add to My Work</a>';
          }
          elseif ($userdata['linkData'] == 2 && $this->session->userdata('access_type') == 1) {
            echo '<a class="btn btn-primary btn-sm details" data-toggle="modal" data-target="#myModalDetails" data-raw="'.$id.'">Details</a>';
          }
          elseif ($userdata['linkData'] == 3 && $this->session->userdata('access_type') == 3) {
            echo '<a class="btn btn-primary btn-sm approved" href="'.base_url().'index.php/common/index/3'.'" data-raw="'.$id.'">Approved</a>';
          }
          ?>
        </div>
</div>
        <!-- </a> -->
    </div>
</div>
