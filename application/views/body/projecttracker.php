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
					<!--Modal Create Issue-->
				  <div id="myIssue" class="modal fade" role="dialog" style="z-index: 10000000 !important;">
				      <div class="modal-dialog">

				          <!-- Modal content-->
				          <div class="modal-content">
				              <div class="modal-header">
				                  <button type="button" class="close" data-dismiss="modal">&times;</button>
				                  <h4 class="modal-title">Create Issue</h4>
				              </div>
				              <div class="modal-body">
				                  <form class="form-horizontal">
				                    <div class="md-form">
				                       <input type="text" id="form3" class="form-control" value="<?php echo empty($userdata['issue_title']) ? '' : urldecode($userdata['issue_title']); ?>">
				                       <label for="form3">Issue Title:</label>
				                   </div>

				                  <!-- dorpdowns -->
				                    <?php
				                     $i = 0;
				                     foreach ($userdata['tables'] as $key => $value):
				                     ?>
				                    <?php
				                      $element = array('tableview' => $value, 'label' => $userdata['labels'][$i], 'index' => $i);
				                      if(!empty($userdata['track_id']))
				                      {
				                       $element['test'] = $userdata['rel_data'][$i];
				                      }
				                      $this->load->view('_partials/_form/dropdownview', $element);
				                       $i++;
				                     ?>
				                    <?php endforeach ?>
				                   <!-- ./dorpdowns -->

				                    <div class="md-form">
				                        <input type="text" id="form1" class="form-control">
				                        <label for="form1" class="">Issue Description:</label>
				                    </div>

														<input type="text" id="tracks" name="tracked" value="<?php echo $userdata['track_id']; ?>" class="form-control" hidden></input>

				                        <input type = "file" name = "file" size = "20" id="file"/>
				                        <br>
				                        <br>
				                        <div>
				                          <button type="submit" class="btn btn-success savex pull-right">Save</button>
				                          <button type="submit" class="btn btn-danger cancel pull-right">Cancel</button>
				                        </div>
				                  </form>
				              </div>
				          </div>
				        </div>
				      </div>
        </ul>
    </div> <!-- end of coltracktwo -->
    <!-- coltrackone -->
    <?php
    echo PHP_EOL;
    $arr = array();
    $arr['sidebar'] = data_builder($this->session->userdata('access_type'));
    $this->load->view('_partials/sidebar', $arr);
    echo PHP_EOL;
    ?>
</div> <!--end of row -->
