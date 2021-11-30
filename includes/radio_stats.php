<?php

    $url = "http://ic.starthabbo.com:8000/status-json.xsl";
 
    $ch = curl_init();
 
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_HEADER, false );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Accept-Encoding: gzip, deflate, sdch' ) );
    curl_setopt( $ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
           
    $result = json_decode( curl_exec( $ch ), true );
 
    curl_close($ch);
 
    if(isset($result->icestats->source[1]->server_name)) {
        $djname = $result->icestats->source[1]->server_name;
    }
	
	if(isset($result->icestats->source[1]->title)) {
        $currentsong = $result->icestats->source[1]->title;
    }
	
	if(isset($result->icestats->source[1]->listeners)) {
        $listeners = $result->icestats->source[1]->listeners;
    }
?>