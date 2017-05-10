<div class="card">
        <div class="card-header" role="tab" id="heading<?php echo $id; ?>">
            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'col-' . $id; ?>" aria-expanded="true" aria-controls="#<?php echo 'col-' . $id; ?>" class="hidePrepend">
                <h5 class="mb-0"><?php echo $issue_title; ?></h5>
            </a>
        </div>
        <div id="<?php echo 'col-' . $id; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>">
            <div class="card-block">
                    <?php $this->load->view('_partials/current_cardview_child'); ?>
            </div>
         </div>
    </div>
