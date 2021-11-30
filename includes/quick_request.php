<?php require_once( "../../../staff_panel/_inc/glob.php" ); ?>
<style>
.inputstuff {
   width: 230px;
   padding: 5px;
   background: #fff;
   box-shadow: 0 -1px #fff inset;
   font-weight: verdana;
   font-size: 12px;
   color: #000;
   border: 1px solid #bbbbbb;
   outline: none;
   display: inline-block;
   border-radius: 3px;
}

.button {
   padding: 7px 15px 7px 15px;
   background: #fff;
   border: 1px solid #CCCCCC;
   border-radius: 3px;
   font-size: 13px;
   color: #333;
   outline: none;
   border: 1px solid #bbbbbb;
   box-shadow: inset 0 -1px #fff;
   display: inline-block;
}

.button:hover {
   background: #EBEBEB;
   color: #333;
   box-shadow: inset 0 -1px #EBEBEB;
}
</style>
			
			

			<span id="resultt"></span>
<div style="width: 250px; margin: 0 auto 0 auto;">
			<form action="../../_includes/jqueryRequests.php" method="post" id="requestformm">
				<input type="text" name="habbo" id="habbo" maxlength="255" placeholder="Habbo Name" class="inputstuff" />

				<br />

				<select name="type" id="type" style="width: 242px;" class="inputstuff">
				
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
			
				<br />

				<select name="dj" id="dj" style="width: 242px;" class="inputstuff">

					<?php

						$query  = $db->query( "SELECT * FROM connection_info ORDER BY id DESC LIMIT 1" );
						$array  = $db->assoc( $query );
						
						$info   = $core->radioInfo( "http://{$array['host']}:{$array['port']}" );

						$query2 = $db->query( "SELECT * FROM users" );

						while( $array2 = $db->assoc( $query2 ) ) {

					?>

					<option<?php if( preg_match( "/{$array2['username']}/", $info['streamtitle'] ) ) { ?> selected="selected"<?php } ?> value="<?php echo $array2['id']; ?>">
						DJ <?php echo $array2['username']; ?>
					</option>


					<?php

						}

					?>

				</select>
				
				<br />
				
				<textarea name="request" id="request" rows="6" placeholder="This is default text, once you start typing this will vanish!" class="inputstuff"></textarea>
				
				<br />
				
				<div style="width: 96px; margin: 0 auto 0 auto;"><input class="button" type="submit" name="submit" value="Submit" style="border-radius: 3px;" /></div>
				
			</form>
			</div>	