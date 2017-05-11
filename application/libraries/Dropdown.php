<?php

	/**
	*
	*/
	class Dropdown
	{

		private $mData;
		private $CI;
		private $tables = array(
								 'user_tbl',
							     'modules_tbl',
								 'qa_type_tbl',
								 'git_repo_tbl',
								 'platform_type',
								 'priority_level',
								 'issue_type'
							   );

		function __construct()
		{
			$this->CI =& get_instance();
			$this->CI->load->model('themodeloftruth');
			$this->builder();
		}
		private function builder()
		{
				$this->mData = array(
										$this->tables[0] => $this->CI->themodeloftruth->dropdownUser(),
										$this->tables[1] => $this->CI->themodeloftruth->getDropDown($this->tables[1]),
										$this->tables[2] => $this->CI->themodeloftruth->getDropDown($this->tables[2]),
										$this->tables[3] => $this->CI->themodeloftruth->getDropDown($this->tables[3]),
										$this->tables[4] => $this->CI->themodeloftruth->getDropDown($this->tables[4]),
										$this->tables[5] => $this->CI->themodeloftruth->getDropDown($this->tables[5]),
										$this->tables[6] => $this->CI->themodeloftruth->getDropDown($this->tables[6])
									);
		}

		public function getArr()
		{
			return $this->mData;
		}















	}




 ?>
