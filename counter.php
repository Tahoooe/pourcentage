<?php

error_reporting(0);
session_start();

// Add correct path to your countlog.txt file.
$path = 'countlog.txt';

// Opens countlog.txt to read the number of hits.
$file  = fopen( $path, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// si la session existe déjà
if (isset($_SESSION['start'])) {

} else {
	// Update the count.
	$count = abs( intval( $count ) ) + 1;

	// Opens countlog.txt to change new hit number.
	$file = fopen( $path, 'w' );
	fwrite( $file, $count );
	fclose( $file );

	// crée la session
	$_SESSION['start'] = "started";
}

?>