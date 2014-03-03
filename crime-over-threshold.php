<?php

ini_set('memory_limit', '2G');
if (count($argv) < 3) {
	echo "Usage\n  php ".$argv[0]." filename thecrime\n";
	exit;
}

$all = array('Anti-social-behaviour','Bicycle-theft','Burglary','Criminal-damage-and-arson','Drugs','Other-crime','Other-theft','Possession-of-weapons','Public-disorder-and-weapons','Public-order','Robbery','Shoplifting','Theft-from-the-person','Vehicle-crime','Violence-and-sexual-offences','Violent-crime');

$minor_crimes = array ('Anti-social-behaviour','Other-theft','Vehicle-crime','Shoplifting','Public-order','Bicycle-theft','Other-crime');

#----------------------------------------------------------
$y_crime = $argv[2];
$x_crime = array_diff($minor_crimes,array($y_crime));
#----------------------------------------------------------

$file_threshold = 'crime-list-thresholds';
$thresholds = prendi_threshold($file_threshold);

#get the file
$file = $argv[1];
$lines = explode("\n", file_get_contents($file) );
$all_crimes = array();
foreach ($lines as $line) {
	$data = explode(',',$line);
	$site_id = $data[0];	
	$crime_type = $data[1];
	$all_crimes[$site_id][$crime_type] += 1 ;
}


#foreach site id
foreach ($all_crimes as $site_id => $dummy) {
	$sum=0;
	foreach ($x_crime as $onecrime) {
		$sum += $all_crimes[$site_id][$onecrime];
	}

	if ($sum >= $thresholds[$y_crime])
		echo $site_id."2,red\n";
	elseif ($sum >= 0.5 * $thresholds[$y_crime])
		echo $site_id."1,yellow\n";
	elseif ($sum < 0.5 * $thresholds[$y_crime])
		echo $site_id."0,green\n";
		
}



function prendi_threshold ($filename) {

	$lines = explode("\n", file_get_contents($filename) );
	$thresholds = array();
	foreach ($lines as $line) {
		$data = explode(' ',$line);
		$tresh = $data[0];	
		$crime_type = $data[1];
		$thresholds[$crime_type]=$tresh;
	}
	return($thresholds);
}





?>