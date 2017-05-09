<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createissue extends MY_Controller {

	private $insertArr = array();

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
		$this->render('body/projecttracker');
	}


	public function insert()
	{
		 $this->getValue();
		 $this->themodeloftruth->insertdata('issue_tbl', $this->insertArr);
		 echo 'success';
		 //print_r($this->insertArr);

	}

	private function getValue()
	{
		$this->insertArr['issue_title']      = $this->input->post('title');
		$this->insertArr['issue_desc']       = $this->input->post('description');
		$this->insertArr['created_by']       = $this->session->userdata('id');
		$this->insertArr['modules_tbl_id']   = $this->input->post('1');
		$this->insertArr['qa_type_id']       = $this->input->post('2');
		$this->insertArr['git_repo_id']      = $this->input->post('3');
		$this->insertArr['platform_type_id'] = $this->input->post('4');
		$this->insertArr['issue_type_id']    = $this->input->post('6');
		$this->insertArr['priority_level']   = $this->input->post('5');
		$this->insertArr['date_created']     = date('Y-m-d');

		 if($this->input->post('0'))
		 {
			 $this->insertArr['assigned_to']  = $this->input->get_post('0');
			 $this->insertArr['assigned_qa']  = $this->input->get_post('0');
			 $this->insertArr['start_date']		= date('Y-m-d');
		 }
		 if($this->input->post('issue_id'))
		 {
			 $this->insertArr['track_issue_id']  = $this->input->post('issue_id');
		 }
		 if($this->input->post('approved'))
		 {
			 $this->insertArr['issue_approved_by_id']  = $this->input->post('approved');
		 }

		$this->insertArr['issue_status'] = 'PENDING';
		$this->insertArr['isActive'] = 1;




	}


	public function createWithTrackId($id)
	{
			$this->themodeloftruth->updateisActive(array('isActive' => 0), 'issue_tbl', array('id' => $id));
			$this->load->library('issuetracking', $this->themodeloftruth->select_issue($id));
			$this->addmViewData($this->themodeloftruth->select_issue($id));
			$this->addmViewData(array('rel_data' => $this->issuetracking->builder()));
			$this->addmViewData(array('track_id' => $id));
			$this->index();
	}
}

/* End of file createissue.php */
/* Location: ./application/controllers/createissue.php */
