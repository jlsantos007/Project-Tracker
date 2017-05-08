<?php

class MY_Controller extends CI_Controller {



		protected $mViewData = array();
		protected $mSiteName = '';
		protected $mScripts = array();
		protected $mPageTitle = '';
		protected $mBodyClass = '';
		protected $mStylesheets = array();
		protected $mConfig = array();
		protected $mAction = 'index';
		protected $mBaseUrl = '';


	




		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		
			$this->mAction = $this->router->fetch_method();
			$this->_setup();
		}


		private function _setup()
		{
			$config  = $this->config->item('mydata');

			$this->mSiteName = empty($config['site_name']) ? '' : $config['site_name'];
		    $this->mBaseUrl = base_url();
			$this->mPageTitle = empty($config['page_title']) ? '' : $config['page_title'];
			$this->mBodyClass = empty($config['body_class']) ? '' : $config['body_class'];
			$this->mScripts = empty($config['scripts']) ? array() : $config['scripts'];
			$this->mStylesheets = empty($config['stylesheets']) ? array() : $config['stylesheets'];
			$this->mConfig = $config;

		}



		protected function add_script($files, $append = TRUE, $position = 'foot')
		{
			$files = is_string($files) ? array($files) : $files;
			$position = ($position === 'head' || $position === 'foot') ? $position : 'foot';

			if($append)
				$this->mScripts[$position] = array_merge($this->mScripts[$position], $files);
			else 
				$this->mScripts[$position] = array_merge($files, $this->mScripts['position']);

		}


		protected function add_stylesheet($files, $append = TRUE, $media = 'screen')
		{
			$files = is_string($files) ? array($files) : $files;

			if($append)
				$this->mStylesheets[$media] = array_merge($this->mStylesheets[$media], $files);
			else 
				$this->mStylesheets[$media] = array_merge($files, $this->mStylesheets[$media]);

		}



	    protected function render($viewbody)
		{
			$this->mViewData['scripts'] = $this->mScripts;
			$this->mViewData['stylesheets'] = $this->mStylesheets;
			$this->mViewData['site_name'] = $this->mSiteName;
			$this->mViewData['base_url'] = $this->mBaseUrl;
			$this->mViewData['page_title'] = $this->mPageTitle;
			$this->mViewData['body_class'] = $this->mBodyClass;



			$this->load->view('_base/head', $this->mViewData);
			$this->load->view($viewbody, $this->mViewData);
			$this->load->view('_base/foot', $this->mViewData);
		}


		protected function addmViewData($arr = array())
		{	
			$this->mViewData['userdata'] = empty($this->mViewData['userdata']) ? 
										   $arr : array_merge($this->mViewData['userdata'], $arr);
			
		}


		protected function getBaseUrl()
		{
			return $this->mBaseUrl;
		}



	
}

/* End of file MY_controller.php */
/* Location: ./application/core/controllers/MY_controller.php */