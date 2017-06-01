<div class="col-md-3 pull-md-9 colTrackOne">
        <div class="trackProfile">
            <div class="form-inline">
                <img src="<?php echo base_url(); ?>public/img/circle.png" style="width: 45px; height: 45px; margin: 10px 20px 10px 30px">
                <p class="profileName"><?php echo $this->session->userdata('firstname'); ?></p>
                <a class="sidebar"><i class="fa fa-chevron-down iconChevTwo" style="color: white" aria-hidden="true"></i></a>
            </div>
        </div>
        <div id="menulist">
        <!-- create issue button -->
        <?php if ($this->session->userdata('access_type') != 1): ?>
            <?php  $this->load->view('_partials/sidebar/createbtnissue');?>
        <?php endif ?>
        <!-- ./end of create issue button -->
        <div class="menu" style="padding: 10px 30px 30px 30px;">
        <!-- menulist -->
        <?php foreach ($sidebar as $key => $value): ?>
            <?php $this->load->view('_partials/sidebar/menulist', $value); ?>
        <?php endforeach ?>
        </div>
        </div>
</div>
