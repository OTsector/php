#!/usr/bin/php
<?php
popen('clear', 'w');
echo "without threads:\n\n";
for ($j=0; $j<=5; $j++) {
	$pipe[$j]=$j;
	sleep(1);
	echo $j." ";
}

echo "\n\nwith threads:";
for ($i=0; $i<=5; $i++) { // open ten processes
	echo "\n\nstage: $i\n\n";
	for ($j=0; $j<=5; $j++) {
		$pipe[$j]=$j;
		sleep(1);
	}

    for ($j=0; $j<=5; ++$j) { // wait for them to finish
		echo $pipe[$j]." ";
	}
}

echo "\n";
?>