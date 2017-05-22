<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MY_Controller {

	private $mydata;

	public function __construct()
	{
		$this->mydata = array();
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
		$this->load->library('pagination');
	}

	public function index($datas)
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
		if($datas == 1)
		{
			// backlog
			$this->querybuilder->backlog();
		}

		else if($datas == 2){
			// done
			$this->querybuilder->done();
		}
		else if($datas == 3)
		{
			//approve
			$this->querybuilder->forApproval();
		}

		$config["total_rows"] = $this->querybuilder->getCount();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = $choice;


		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->querybuilder->getResult();
		$data["links"] = $this->pagination->create_links();
		$this->add_script('public/js/issue.js');
		$this->addmViewData(array( 'linkData' => $datas));
		$this->addmViewData($data);
		$this->render('body/issues');

	}



	public function pending()
	{
		$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
		$this->querybuilder->pending();

		$config["total_rows"] = $this->querybuilder->getCount();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = $choice;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->querybuilder->getResult();
		$data["links"] = $this->pagination->create_links();
		$this->add_script('public/js/issue.js');
		$this->addmViewData($data);
		$this->render('body/issues');
	}

	public function filterDone()
	{
		$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
		$this->querybuilder->filterDone();

		$config["total_rows"] = $this->querybuilder->getCount();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = $choice;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->querybuilder->getResult();
		$data["links"] = $this->pagination->create_links();
		$this->add_script('public/js/issue.js');
		$this->addmViewData($data);
		$this->render('body/issues');
	}

	// public function filterCurrent()
	// {
	// 	$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
	// 	$this->querybuilder->filterCurrent();
	//
	// 	$config["total_rows"] = $this->querybuilder->getCount();
	// 	$config["per_page"] = 5;
	// 	$config["uri_segment"] = 3;
	// 	$choice = $config["total_rows"] / $config["per_page"];
	// 	$config["num_links"] = $choice;
	//
	// 	$this->pagination->initialize($config);
	//
	// 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 	$data["results"] = $this->querybuilder->getResult();
	// 	$data["links"] = $this->pagination->create_links();
	// 	$this->add_script('public/js/issue.js');
	// 	$this->addmViewData($data);
	// 	$this->render('body/issues');
	// }
	//
	// public function filterBacklog()
	// {
	// 	$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
	// 	$this->querybuilder->filterBacklog();
	//
	// 	$config["total_rows"] = $this->querybuilder->getCount();
	// 	$config["per_page"] = 5;
	// 	$config["uri_segment"] = 3;
	// 	$choice = $config["total_rows"] / $config["per_page"];
	// 	$config["num_links"] = $choice;
	//
	// 	$this->pagination->initialize($config);
	//
	// 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 	$data["results"] = $this->querybuilder->getResult();
	// 	$data["links"] = $this->pagination->create_links();
	// 	$this->add_script('public/js/issue.js');
	// 	$this->addmViewData($data);
	// 	$this->render('body/issues');
	// }

	public function approved()
	{

		$id = $this->input->post('issueid');
		$keme = $this->themodeloftruth->approveIssue($id);
		if($keme)
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}


	public function done()
	{
		$id = $this->input->post('issueid');
		$keme = $this->themodeloftruth->done($id);
		if($keme)
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}

	public function finishQA()
	{
		$id = $this->input->post('issueid');
		$keme = $this->themodeloftruth->finishQA($id);
		if($keme)
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}

	public function getIssue()
	{
		$id = $this->input->post('issueid');
		$keme = $this->themodeloftruth->getIssue($id);
		if($keme)
		{
			echo 'success';
		}
		else
		{
			echo 'failed';
		}
	}

}

/* End of file common.php */
/* Location: ./application/controllers/common.php */
