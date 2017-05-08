<?php 


	if(! function_exists('start_with'))
	{
		function start_with($name, $search)
		{
			return substr( $name, 0, 4 ) === $search;
			
		}
	}






 ?>