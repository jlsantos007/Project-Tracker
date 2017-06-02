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
								 <form class="form-horizontal" id="addAccount">
									 <div class="md-form">
											 <input type="text" class="form-control" id="firstname">
											 <label for="firstname">Enter Firstname:</label>
									 </div>

									 <div class="md-form">
											 <input type="text" class="form-control" id="lastname" name="lastname">
											 <label for="lastname">Enter Lastname:</label>
									 </div>


									 <div class="form-group">
											 <select id="gitrepo" class="form-control">
												 <option value="" disabled selected style="display: none;">Please Choose GitRepo</option>
												 <<?php
												 $query = $this->db->get('git_repo_tbl');

												 foreach ($query->result() as $row)
												 {
													 echo '<option id = "'.$row->id.'" value="'.$row->id.'">'.$row->name.'</option>';
												 }
												 ?>
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
											 <input type="text" class="form-control" id="uname">
											 <label for="uname">Enter Username:</label>
									 </div>

									 <div class="md-form">
											 <input type="password" class="form-control" id="pass">
											 <label for="pass">Enter Password:</label>
									 </div>

									 <div class="md-form">
											 <input type="password" class="form-control" id="pass2">
											 <label for="pass2">Confirm Password:</label>
									 </div>

									 <div class="form-group">
											 <button type="submit" id="register" class="btn btn-primary pull-right">Submit</button>
											 <button type="submit" id="cancel" class="btn btn-danger pull-right">Cancel</button>
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

									 <div class="form-group">
                       <input type="file" name="file" class="file" id="file">
											 <button class="browse btn btn-default" type="button"><i class="glyphicon glyphicon-paperclip">Browse</i></button>
									 </div>
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
												 <input type="text" class="form-control" id="moduleRepo" required>
												 <label id="labelModuleRepo" for="moduleRepo"></label>
											 </div>

		                   <div>
												 <button type="submit" class="btn btn-success addModuleGitRepo pull-right">Add</button>
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

	$(".sidebar").click(function(){
		$("#menulist").slideToggle();
	});

	$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
	});

	$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

});
</script>
<script src="public/js/sweetalert.min.js"></script>
 </body>
 </html>
