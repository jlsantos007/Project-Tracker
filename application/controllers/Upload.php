<?php

    class Upload extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
            $this->load->view('Upload_form', array('error' => ' '));
        }

        public function do_upload()
        {
            $config = array(
            'upload_path' 	=> "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' 	=> TRUE,
            'max_size' 		=> "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' 	=> "",
            'max_width' 	=> ""
            );
            $this->load->library('upload', $config);
            if($this->upload->do_upload()){
            redirect(base_url('index.php/createissue/insert'));
            }
        }
    }
?>
