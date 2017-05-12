<?php
$navbar = array(
                 'page_title' => $page_title,
                 'user_name' => 'levi'
               );
$this->load->view('_partials/navbar', $navbar);
?>

<div class="row" style="height: 80%">
	<div class="col-md-6" style="border: 1px solid red;">
		<div class="tabIssue" id="tabIssue">
			<div class="tab-content">
					<!-- content keme -->
					

			</div>
		</div>
	</div>
	<div class="col-md-6" style="border: 1px solid red;">
		<div class="tabIssue" id="tabIssue">
			<div class="tab-content">
	<div class="container">			<!-- registration -->
	<?php validation_errors(); ?>
	<?php form_open(base_url('index.php/main')); ?>
	<div align="center-on-small-only">
	
		<div class="col-md-6">
			<h2>Register</h2>
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
  							<option id="1" value="1">K12</option>
  							<option id="2" value="2">College</option>
  							<option id="3" value="3">K12_int</option>
			          </select>
			</div>

			<div class="form-group">
			          <select  id="atype" class="form-control">
<<<<<<< HEAD
			                <option  id="0" value="0">Management</option>
			                <option  id="1" value="1">Devs</option>
  							<option  id="2" value="2">QA</option>
  							<option  id="3" value="3">QAManagement</option>
=======
			          <option  id="0" value="0">Management</option>
  							<option id="1" value="1">Devs</option>
  							<option id="2" value="2">QA</option>
  							<option id="3" value="3">QA/Management</option>
>>>>>>> eec83b6d47190620964016ff05b1f48d3f778065
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
  <?php echo form_close(); ?>
</div>
</div>
			</div>
		</div>
	</div>
</div>
<div class="page-footer blue center-on-small-only" style="height: 9%;">

</div>
