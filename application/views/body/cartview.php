<!-- Head -->
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
                <div class="tab-pane fade in show active" id="panel5" role="tabpanel" style="margin-top: -12px; margin-right: 12px; padding: 10px">
                    <br>
                    <div class="card text-center">
                        <div class="card-header default-color-dark white-text" style="background-color: #1CB2CB !important;">
                            <h1>Cart</h1>
                        </div>
                        <div class="card-block">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center !important">#</th>
                                        <th style="text-align: center !important">Title</th>
                                        <th style="text-align: center !important">Description</th>
                                        <th style="text-align: center !important">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($userdata)): ?>
                                    <?php foreach ($userdata as $key => $value): ?>
                                    <?php $this->load->view('_partials/carttable', $value);?>
                                    <?php endforeach ?>
                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
