<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	private $insert = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
	}

	public function index()
	{
		$this->add_script('public/js/sortable.js');
		$this->load->library('dropdown');
		$var = $this->dropdown->getArr();

		$this->addmViewData(array('tables' => $var));
		$this->addmViewData(array('labels' => array(
													'Assigned to',
													'Module Type',
													'QA Type',
													'Git Repository',
													'Platform type',
													'Priority Level',
													'Issue Type'
													))
														);

		$this->render('body/mywork');
	}

	public function insertModuleRepo()
	{
		$this->getValueModuleRepo();
		$this->themodeloftruth->insertdata($this->input->post('option'), $this->insert);
		echo 'success';
	}

	public function getValueModuleRepo()
	{
		$this->insert['name']   =  $this->input->post('input');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
