<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="<?php echo $base_url; ?>" />

    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/sweetalert.css">

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
    <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300);

    #myModalh {
      position: absolute;
    	width: 280px;
    	height: 210px;
      left: 50%;
      top: 50%;
      margin-left: -150px;
      margin-top: -150px;
    	background: #fff;
    	border-radius: 3px;
    	box-shadow: 4px 8px 12px 0 rgba(0,0,0,0.4);
    	text-align: center;
    	overflow: hidden;
    	animation: show-modal .7s ease-in-out;
    }
    	&.hide {
    		animation: hide-modal .6s ease-in-out both;
    	}

    	.imgWarning {
    		margin-top: 24px;
    	}

    	.titles {
    		display: block;
    		font-size: 18px;
    		line-height: 24px;
    		font-weight: 400;
    		margin: 14px 0 5px 0;
    	}

    	.warningHistory {
    		font-size: 14px;
    		font-weight: 300;
    		line-height: 19px;
    		margin: 0;
    		padding: 0 30px;
    	}

    	.exit {
    		position: absolute;
    		height: 40px;
    		bottom: 0;
    		left: 0;
    		right: 0;
    		background: #F65656;
    		color: #fff;
    		line-height: 40px;
    		font-size: 14px;
    		font-weight: 400;
    		cursor: pointer;
      }

    		&:hover {
    			background: #EC3434;
    		}


    </style>

</head>
<body class="<?php echo $body_class; ?>" style="overflow-y: auto !important; height: 100%;">
