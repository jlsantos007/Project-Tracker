<?php

	/**
	*
	*/
	class Issuetracking
	{

		private $data = array();
		private $CI;
		private $tables = array(
								 'user_tbl',
							     'modules_tbl',
								 'qa_type_tbl',
								 'git_repo_tbl',
								 'platform_type',
								 'priority_level',
								 'issue_type',
							   );

		public function __construct($arr = array())
		{
			# code...
			$this->data = $arr;
			$this->CI =& get_instance();
			$this->CI->load->model('themodeloftruth');

		}


		public function builder()
		{
			$temp = array();
			foreach ($this->data as $key => $value)
			{
				# code...
				if($this->check($key))
				{

					$temp[$key] = $this->CI->themodeloftruth->getsetValue($this->getTable($key), $value);


				}

			}

			return $this->arrange($temp);
		}


		private function getTable($value)
		{
			switch ($value) {
				case 'assigned_to':
					# code...
					return $this->tables[0];

				case 'modules_tbl_id':
					# code...
					return $this->tables[1];

				case 'qa_type_id':
					# code...
					return $this->tables[2];

				case 'git_repo_id':
					# code...
					return $this->tables[3];

				case 'platform_type_id':
					# code...
					return $this->tables[4];

				case 'issue_type_id':
					# code...
					return $this->tables[6];

				case 'priority_level':
					# code...
					return $this->tables[5];

				default:
					# code...

					break;
			}
		}



		private function check($val)
		{
			if($val == 'id')
			{
				return FALSE;
			}

			if($val == 'created_by')
			{
				return FALSE;
			}

			if($val == 'track_issue_id')
			{
				return FALSE;
			}

			if($val == 'issue_status')
			{
				return FALSE;
			}

			if($val == 'assigned_qa')
			{
				return FALSE;
			}

			if($val == 'date_created')
			{
				return FALSE;
			}

			if($val == 'start_date')
			{
				return FALSE;
			}

			if($val == 'issue_approved_by_id')
			{
				return FALSE;
			}

			if($val == 'isActive')
			{
				return FALSE;
			}

			if($val == 'issue_desc')
			{
				return FALSE;
			}


			if($val == 'issue_title')
			{
				return FALSE;
			}

		return TRUE;

		}



		private function arrange($data)
		{
			$d = array();
			$i = 0;
			foreach ($data as $key => $value)
			{
				# code...
				if($key == 'assigned_to')
				{
					$d[$i] = $this->assign($value);
				}

				else
				{
					$d[$i] = $this->common($key, $value);
				}



				$i++;
			}


			$temp = $d[5];
			$d[5] = $d[6];
			$d[6] = $temp;

			return $d;
		}



		private function assign($val)
		{
			$front = $val['firstname'] . " " . $val['lastname'];
			$name = 'assign';
			$value = $val['id'];

			return array('name' => $name, 'front' => $front, 'val' => $value);
		}

		private function common($key, $val)
		{
			$front = $val['name'];
			$name = $key;
			$value = $val['id'];

			return array('name' => $name, 'front' => $front, 'val' => $value);
		}


	}



 ?>
