<?php
if(!function_exists('loopDropDownItem'))
{
	function loopDropDownItem($array, $index){
		foreach ($array as $key => $value) {
			# code...
			echo '<a class="dropdown-item thechoosen" href="#" data-index="'. $index . '" data-id="'. $value . '">' . $key . '</a>' . PHP_EOL;
		}
	}
}

if(!function_exists('input_builder'))
{
	function input_builder($label, $arr = array())
	{
	  if(!empty($arr))
	  {
	  	echo '<input type="hidden" name="' . $arr['name'] .'" id="'. $arr['name'] . '" value="' . $arr['val'] . '" />';
	  }

        echo '<p>' . $label .':<span style="padding-left: 7em;">';

       if(!empty($arr))
       {

       	echo $arr['front'];

       }

       echo '</span></p>';
	}
}7?>
