<?php
	// Include the required glob.php file


	// Grab today's date using PHP date()
	$today_date = date( 'N' );

	// Grab the current hour
	$now_hour = date( 'H' );

	// Now we have the current hour, we add one to get the next hour
	$next_hour = $now_hour + 1;

	if ( $next_hour == 24 ) {

		// It's midnight on the next day
		$next_date = $today_date + 1;
		$next_hour = "0";
	}
	else {

		// It's the same day
		$next_date = $today_date;
	}
	
	// Now we have the current hour, we take one away to get the prev hour

	if ( $next_hour == 24 ) {

		// It's midnight on the next day
		$next_date = $today_date + 1;
		$next_hour = "0";
	}
	else {

		// It's the same day
		$next_date = $today_date;
	}
	// Who was on previously

	// Now to make the hours friendly
	if( $now_hour == 0 ) {
							
		$now_hour = "00:00";
							
	}
	elseif( $now_hour == 24 ) {
							
		$now_hour = "00:00";
							
	}
	else {

		$now_hour = "{$now_hour}:00";

	}

	if( $next_hour == 0 ) {
								
		$next_hour = "00:00";
							
	}
	elseif( $next_hour == 24 ) {
								
		$next_hour = "00:00";
							
	}
	else {

		$next_hour = "{$next_hour}:00";

	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<!-- StartHabbo Version One : Designed & Coded by Tyler Preston -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>StartHabbo - Version One!</title>
	<meta name="build" content="V1-BUILD-128 - 02/08/2016 19:50" />
	<link rel="stylesheet" type="text/css" href="css/global.css" title="Main Styling Sheet" />
	<link rel="icon" type="image/icon" href="images/favicon.ico" title="Website Favicon" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="includes/ajaxpage.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]>
  		<script type="text/javascript" src="includes/excanvas/excanvas.js"></script>
	<![endif]-->
	<script type="text/javascript" src="includes/spinners/spinners.min.js"></script>
	<script type="text/javascript" src="includes/lightview/lightview.js"></script>

	<link rel="stylesheet" type="text/css" href="css/lightview/lightview.css" />
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#radio_stats').load('includes/stats/index.php').fadeIn("slow");
            }, 30000); // refreshing after every 30 seconds
    </script>
	
	<script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#albumart').load('includes/stats/album.php').fadeIn("slow");
            }, 30000); // refreshing after every 30 seconds
    </script>
	
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	 <script type="text/javascript">

      google.load("prototype", "1.6.1.0");
      google.load("scriptaculous", "1.8.3");
      google.load("swfobject", "2.2");

    </script>

	<script type="text/javascript" src="includes/player.js"></script>
	<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAA7_GaYGfYG09Okw7D_L4hMBRTKCr-O3TCBLVG2xkUQLV355ypZBRNZry_GCoNVuImaqW0QGV2ZwlGcg"></script>
</head>
<body onLoad="loadContent(1);">
	<div id="top_backdrop">
		<div class="skyline"></div>
		<div class="container">
			<a href="#"><div class="logo" id="slideRight"></div></a>
			<div class="radio_main_container">
				<div id="radio_stats"><?php include('includes/stats/index.php')?></div>
				
				<script type="text/javascript" src="includes/player.js"></script>
				<div class="radio_player_container">
					<iframe style="margin-top: 7px;" allowtransparency="yes" src="radioplayer/radioplayer.html" scrolling="no" frameborder="no" height="18" width="310"></iframe>
				</div>
			</div>
			<div class="album_art_container"><img style="margin-top: 4px; margin-left: 4px;" src="images/radio/artwork.png"></img></div>
		</div>
	</div>
	
	<!-- Navigation -->
	
	<div id="navi">
		<div id="navi_wrapper">
			<ul>
				<li><a href="javascript:ajaxpage('pages/starthabbo/homepage.php', 'content_container_left');">Homepage</a></li>
				<li><a href="#">StartHabbo</a>
					<ul>
						<li><a href="javascript:ajaxpage('pages/starthabbo/homepage.php', 'content_container_left');">Homepage</a></li>
						<li><a href="javascript:ajaxpage('pages/starthabbo/about.php', 'content_container_left');">About Us</a></li>
						<li><a href="javascript:ajaxpage('pages/starthabbo/team.php', 'content_container_left');">Meet The Team</a></li>
						<li><a href="#">Job Applications</a></li>
						<li><a href="javascript:ajaxpage('pages/starthabbo/disclaimer.php', 'content_container_left');">Disclaimer</a></li>
					</ul>
				</li>
				<li><a href="#">Community</a>
					<ul>
						<li><a href="#">Ask The Staff</a></li>
						<li><a href="javascript:ajaxpage('pages/community/linkus.php', 'content_container_left');">Link Us</a></li>
						<li><a href="#">Donate</a></li>
						<li><a href="javascript:ajaxpage('pages/community/group.php', 'content_container_left');">Our Habbo Group</a></li>
					</ul>
				</li>
				<li><a href="#">Radio</a>
					<ul>
						<li><a href="http://starthabbo.com/portal/_frontend/timetable.php" class="lightview" data-lightview-options="skin: 'light', width: 1280, height: 600">Radio Timetable</a></li>
						
						<li><a href="javascript:ajaxpage('pages/radio/weekly.php', 'content_container_left');">Weekly Shows</a></li>
						<li><a href="javascript:ajaxpage('pages/radio/issues.php', 'content_container_left');">Radio Issues</a></li>
					</ul>
				</li>
				<li><a href="#">Events</a>
					<ul>
						<li><a href="javascript:ajaxpage('pages/events/timetable.php', 'content_container_left');">Events Timetable</a></li>
						<li><a href="javascript:ajaxpage('pages/events/howtoplay.php', 'content_container_left');">How To Play</a></li>
					</ul>
				</li>
				<li><a href="#">Guides</a>
					<ul>
						<li><a href="javascript:ajaxpage('pages/guides/safety.php', 'content_container_left');">Safety on Habbo</a></li>
					</ul>
				</li>
				<li><a href="#">News</a>
					<ul>
						<li><a target="_blank" href="http://www.starthabboforum.com/forumdisplay.php?18-Current-Affairs">Current Affairs</a></li>
						<li><a target="_blank" href="http://www.starthabboforum.com/forumdisplay.php?19-Entertainment">Entertainment</a></li>
						<li><a target="_blank" href="http://www.starthabboforum.com/forumdisplay.php?20-Sports">Sports</a></li>
						<li><a target="_blank" href="http://www.starthabboforum.com/forumdisplay.php?21-Science-and-Health">Science & Health</a></li>
						<li><a target="_blank" href="http://www.starthabboforum.com/forumdisplay.php?22-Technology-and-Gaming">Technology & Gaming</a></li>
					</ul>
				</li>
				<li><a href="http://www.starthabboforum.com" target="_blank">Forum</a></li>
			</ul>
		</div>
	</div>
	
	<div class="container">
		<a href="#"><div class="banner_one"></div></a>
		<a href="#"><div class="banner_two"></div></a>
		
		<div class="welcome_container">
			<h1 class="welcome_text">Welcome to StartHabbo Version One</h1>
			<br />
			Welcome to StartHabbo Version One, a very big warm welcome to the site if this is the first time you have visited the website, or a big welcome back if you have been here before. StartHabbo is currently on Version 1, which has been designed and coded by <strong>Tyler Preston</strong>. If you have not signed up to the StartHabbo forums yet, then you can register easily by clicking <a style="color: #449d4a;" href="http://starthabboforum.com/register.php">here</a>. It is very easy and quick to do!
		</div>
		
		<div id="timetable_container">
			<div class="just_missed">
				<center>
					<strong>Just Missed:</strong><br /><?php
						// Now we find out if someone is currently on
						if ( $prev_query_array['dj'] == "" ) {
							
							// There wasn't, so we tell the user
							echo "No DJ scheduled for the previous hour!";

						}
						else {
	
							// Now we give them the bad news, someone is online :(
							// So now to find out who they are
							
							$who_are_they_prev = $db->query( "SELECT djname FROM users WHERE id='{$prev_query_array['dj']}'" );
							$who_are_they_prev = mysql_result( $who_are_they_prev, 0, "djname");
							echo "DJ " . $who_are_they_prev;
						
						}
					?>
				</center>
			</div>
			
			<div class="on_air_now">
				<center>
					<strong>On Air Now:</strong><br /><?php
						// Now we find out if someone is currently on
						if ( $now_query_array['dj'] == "" ) {
							
							// There wasn't, so we tell the user
							echo "No DJ scheduled for " . $now_hour . "";

						}
						else {
	
							// Now we give them the bad news, someone is online :(
							// So now to find out who they are
							
							$who_are_they_now = $db->query( "SELECT djname FROM users WHERE id='{$now_query_array['dj']}'" );
							$who_are_they_now = mysql_result( $who_are_they_now, 0, "djname");
							echo "DJ " . $who_are_they_now;
							echo " (" . $now_hour . ")";
						
						}
					?>
				</center>
			</div>
			
			<div class="on_air_next">
				<center>
					<strong>On Air Next:</strong><br /><?php
						if ( $next_query_array['dj'] == "" ) {

							// There wasn't, so we tell the user
							echo "No DJ scheduled for " . $next_hour . "";
						}
						else {
							
							// Now we give them the bad news, someone is online :(
							// So now to find out who they are
							$who_are_they_next = $db->query( "SELECT djname FROM users WHERE id='{$next_query_array['dj']}'" );
							$who_are_they_next = mysql_result( $who_are_they_next, 0, "djname");
							echo "DJ " . $who_are_they_next;
							echo " (" . $next_hour . ")";
						
						}
					?>
				</center>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div id="content_container_left">
			<?php include('pages/starthabbo/homepage.php');?>	
		</div>
	</div>
	
	<div class="container">
		<div class="content_container_right">
			<div class="request_content_top">
				<div class="small_green_header">
					<img src="includes/v.php?t=REQUEST LINE&s=7&w=1" style="margin-left: 10px; margin-top: 18px;"></img>
				</div>
			</div>
			
			<div class="request_content_mid">
				<?php include('requestline.php');?>
			</div>
			
			<div class="request_content_bot"></div>
		</div>
	</div>
				