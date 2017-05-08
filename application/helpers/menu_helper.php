<?php 

	
	if(! function_exists('data_builder'))
	{
		function data_builder($access)
		{
			$CI =& get_instance();
			$menu = $CI->config->item('menu');

			$arr = array();

			if($access != 0)
			{
				$arr['mywork'] = $menu['mywork'];
				$arr['backlog'] = $menu['backlog'];
			}

			if($access == 1)
			{
				$arr['done'] = $menu['done'];
			}

			if($access == 3)
			{
				$arr['approve'] = $menu['approve'];
			}

			$arr['issue'] = $menu['issue'];

			return $arr;

		}
	}

 ?>