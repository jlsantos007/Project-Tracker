<?php

	foreach ($scripts['foot'] as $file)
	{
		$url = start_with($file, 'http') ? $file : base_url($file);
		echo '<script type="text/javascript" src="' . $url . '"></script>' . PHP_EOL;
	}


 ?>

 <!--Modal Add Account-->
 <div id="myModal" class="modal fade" role="dialog" style="z-index: 10000000 !important;">
		 <div class="modal-dialog">

				 <!-- Modal content-->
				 <div class="modal-content">
						 <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 <h4 class="modal-title">Register</h4>
						 </div>
						 <div class="modal-body">
								 <form class="form-horizontal">
									 <div class="md-form">
											 <input type="text" class="form-control" id="firstname" required>
											 <label for="firstname">Enter Firstname:</label>
									 </div>

									 <div class="md-form">
											 <input type="text" class="form-control" id="lastname" name="lastname" required>
											 <label for="lastname">Enter Lastname:</label>
									 </div>


									 <div class="form-group">
											 <select id="gitrepo" class="form-control">
												 <option value="" disabled selected style="display: none;">Please Choose GitRepo</option>
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


									 <div class="md-form">
											 <input type="text" class="form-control" id="uname" required>
											 <label for="uname">Enter Username:</label>
									 </div>

									 <div class="md-form">
											 <input type="password" class="form-control" id="pass" required>
											 <label for="pass">Enter Password:</label>
									 </div>

									 <div class="md-form">
											 <input type="password" class="form-control" id="pass2" required>
											 <label for="pass2">Confirm Password:</label>
									 </div>

									 <div class="form-group">
											 <button type="submit" id="register" class="btn block btn-primary btn-block">Submit</button>
									 </div>
								 </form>
						 </div>
				 </div>

		 </div>
 </div>

 <!--Modal Create Issue-->
 <div id="myModals" class="modal fade" role="dialog" style="z-index: 10000000 !important;">
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

                 <!-- dropdowns -->
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
                       <br>
                       <br>
                       <div>
                         <button type="submit" class="btn btn-success save pull-right">Save</button>
                         <button type="submit" class="btn btn-danger cancel pull-right">Cancel</button>
                       </div>
                 </form>
             </div>
         </div>
       </div>
     </div>

		 <!--Modal Add Git Repo/Module-->
		 <div id="myModalx" class="modal fade" role="dialog" style="z-index: 10000000 !important;">
		     <div class="modal-dialog">

		         <!-- Modal content-->
		         <div class="modal-content">
		             <div class="modal-header">
		                 <button type="button" class="close" data-dismiss="modal">&times;</button>
		                 <h4 class="modal-title">Add Module/Git Repo</h4>
		             </div>
		             <div class="modal-body">
		                 <form class="form-horizontal">

											 <div class="form-group">
													 <select id="moduleGit" class="form-control moduleGit">
													 <option value="" disabled selected style="display: none;">Please Choose</option>
													 <option id="modules" value="modules">Module</option>
													 <option id="gitRepo" value="gitRepo">Git Repo</option>
													 </select>
											 </div>

											 <div class="md-form">
												 <input type="text" class="form-control" id="addModule" required>
												 <label id="labelModule" for="addModule">Module:</label>
											 </div>

											 <div class="md-form">
												 <input type="text" class="form-control" id="addGitRepo" required>
												 <label id="labelGit" for="addGitRepo">Git Repo:</label>
											 </div>

		                   <div>
												 <button type="submit" class="btn btn-success addModuleGitRepo pull-right">Save</button>
												 <button type="submit" class="btn btn-danger cancel pull-right">Cancel</button>
		                   </div>

		                 </form>
		             </div>
		         </div>
		       </div>
		     </div>

<script>
$(document).ready(function(){
	$('#myIssue').modal();
});
</script>
 </body>
 </html>
