<?php
	require_once( "../portal/_inc/glob.php" );

	// Set the location of the requests.status file
	$requests_status = "../portal/_inc/requests.status";
	
	// First, we check the availiability of the status file
	if ( file_exists( $requests_status ) ) {
	
		$result = file_get_contents( $requests_status );
	
	}
	
	// We also declare some variables to store the current hour and date
	$now_date = date( 'N' );
	$now_hour = date( 'H' );
	
	// Now we have that, we can find out who is scheduled to be on now!
	$booked_query = $db->query( "SELECT * FROM timetable WHERE day = '{$now_date}' AND time = '{$now_hour}'" );
	$booked_array = $db->assoc( $booked_query );
	
	// And if no-one is on, we disable the request line!
	if ( $booked_array['dj'] == "" ) { $result = "0"; };
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>

		<title>radiPanel Request Line</title>

		<style type="text/css" media="screen">

			body {

				
				padding: 0;
				margin: 0;

			}

			body, input, select, textarea {

				font-family: Verdana, Tahoma, Arial;
				font-size: 11px;
				color: #333;

			}

			form {
	
				padding: 0;
				margin: 0;
	
			}

			.wrapper {

				
				width: 400px;
				margin: auto;
				padding: 5px;
				margin-top: 15px;

			}

			.title {

				padding: 5px;	
				margin-bottom: 5px;
				font-size: 14px;
				font-weight: bold;
				
				color: #444;

			}

			.good, .bad {
			
				padding: 5px;	
				margin-bottom: 5px;
			
			}
			
			.good strong, .bad strong {
			
				font-size: 12px;
				font-weight: bold;
			
			}
			
			.good {
	
				
				border-color: #ade5a3;
				color: #1b801b;
	
			}
	
			.bad {

	
				
				border-color: #e5a3a3;
				color: #801b1b;
	
			}

			input, select, textarea {

				border: 1px #e0e0e0 solid;
				border-bottom-width: 2px;
				padding: 3px;

			}

			input {
		
				width: 170px;
		
			}
			
			input.button {
			
				width: auto;
				cursor: pointer;
				background: #eee;
			
			}
			
			select {
			
				width: 176px;
			
			}
			
			textarea {
			
				width: 288px;
			
			}
			
			label {
			
				display: block;
				padding: 3px;
			
			}
			
		</style>

	</head>

	<body>

		<div class="wrapper">

			<?php
				
				if( $_POST['submit'] ) {
					
					try {
					
						$habbo   = $core->clean( $_POST['habbo'] );
						$type    = $core->clean( $_POST['type'] );
						$dj      = $core->clean( $_POST['dj'] );
						$request = $core->clean( $_POST['request'] );
						$ip      = $_SERVER['REMOTE_ADDR'];
						$time    = time();
	
						if( !$habbo or !$type or !$dj or !$request or !is_numeric( $dj ) or !is_numeric( $type ) ) {
	
							throw new Exception( "All fields are required" );
	
						}
						else {
						
							$db->query( "INSERT INTO requests VALUES (NULL, '{$type}', '{$dj}', '{$habbo}', '{$request}', '{$time}', '{$ip}');" );

							echo "<div class=\"good\">";
							echo "<strong>Success</strong>";
							echo "<br />";
							echo "Request sent!";
							echo "</div>";

						}
					
					}
					catch( Exception $e ) {
					
						echo "<div class=\"bad\">";
						echo "<strong>Error</strong>";
						echo "<br />";
						echo $e->getMessage();
						echo "</div>";
					
					}
					
				}
				
			?>

			<form action="" method="post">
				
				<label for="habbo">Habbo name:</label>
				<input type="text" name="habbo" id="habbo" maxlength="255" />
				
				<label for="type">Message type:</label>
				<select name="type" id="type">
				
					<?php
						
						$query = $db->query( "SELECT * FROM request_types" );
						
						while( $array = $db->assoc( $query ) ) {
						
					?>
					
					<option value="<?php echo $array['id']; ?>">
						<?php echo $array['name']; ?>
					</option>
					
					
					<?php
						
						}
						
					?>
				
				</select>
				
				<label for="dj">DJ:</label>
				<select name="dj" id="dj">

					<?php

						$query  = $db->query( "SELECT * FROM connection_info ORDER BY id DESC LIMIT 1" );
						$array  = $db->assoc( $query );
						
						$info   = $core->radioInfo( "http://{$array['host']}:{$array['port']}" );

						$query2 = $db->query( "SELECT * FROM users" );

						while( $array2 = $db->assoc( $query2 ) ) {

					?>

					<option<?php if( preg_match( "/{$array2['username']}/", $info['streamtitle'] ) ) { ?> selected="selected"<?php } ?> value="<?php echo $array2['id']; ?>">
						DJ <?php echo $array2['djname']; ?>
					</option>


					<?php

						}

					?>

				</select>
				
				<br /><br />
				
				<label for="request">Request:</label>
				<textarea name="request" id="request" rows="5"></textarea>
				
				<br /><br />
				
				<input class="button" type="submit" name="submit" value="Submit" />
				
			</form>

		</div>

	</body>

</html>