<?php
$navbar = array(
                 'page_title' => $page_title,
                 'user_name' => $this->session->userdata('firstname')
               );
$this->load->view('_partials/navbar', $navbar);
?>
<?php echo PHP_EOL;?>
<div class="row" style="height:100%;">
    <div class="col-md-9 push-md-3 colTrackTwo">
        <div class="tabIssue" id="tabIssue">
            <!--Tab Title -->
            <!-- Tab panels -->
            <div class="tab-content">
                <!--Panel 1-->
                <div class="tab-pane fade in show active" id="panel5" role="tabpanel" style="margin-top: -12px">
                    <br>
                    <ul id="sortable" style="width: 500px">
                        <!-- list of bugs -->
                        <?php if (!empty($userdata['panelData'])): ?>
                        <?php foreach ($userdata['panelData'] as $key => $value): ?>
                        <?php $this->load->view('_partials/bugs', $value); ?>
                        <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end colTrackTwo -->
    <?php
    echo PHP_EOL;
    $arr = array();
    $arr['sidebar'] = data_builder($this->session->userdata('access_type'));
    $this->load->view('_partials/sidebar', $arr);
    echo PHP_EOL;
    ?>
</div>
<!-- end of row -->
