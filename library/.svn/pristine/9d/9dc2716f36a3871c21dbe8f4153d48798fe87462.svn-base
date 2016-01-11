<i class="glyphicon glyphicon-<?php 
$time_show_start = strtotime($item->time_show_start);
$time_show_end = strtotime($item->time_show_end);
$time = time();
if($item->use_time_show_start == '1'){
	if($time_show_start > $time){
		// show in future
		echo 'time';
	} elseif($item->use_time_show_end == '1') {
		if($time_show_end > $time){
			// visible until
			echo 'ok-circle';
		} else {
			// time ended
			echo 'remove-cirlce';
		}
	} else {
		// always visible from now on
		echo 'noicon';
	}
} elseif($item->use_time_show_end == '1'){
	if($time_show_end > $time){
		// visible until
		echo 'ok-circle';
	} else {
		// time ended
		echo 'remove-circle';
	}
} else {
	// always visible from now on
	echo 'noicon';
}
?>"></i>