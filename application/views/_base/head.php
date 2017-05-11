<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="<?php echo $base_url; ?>" />

    <title><?php echo $page_title; ?></title>
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
