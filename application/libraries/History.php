<?php 

	class History 
	{

		private $CI;
		private $dataHtml;

		public function __construct($arr = array())
		{
			 $this->CI =& get_instance();
			 $this->dataHtml = $arr;
			 $this->html = $this->builder();
		}

		private function builder()
		{
			 $data = $this->dataHtml;
			 $html = array();
			 foreach ($data as $key => $value) {
			 	$value["dropdown"] = 1;
			 	$div = $this->CI->load->view('_partials/issue_cardview_child', $value);
			 	array_push($html, $div);
			 }

			 return $html;

		}




	}






 ?>