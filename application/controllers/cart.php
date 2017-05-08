<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('themodeloftruth');
	}

	public function index()
	{
		if($this->session->userdata('cart'))
		{

			$arr = $this->countCoockie();
			$this->addmViewData($this->themodeloftruth->selectCartIssue($arr));
		}
		$this->add_script('public/js/cart.js');
		$this->render('body/cartview');
	}

	private function countCoockie()
	{
		$temp = $this->session->userdata('cart');
		$temp = explode(" ", $temp);
		return $temp;
	}

	public function claim()
	{
		if($this->verify($this->input->post('issue')))
		{
			$bool = $this->themodeloftruth->update($this->input->post('issue'), 'issue_tbl');
			 if($bool)
		     {
		     	$this->unsetData($this->input->post('issue'));
		     	if($this->session->userdata('cart'))
		     	{
		     		$count = count($this->countCoockie());
		     		echo $count;
		     	}
		     	else
		     	{
		     		echo 0;
		     	}
			  	
			    
		     }
		     else
		    {
		    	echo 'error';
		    }
		
		}
		else
		{
			$this->unsetData($this->input->post('issue'));
			if($this->session->userdata('cart'))
		     	{
		     		$count = count($this->countCoockie());
		     		echo $count;
		     	}
		     	else
		     	{
		     		echo 0;
		     	}
		}
	}



	private function verify($id)
	{
		return ($this->themodeloftruth->verify($id) > 0) ? FALSE : TRUE;
	}

	private function unsetData($id)
	{
		$arr = $this->countCoockie();

		for($i = 0; $i < count($arr); $i++)
		{
			if($id == $arr[$i])
			{

				array_splice($arr, $i, 1);
			}
		}
		if(!empty($arr))
		{
			$string = implode(" ", $arr);
			$this->session->unset_userdata('cart');
			$this->session->set_userdata('cart', $string);
			return;
		}

		$this->session->unset_userdata('cart');
		
		
	}

}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */