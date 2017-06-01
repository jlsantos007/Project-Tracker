<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	private $insert = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
		// $this->load->library('pagination');
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

	  $this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
		$this->querybuilder->mywork();


	  $config["total_rows"] = $this->querybuilder->getCount();
	  // $config["per_page"] = 5;
		$config["uri_segment"] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = $choice;

		// $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->querybuilder->getResult();
		// $data["links"] = $this->pagination->create_links();
		$this->add_script('public/js/issue.js');
		$this->addmViewData($data);
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
