<?php 
$navbar = array(
         'page_title' => $page_title,
         );
$this->load->view('_partials/navbar', $navbar); 
?>
<?php echo PHP_EOL;?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h2>Sign-up</h2>
			<div class="form-group">
				<label>Firstname</label>
				<input type="text" class="form-control" name="firstname" placeholder="Name">
			</div>
			<div class="form-group">
				<label>Lastname</label>
				<input type="text" class="form-control" name="lastname" placeholder="Name">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
				<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn block btn-primary btn-block">Submit</button>
		</div>
	</div>

