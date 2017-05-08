<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		
	}

	public function index()
	{
		
		$this->render('body/mywork');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */