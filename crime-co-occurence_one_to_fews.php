<?php
#Copyright 2014 Moreno Bonaventura (morenobonaventura@gmail.com)
#
#Licensed under the Apache License, Version 2.0 (the "License");
#you may not use this file except in compliance with the License.
#You may obtain a copy of the License at
#
#    http://www.apache.org/licenses/LICENSE-2.0

#Unless required by applicable law or agreed to in writing, software
#distributed under the License is distributed on an "AS IS" BASIS,
#WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#See the License for the specific language governing permissions and
#limitations under the License.
#
ini_set('memory_limit', '2G');
if (count($argv) < 3) {
	echo "Usage\n  php ".$argv[0]." filename <bigcrime_you_want_analise>\n";
	echo "  e.g. Drugs\n\n";
	exit;
}

$minor_crimes = array ('Anti-social-behaviour','Other-theft','Vehicle-crime','Shoplifting','Public-order','Bicycle-theft','Other-crime');

#----------------------------------------------------------
$y_crime = $argv[2];
$x_crime = array_diff($minor_crimes,array($y_crime));
#----------------------------------------------------------


#get the file
$file = $argv[1];
$lines = explode("\n", file_get_contents($file) );
$all_crimes = array();
foreach ($lines as $line) {
	$data = explode(',',$line);
	$site_id = $data[0];	
	$crime_type = $data[1];
	$all_crimes[$site_id][$crime_type] += 1;
}
fwrite(STDERR,"dataset imported\n analysing data...");


#foreach site-id
foreach ($all_crimes as $site_id => $dummy) {
	$sum=0;
	#compute the sum of all minor crimes
	foreach ($x_crime as $onecrime) {
		$sum += $all_crimes[$site_id][$onecrime];
	}

	#print the sum against the value of the bigcrime you choose to analise
	if (isset($all_crimes[$site_id][$y_crime]))
		echo  $sum.' '.$all_crimes[$site_id][$y_crime]."\n";
	else
		echo  $sum." 0\n";
}







?>
