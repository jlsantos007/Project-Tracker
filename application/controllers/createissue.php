<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createissue extends MY_Controller {

	private $insertArr = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
		$this->load->helper(array('form', 'url'));
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

	public function do_upload()
	{
			$config = array(
			'upload_path' 	=> "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' 		=> TRUE,
			'max_size' 			=> "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' 		=> "",
			'max_width' 		=> ""
			);
			if (isset($_FILES['file']['name'])) {
			              if (0 < $_FILES['file']['error']) {
			                  echo 'Error during file upload' . $_FILES['file']['error'];
			              } else {
			                  if (file_exists('uploads/' . $_FILES['file']['name'])) {
			                      echo 'File already exists : uploads/' . $_FILES['file']['name'];
			                  } else {
			                      $this->load->library('upload', $config);
			                      if (!$this->upload->do_upload('file')) {
			                          echo $this->upload->display_errors();
			                      } else {
			                          echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
																redirect(base_url('index.php/createissue/insert'));
			                      }
			                  }
			              }
			          } else {
			              echo 'Please choose a file';
									}
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
		$this->insertArr['image']			       = $this->input->post('image');
		$this->insertArr['created_by']       = $this->session->userdata('id');
		$this->insertArr['modules_tbl_id']   = $this->input->post('1');
		$this->insertArr['qa_type_id']       = $this->input->post('2');
		$this->insertArr['git_repo_id']      = $this->input->post('3');
		$this->insertArr['platform_type_id'] = $this->input->post('4');
		$this->insertArr['issue_type_id']    = $this->input->post('6');
		$this->insertArr['priority_level']   = $this->input->post('5');
		$this->insertArr['date_created']     = date('Y-m-d');
		$this->insertArr['track_issue_id']   = $this->input->post('ids');

		 if($this->input->post('0'))
		 {
			$this->insertArr['assigned_to']  = $this->input->get_post('0');
			$this->insertArr['start_date']	= date('Y-m-d');
			 if ($this->session->userdata('access_type') == 3)
			 {
			 	$this->insertArr['assigned_qa'] = null;
			 }
		 }
		 if ($this->input->post('5') == 1) {
		 	$this->insertArr['priority_color']	= "DarkRed";
		 }
		 elseif ($this->input->post('5') == 2) {
		 	$this->insertArr['priority_color']	= "OrangeRed";
		 }
		 elseif ($this->input->post('5') == 3) {
		 	$this->insertArr['priority_color']	= "Orange";
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
			$this->themodeloftruth->updateisActive(array('isActive' => 0, 'issue_status' => "DONE"), 'issue_tbl', array('id' => $id));
			$this->load->library('issuetracking', $this->themodeloftruth->select_issue($id));
			$this->addmViewData($this->themodeloftruth->select_issue($id));
			$this->addmViewData(array('rel_data' => $this->issuetracking->builder()));
			$this->addmViewData(array('track_id' => $id));
			$this->index();
	}
}

/* End of file createissue.php */
/* Location: ./application/controllers/createissue.php */
