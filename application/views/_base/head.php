<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="<?php echo $base_url; ?>" />

    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/sweetalert.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
    table{
      width:100%;
      table-layout: fixed;
    }
    .tbl-header{
      background-color: rgba(255,255,255,0.3);
     }
    .tbl-content{
<<<<<<< HEAD
      height:500px;
=======
      height:300px;
>>>>>>> 3b90e1a1a186eace6e864ea12a93ab1bb23871df
      overflow-y:auto;
      margin-top: 0px;
      border: 1px solid rgba(255,255,255,0.3);
    }
    th{
      padding: 20px 15px;
      text-align: left;
      font-weight: 500;
      font-size: 12px;
      color: #000
      text-transform: uppercase;
    }
    td{
      padding: 15px;
      text-align: left;
      vertical-align:middle;
      font-weight: 300;
      font-size: 12px;
      color: #000;
<<<<<<< HEAD
      background-color: white;
=======
>>>>>>> 3b90e1a1a186eace6e864ea12a93ab1bb23871df
      border-bottom: solid 1px rgba(255,255,255,0.1);
    }

    .file {
      visibility: hidden;
      position: absolute;
    }
    .scroll {
      height: 465px;
      overflow-y: scroll;
    }
    #style-3::-webkit-scrollbar-track
    {
    	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    	background-color: #F5F5F5;
    }

    #style-3::-webkit-scrollbar
    {
    	width: 6px;
    	background-color: #F5F5F5;
    }

    #style-3::-webkit-scrollbar-thumb
    {
    	background-color: #000000;
    }

    }
    </style>

    <?php
    	foreach ($stylesheets as $media => $files)
    	{

    		foreach ($files as $file)
    		{
    			$url = start_with($file, 'http') ? $file : base_url($file);
    			echo "<link href='$url' rel='stylesheet' media='$media' />" . PHP_EOL;
    		}

        }

        if(!empty($scripts['head']))
        {
            foreach ($scripts['head'] as $file)
            {
                $url = starts_with($file, 'http') ? $file : base_url($file);
                echo "<scripts type='text/javascript' src='$url'></scripts>" . PHP_EOL;
            }
        }


     ?>
</head>
<body class="<?php echo $body_class; ?>" style="overflow-y: auto !important; height: 100%;">
