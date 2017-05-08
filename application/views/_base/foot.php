<?php 

	foreach ($scripts['foot'] as $file) 
	{
		$url = start_with($file, 'http') ? $file : base_url($file);
		echo '<script type="text/javascript" src="' . $url . '"></script>' . PHP_EOL;
	}


 ?>

 </body>
 </html>