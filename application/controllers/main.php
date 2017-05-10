<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends  MY_Controller {

	private $insertArr = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
	}

	public function index()
	{
		$this->add_script('public/js/main.js');
		$this->render('body/mainview');
	}

	public function check()
	{
		$username = ($this->input->post('username')) ? $this->input->post('username') : '';
		$password = ($this->input->post('password')) ? $this->input->post('password') : '';
		if($this->themodeloftruth->login(array('username' => $username))->num_rows())
		 {
			if($this->themodeloftruth->login(array('password' => $password))->num_rows())
		 	{
		 	   $arr = $this->themodeloftruth->login(array('username' => $username, 'password' => $password))->result('array')[0];
		 	   $this->session->set_userdata($arr);
		 	   echo '1-' . base_url() . 'index.php/home';
		 	}
		 	else
		 	{
		 		 //wrong password
		 		echo '0-password';
		 	}
		 }
		 else
		 {
		 		// wrong username
		 		echo '0-username';
		 }

	}

	public function register()
	{

				$firstname  	= $this->input->post('firstname');
				$lastname      = $this->input->post('lastname');
				$username      = $this->input->post('username');
				$qa_type_id 	= $this->input->post('qa_type_id');
				$access_type   = $this->input->post('access_type');
				$password     = $this->input->post('password');

			
			$this->themodeloftruth->register($firstname,$lastname,$username,$qa_type_id,$access_type,$password);
			redirect(base_url('index.php/main'));


	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/main'));
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
