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
	}

	public function index($data)
	{
		$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
		if($data == 1)
		{
			// backlog
			$this->querybuilder->backlog();


		}
		else if($data == 2){
			// done
			$this->querybuilder->done();
		}
		else
		{
			//approve
			$this->querybuilder->forApproval();
		}

		$this->addmViewData(array('panelData' => $this->querybuilder->getResult()));
		$this->addmViewData(array( 'linkData' => $data));
		$this->add_script('public/js/common.js');
		$this->render('body/commonview');
	}







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
