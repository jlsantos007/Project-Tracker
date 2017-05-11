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
					<!-- registration -->

	<div align="center-on-small-only">
		<div class="col-md-6">
			<h2>Register</h2>
			<div class="form-group">
			<input type="text" class="form-control" id="firstname" placeholder="Enter Firstname">
			</div>

    <div class="form-group">
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter LastName">
    </div>


			<div class="form-group">
			          <select id="qatype" class="form-control">
  							<option id="1" value="1">System</option>
  							<option id="2" value="2">RTD</option>
			          </select>
			</div>

			<div class="form-group">
			          <select  id="atype" class="form-control">
			                <option  id="0" value="0">Management</option>
  							<option id="1" value="1">Devs</option>
  							<option id="2" value="2">QA</option>
  							<option id="3" value="3">QA/Management</option>
			          </select>
			</div>


    <div class="form-group">
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>

			<div class="form-group">
			<input type="password" class="form-control" id="pass" placeholder="Password">
			</div>

    <button type="submit" id="register" class="btn block btn-primary btn-block">Submit</button>
  </div>
</div>


			</div>
		</div>
	</div>
</div>
<div class="page-footer blue center-on-small-only" style="height: 9%;">

</div>
