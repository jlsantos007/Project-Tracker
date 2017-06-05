<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themodeloftruth extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	function insertdata($table, $data)
	{
	 	$this->db->insert($table, $data);
 	}

	function register($firstname,$lastname,$username,$git_repo_type,$access_type,$password,$qa_type_id,$approve_issue_access)
	{

		  return $this->db->insert('user_tbl', array('firstname'=>$firstname,'lastname'=>$lastname,
		  						'username'=>$username,'password'=>$password,'git_repo_type'=>$git_repo_type,'access_type'=>$access_type,'qa_type_id'=>$qa_type_id,'approve_issue_access'=>$approve_issue_access));
		$this->db->insert($table, $data);
	}

	public function check_username_exists($username){

			$query = $this->db->get_where('user_tbl', array('username' => $username));

			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}

		}

	//custom model for library
	function getDropDown($table)
	{
		$var = $this->db->get($table)->result();
		$arr = array();
		foreach ($var as $key => $value)
		{
			# code...
			$arr[$value->name] = $value->id;
		}
		return $arr;
	}

	function dropdownUser()
	{
		$var = $this->db->select('id, firstname, lastname')
						->from('user_tbl')
						->get()
						->result();
		$arr = array();
		foreach ($var as $key => $value)
		{
			# code...
			$name = $value->firstname . ' ' . $value->lastname;
			$arr[$name] = $value->id;
		}
		return $arr;
	}

	function dev($assignUser)
	{
		$var = $this->db->select('id, firstname, lastname')
					 	->from('user_tbl')
						->where('id', $assignUser)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->firstname.' '.$value->lastname;
		}
		return $name;
	}

	function qa($assignUser)
	{
		$var = $this->db->select('id, firstname, lastname')
						->from('user_tbl')
						->where('id', $assignUser)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->firstname.' '.$value->lastname;
		}
		return $name;
	}

	function git($gitrepoName)
	{
		$var = $this->db->select('id, name')
					 	->from('git_repo_tbl')
						->where('id', $gitrepoName)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->name;
		}
		return $name;
	}

	function create($createdBy)
	{
		$var = $this->db->select('id, firstname, lastname')
					 	->from('user_tbl')
						->where('id', $createdBy)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->firstname.' '.$value->lastname;
		}
		return $name;
	}

	function module($moduleID)
	{
		$var = $this->db->select('id, name')
						->from('modules_tbl')
						->where('id', $moduleID)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->name;
		}
		return $name;
	}

	function platform($platformID)
	{
		$var = $this->db->select('id, name')
						->from('platform_type')
						->where('id', $platformID)
						->get()
						->result();
		$name;
		foreach ($var as $key => $value) {
			$name = $value->name;
		}
		return $name;
	}

	function issueType()
	{
		$var = $this->db->select('id, name')
						->from('issue_type')
						->where('name', 'enhancement')
						->or_where('id', 3)
						->get()
						->result();
		$arr = array();
		foreach ($var as $key => $value)
		{
			# code...
			$name = $value->name;
			$arr[$name] = $value->id;
		}
		return $arr;
	}

	// function record_count()
	// {
	//
	//
	// }

	function fetch_issues($sql = array())
	{
		$temp = array();
		foreach ($sql as $key => $value)
		{
			# code..
			$data = $this->db->query($value)->result_array();
			$temp = (empty($temp)) ? $data : array_merge($temp, $data);
		}

		return $temp;
	}

	function updateisActive($arr = array(), $table, $con = array())
	{
		$this->db->set($arr);
		foreach ($con as $key => $value)
		{
			# code...
			$this->db->where($key, $value);
		}
		$this->db->update($table);
	}

	// function updateCurrent($arr = array(), $table, $con = array())
	// {
	// 	$this->db->set($arr);
	// 	foreach ($con as $key => $value)
	// 	{
	// 		# code...
	// 		$this->db->where($key, $value);
	// 	}
	// 	$this->db->update($table);
	// }
	//
	// function updateBacklog($arr = array(), $table, $con = array())
	// {
	// 	$this->db->set($arr);
	// 	foreach ($con as $key => $value)
	// 	{
	// 		# code...
	// 		$this->db->where($key, $value);
	// 	}
	// 	$this->db->update($table);
	// }


	function generalSelect($id, $table)
	{
		return $this->db->select("*")
						->from($table)
						->where("id", $id)
						->get()
						->result('array')[0];
	}

	function login($obj = array())
	{
		$sel = $this->db->select('*')->from('user_tbl');
		foreach ($obj as $key => $value) {
		 	# code...
		 	$sel = $sel->where($key, $value);
		 }

		 return $sel->get();

	}

	function selectCartIssue($arr = array())
	{
		return $this->db->select('id,issue_title,issue_desc')
						->where_in('id', $arr)
						->get('issue_tbl')
						->result();
	}

	function verify($id)
	{
		$query = $this->db->select('*')->where('id', $id);
		if($this->session->userdata('access_type') == 1)
		{
			$query = $query->where('assigned_to IS NOT ', NULL, FALSE);
		}
		else
		{
			$query = $query->where('assigned_qa IS NOT ', NULL, FALSE);
		}

		return $query->get('issue_tbl')->num_rows();
	}


	function update($id, $table)
	{
		$ass = ($this->session->userdata('access_type') == 1) ? 'assigned_to' : 'assigned_qa';
		$update = $this->db->set($ass, $this->session->userdata('id'));
		if($this->session->userdata('access_type') == 1) {
			$update = $update->set('current_backlog', 1);
		}
		elseif ($this->session->userdata('access_type') == 2) {
			$update = $update->set('current_backlog', 1);
		}
		elseif ($this->session->userdata('access_type') == 3) {
			$update = $update->set('current_backlog', 1);
		}
		return $update->set('issue_status', 'PENDING')
					  ->where('id', $id)
					  ->update($table);

	}

	function updateWork($id, $table)
	{
		return  $this->db->set('start_date', date("Y-m-d"))->set('current_backlog', 0)
						->where('id', $id)
						->update($table);
	}


	function commonquery($sql)
	{
		return $this->db->query($sql)->result('array');
	}

	function select_issue($id)
	{
		return $this->db->select("*")
						->where("id", $id)
						->get("issue_tbl")
						->result('array')[0];
	}

	// custom function for my library
	function getsetValue($table, $id)
	{
		return $this->db->select("*")
						->where("id", $id)
						->get($table)
						->result('array')[0];

	}

	function approveIssue($id)
	{
		return $this->db->set('isActive', 1)->set('issue_approved_by_id', $this->session->userdata('id'))
				 ->where('id', $id)
				 ->update("issue_tbl");
	}

	function done($id)
	{
		return $this->db->set('issue_status', "DONE")
				 ->where('id', $id)
				 ->update("issue_tbl");
	}

	function finishQA($id)
	{
		return $this->db->set('issue_status', "DONE")->set('isActive', 0)
				 ->where('id', $id)
				 ->update("issue_tbl");
	}

	function getIssue($id)
	{
		return $this->db->select('assigned_to, module_tbl_id, qa_type_id, git_repo_id, platform_type_id, priority_level, issue_type_id')
						->where('id', $id)
						->get('issue_tbl')
						->result();
	}
}

/* End of file themodeloftruth.php */
/* Location: ./application/models/themodeloftruth.php */
