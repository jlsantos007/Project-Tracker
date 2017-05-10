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
                       <!-- Panel trello -->
                        <div class="card text-center">
                            <div class="card-header default-color-dark white-text" style="background-color: #1CB2CB !important;">
                                <h1>Current</h1>
                            </div>
                            <div class="card-block">
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php if ($userdata['results']): ?>
                                        <?php foreach ($userdata['results'] as $data): ?>
                                           <?php
                                           $hasCommon = FALSE;
                                           $temp = explode(" ", $this->session->userdata('cart'));
                                           foreach ($temp as $key => $value)
                                           {
                                               # code...
                                               if($data['id'] == $value)
                                               {
                                                    $hasCommon = TRUE;
                                                    break;
                                               }
                                           }
                                           if(!$hasCommon)
                                           {
                                            $this->load->view('_partials/current_cardview', $data);
                                           }

                                           ?>
                                       <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="card-footer text-muted default-color-dark white-text" style="background-color: #1CB2CB !important;">
                                    <?php echo $userdata['links']; ?>
                            </div>
                        </div>
              <!-- end of panel trello -->
                </div>
            </div>
        </div>
    </div> <!-- end colTrackTwo -->
   <?php
    echo PHP_EOL;
    $arr = array();
    $arr['sidebar'] = data_builder($this->session->userdata('access_type'));
    $this->load->view('_partials/sidebar', $arr);
    echo PHP_EOL;
    ?>
</div> <!-- end of row -->
