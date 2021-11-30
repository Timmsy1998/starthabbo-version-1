<script language="javascript" type="text/javascript" src="http://ic.starthabbo.com:2199/system/streaminfo.js"></script>
<?php
        require_once( "albumdb.php" );
        // Radio Information - Panel
        $query = $db->query( "SELECT * FROM connection_info ORDER BY id DESC LIMIT 1" );
        $array = $db->assoc( $query );
        $stats = $core->radioInfo( "http://" . $array['host'] . ":" . $array['port'] );

class LastFM {
	const API_KEY = "bcfd26d3e561981e9bd88cf751ae6c59";	// Last FM API Key.
	
	/* Size map, links the array indice to the actual words */
	public static $size_map = array("small" => 0, "medium" => 1, "large" => 2, "extralarge" => 3, "mega" => 4, "megaz" => 151);
	
	/*
	 * Get the actual album artwork.
	 */
	public static function getArtwork($artist, $return_image = false, $size = 'mega') {
		$artist	= <span id="cc_strinfo_trackartist_starthabbo" class="cc_streaminfo"></span>;

		$xml	= "http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist={$artist}&api_key=" . self::API_KEY;
		$xml	= @file_get_contents($xml);
		
		if(!$xml) {
			return;  // Artist lookup failed.
		}
		
		$xml = new SimpleXMLElement($xml);
		$xml = $xml->artist;
		$xml = $xml->image[self::$size_map[$size]];
		
		return (!$return_image) ? $xml : '<img src="' . $xml . '"  style="width: 86px; height: 85px;" />';
	}
}
?>