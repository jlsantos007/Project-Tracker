<?php
$navbar = array(
                 'page_title' => $page_title,
                 'user_name' => 'levi'
               );
$this->load->view('_partials/navbar', $navbar);
?>

    <div class="row" style="height: 100%">
        <!-- <div class="col-md-6" style="border: 1px solid red;"> -->
            <!-- <div class="tabIssue" id="tabIssue"> -->
                <!-- <div class="tab-content"> -->
                    <!-- content keme -->
                  <div class="quote-box">
                  		<div id="quote"></div>
                  		 <button class="btn" id="new-quote">New Quote</button>
                  		 <button class="btn">
                  			 <a class="twitter-share-button"
                  			   <href="https://twitter.com/intent/tweet?text=What’s%20happening?"
                  			   <data-size="large">
                  				<i class="fa fa-twitter"></i>
                  			</a>
                  		 </button>
                  </div>


                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- <div class="col-md-6" style="border: 1px solid red;"> -->
            <!-- <div class="tabIssue" id="tabIssue"> -->
                <!-- <div class="tab-content"> -->
                    <!-- <div class="container"> -->
                        <!-- registration -->

                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" style="z-index: 10000000 !important;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register</h4>
                    </div>
                    <div class="modal-body">

                      <?php validation_errors(); ?>
                      <?php form_open(base_url('index.php/main')); ?>
                      
                        <form class="form-horizontal">

                          <div class="form-group">
                              <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname">
                              <?php echo form_error('firstname', 'Firstname', 'required'); ?>
                          </div>

                          <div class="form-group">
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter LastName">
                              <?php echo form_error('lastname', '<div class="error">', '</div>'); ?>
                          </div>


                          <div class="form-group">
                              <select id="gitrepo" class="form-control">
                                <option value="" disabled selected style="display: none;">Please Choose Git Repo</option>
                                <option id="1" value="1">K12</option>
                                <option id="2" value="2">College</option>
                                <option id="3" value="3">K12_int</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <select id="atype" class="form-control">
                                <option value="" disabled selected style="display: none;">Please Choose Access Type</option>
                                <option  id="0" value="0">Management</option>
                                <option  id="1" value="1">Devs</option>
                                <option  id="2" value="2">QA</option>
                                <option  id="3" value="3">QAManagement</option>
                              </select>
                          </div>


                          <div class="form-group">
                              <input type="text" class="form-control" id="uname" placeholder="Username">
                              <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                          </div>

                          <div class="form-group">
                              <input type="password" class="form-control" id="pass" placeholder="Password">
                              <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                          </div>

                          <div class="form-group">
                              <input type="password" class="form-control" id="pass2" placeholder="Confirm Password">
                              <?php echo form_error('password2', '<div class="error">', '</div>'); ?>
                          </div>

                          <div class="form-group">
                              <button type="submit" id="register" class="btn block btn-primary btn-block">Submit</button>
                          </div>

                        </form>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-footer blue center-on-small-only" style="height: 9%;">

        </div>
