<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="<?php echo $base_url; ?>" />

    <title>
        <?php echo $page_title; ?>
    </title>
    <style>
    @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css);
    @import url(https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700);

    .quote-box {
    border-radius: 3px;
    position: relative;
    margin: 8% auto auto auto;
    width: 50%;
    padding: 35px 50px;
    background-color: #fff;
    overflow: hidden;
}
#quote {
    overflow: hidden;
    margin-bottom: 20px;
    opacity: 1;
    transition: all 0.8s cubic-bezier(0.44, 1.13, 0.58, 1);
}
i.fa.fa-quote-left {
    font-size: 1.8em;
    position: relative;
    top: 65px;
}
i.fa.fa-twitter {
    color: #fff;
}
.quote-text {
    font-size: 2em;
}
.author {
    font-size: 1.4em;
    font-weight: 600;
    float: right;
}
.quote-box .btn {
    cursor: pointer;
    opacity: 1;
    background: #4c7fa7;
    color: #fff;
    font: bold 1.5em 'Josefin Sans';
    height: 50px;
    line-height: 50px;
    margin-top: 30px;
    padding: 0 20px;
    border-radius: 3px;
    border: none;
    outline: none;
}
.quote-box .btn:hover {
    opacity: 0.8;
}
.quote-box #new-quote {
    float: right;
}

.dashboard {
  padding: 24px;
}

.dashboard .card-stats-number {
  margin: 0;
}

.dashboard .card-icon {
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
}

.dashboard .card-icon {
  min-width: 35%;
}

.dashboard .card-icon i {
  width: 100%;
  text-align: center;
  color: rgba(0, 0, 0, .25);
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
