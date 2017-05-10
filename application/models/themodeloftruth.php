<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themodeloftruth extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	// function insertdata($table, $data)
	// {
	// 	$this->db->insert($table, $data);
	// }

	function register($firstname,$lastname,$username,$qa_type_id,$access_type,$password)
	{
		  return $this->db->insert('user_tbl', array('firstname'=>$firstname,'lastname'=>$lastname,
		  						'username'=>$username,'password'=>$password,'access_type'=>$access_type,'qa_type_id'=>$qa_type_id));
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

	function record_count()
	{


	}

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
		if($this->session->userdata('access_type') == 1)
		{
			$update = $update->set('start_date', date("Y-m-d"));
		}
		return $update->set('issue_status', 'PENDING')
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
