<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listofissue extends MY_Controller {

	private $dataHtml = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
		$this->load->library('pagination');

	}

	public function index()
	{
		$this->load->library('querybuilder', array( 'access' =>$this->session->userdata('access_type')));
		$this->querybuilder->listofissue();

		$config["base_url"] = $this->getBaseUrl() . "index.php/listofissue/index/";
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

	public function history($id)
	{
		$var = $this->recursive($id, $this->dataHtml);
		$this->load->library('history', $var);
	}

	private function recursive($id, &$arr)
	{
	   $init = $this->themodeloftruth->generalSelect($id, "issue_tbl");
	   array_push($arr, $init);
	   if(is_null($init['track_issue_id']))
	   {
	   		return $arr;

	   }
	   else
	   {
	   		return $this->history($init['track_issue_id'], $arr);

	   }

	}

	public function claim()
	{
		if($this->verify($this->input->post('issue')))
		{
			$bool = $this->themodeloftruth->update($this->input->post('issue'), 'issue_tbl');
		}
		else
		{
			echo "ERROR";
		}
	}



	private function verify($id)
	{
		return ($this->themodeloftruth->verify($id) > 0) ? FALSE : TRUE;
	}


	public function addCoockiedata()
	{
		$cookData = $this->input->post('cartid');
		$temp = '';
		if($this->check($cookData)){


		if($this->session->userdata('cart'))
		{
			$temp = $this->session->userdata('cart') . " " . $cookData;
			$this->session->unset_userdata('cart');
		}
		else
		{

			$temp = $cookData;

		}
		$this->session->set_userdata('cart', $temp);
		}
		echo count($this->countCoockie());
	}


	public function countCoockie()
	{
		$temp = $this->session->userdata('cart');
		$temp = explode(" ", $temp);
		return $temp;
	}

	private function check($id)
	{
		$arr = $this->countCoockie();
		foreach ($arr as $key => $value) {
			# code...
			return ($id == $value) ? FALSE : TRUE;
		}
	}

	public function unsetCart()
	{
		$this->session->unset_userdata('cart');
	}










}

/* End of file listofissue.php */
/* Location: ./application/controllers/listofissue.php */
