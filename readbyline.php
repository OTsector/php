#!/usr/bin/php
<?php

function help() {
	global $argv;
	echo "use: ".$argv[0]." [file] [line]\n"; exit(1);
}

function readbyline($filename, $line) {
	$line--;
	$file = file($filename);
	if(sizeof($file) <= $line) {
		return false;
		//$line = sizeof($file);
		//$line--;
	}
	return $file[$line];
}

if($argc < 3) help();
if(!file_exists($argv[1])) help();
if(!is_numeric($argv[2])) help();

echo readbyline($argv[1], $argv[2]);

