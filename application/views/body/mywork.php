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

                <?php if (!$this->session->userdata('access_type') == 0): ?>
                  <div class="card" style="background-color: gray; width: 44rem;">
                      <div class="card-header default-color-dark white-text" style="background-color: #000000 !important; width: 44rem;">
                        <?php
                          if (base_url(uri_string()) == base_url().'home') {
                            echo "<h5>My Work</h5>";
                          }
                          elseif ($userdata['linkData'] == 1) {
                            echo "<h5>Current/Backlog</h5>";
                          }
                          elseif ($userdata['linkData'] == 2) {
                            echo "<h5>Done</h5>";
                          }
                          elseif ($userdata['linkData'] == 3) {
                            echo "<h5>Issue to Approve</h5>";
                          }
                        ?>
                      </div>
                      <div class="card-block scroll" id="style-3">
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
                                      $this->load->view('_partials/mywork_cardview', $data);
                                     }

                                     ?>
                                 <?php endforeach ?>
                              <?php endif ?>
                          </div>
                      </div>
                      <div class="card-footer text-muted default-color-dark white-text" style="background-color: #000000 !important; width: 44rem;">
                      </div>
                  </div>
                  <?php endif ?>
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
