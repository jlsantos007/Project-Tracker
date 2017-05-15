        <?php if (!empty($userdata['track_id'])): ?>
            <?php echo '<input type="hidden" id="track_id" value="'. urldecode($userdata['track_id']) .'"/>'; ?>
            <?php echo PHP_EOL; ?>
            <?php echo '<input type="hidden" id="approved" value="'. urldecode($userdata['issue_approved_by_id']) .'"/>'; ?>
        <?php endif ?>
       <li class="ui-state-default">
                <div class="tabIssue" id="tabIssue">
                    <!-- tab title -->
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel5" role="tabpanel" style="margin-top: -12px">
                            <br>
                            <div class="card" style="width: 450px">
                                <div class="buttons pull-right" style="margin-top: 10px">
                                    <a href="#" class="btn btnsave pull-right">Save</a>
                                    <a href="#" class="btn btncancel pull-right">Cancel</a>
                                </div>
                                <div class="card-block">
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
                                        <input type = "file" name = "file" size = "20" id="file"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </li>
