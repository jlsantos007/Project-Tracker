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
		 		echo '0-Password';
		 	}
		 }
		 else
		 {
		 		// wrong username
		 		echo '0-Username';
		 }

	}

	public function register()
	{

				$this->form_validation->set_rules('firstname','FirstName','required');
				$this->form_validation->set_rules('lastname','LastName','required');
				$this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
				$this->form_validation->set_rules('password','Password','required');
				$this->form_validation->set_rules('password2','Confirm Password','matches[password]');


				$firstname  	  = $this->input->post('firstname');
				$lastname       = $this->input->post('lastname');
				$username       = $this->input->post('username');
				$git_repo_type 	= $this->input->post('git_repo_type');
				$access_type    = $this->input->post('access_type');
				$password       = $this->input->post('password');


				if($this->input->post('access_type') == 0)
				{
					$qa_type_id           = null;
					$git_repo_type        = null;
					$approve_issue_access = "1";

				} elseif($this->input->post('access_type') == 1)
				{
					$qa_type_id           = null;

					$approve_issue_access = "0";
				}
				elseif ($this->input->post('access_type') == 2)
				{
					$qa_type_id           = "1";

					$approve_issue_access = "0";

				} elseif($this->input->post('access_type') == 3)
				{
					$qa_type_id           = "2";

					$approve_issue_access = "1";
				}


			if($this->form_validation->run() === FALSE)
			{


				echo "FALSE";

			} else{

			$this->themodeloftruth->register($firstname,$lastname,$username,$git_repo_type,$access_type,$password,$qa_type_id,$approve_issue_access);
			$this->render('body/mainview');
				echo "TRUE";

			}
	}

	function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', 'Username already used!');

		if($this->themodeloftruth->check_username_exists($username)){
			return true;
		}else{
			return false;
		}

	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/main'));
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
