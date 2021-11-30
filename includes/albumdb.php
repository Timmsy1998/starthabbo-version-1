<?php
	#################
	## albumdb.php ##
	#################

date_default_timezone_set('Europe/London');

	$params['db']['hostname']  = "localhost";
	$params['db']['username']  = "starthab_root";
	$params['db']['password']  = "V@ndersar1998";
	$params['db']['database']  = "starthab_portal";

	$params['core']['salt1']   = "4730b178f6";
	$params['core']['salt2']   = "59999a713e";

	$params['user']['timeout'] = "120 minutes";

	session_start();
	putenv( "TZ=Europe/London" );

	require_once( "db.inc.php" );
	require_once( "core.inc.php" );
	
?>