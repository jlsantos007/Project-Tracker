<!--Navbar-->
<?php
$navbar = array(
                 'page_title' => $page_title,
                 'user_name' => $this->session->userdata('firstname')
               );
$this->load->view('_partials/navbar', $navbar);
?>
<?php echo PHP_EOL;?>
<div class="row" style="height:100%;">
    <div class="col-md-9 push-md-3 colTrackTwo" style="overflow-y: scroll">
        <ul class="row" id="sortable">
            <!-- createissue module -->
            <?php $this->load->view('_partials/createissue_module'); ?>
        </ul>
    </div>
    <!-- end of coltracktwo -->
    <!-- coltrackone -->
    <?php
    echo PHP_EOL;
    $arr = array();
    $arr['sidebar'] = data_builder($this->session->userdata('access_type'));
    $this->load->view('_partials/sidebar', $arr);
    echo PHP_EOL;
    ?>
</div>
<!--end of row -->
