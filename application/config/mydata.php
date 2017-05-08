<?php 
defined('BASEPATH') OR exit('No direct script access allowed');




$config['mydata'] = array(

	'site_name' => 'Project Tracker',

	

	'page_title' => 'Project Tracker',


	'scripts' => array(
		'head' => array(),

		'foot' => array(
			'public/js/jquery-3.1.1.min.js',
			'public/js/tether.min.js',
			'public/js/bootstrap.min.js',
			'public/js/mdb.min.js',
			'http://code.jquery.com/ui/1.12.1/jquery-ui.js'
		)
	),

	'stylesheets' => array(
			'screen' => array(
				'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css',
				'public/css/bootstrap.min.css',
				'public/css/mdb.min.css',
				'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
				'public/css/projecttracker.css'
			)
	),


	'body_class' => ''


	);


$config['tables'] = array('child_module_tbl',
						  'departments_tbl', 
						  'git_repo_tbl', 
						  'issue_tbl',
						  'issue_type', 
						  'modules_tbl', 
						  'platform_type', 
						  'platform_type_accounts', 
						  'priority_level', 
						  'qa_type_tbl', 
						  'status', 
						  'user_tbl'
						 );


$config['menu'] = array(
	   'mywork' => array(
	   					   'image' => 'public/img/server.png',
	   					   'title' => 'My Work',
	   					  'pclass' => 'pWork',
	   					  	'link' => 'index.php/home'
	   					),
	  'backlog' => array(
	  					   'image' => 'public/img/inbox.png',
	   					   'title' => 'Current/Backlog',
	   					  'pclass' => 'pCurrent',
	   					  	'link' => 'index.php/common/index/1'
	  					),
	  'issue' => array(
	  					   'image' => 'public/img/search-problem.png',
	   					   'title' => 'Issue',
	   					  'pclass' => 'pIssue',
	   					  	'link' => 'index.php/listofissue'
	  					),
	  'done' => array(
	  					   'image' => 'public/img/browser.png',
	   					   'title' => 'Done',
	   					  'pclass' => 'pDone',
	   					  	'link' => 'index.php/common/index/2'
	  					),
	   'approve' => array(
	  					   'image' => 'public/img/browser.png',
	   					   'title' => 'Issue to Approve',
	   					  'pclass' => 'pAprove',
	   					  	'link' => 'index.php/common/index/3'
	  					)

					   );







?>