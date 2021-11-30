<?php
        require_once( "glob.php" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
 <style type="text/css" media="screen">
 
                       .wrapper {
                                width: 400px;
                                margin: auto;
                                padding: 5px;
                                margin-top: 15px;
                                height: auto;
                                overflow: hidden;
								color: #469D4A;
 
                        }
						.staff {
                       
                                width: 130px;
                                height: auto;
                                overflow: hidden;
                                float: left;
								color: #469D4A;
               
                        }
						a:link {
							color: #469D4A;
						}
						</style>
						</head>
						<body>
<div class="wrapper">
<?php
        $query = $db->query( "SELECT username,displaygroup,habbo,djname,role FROM users WHERE displaygroup = 2 ORDER BY role DESC" );
        $num = $db->num($query);
        while( $array = $db->assoc( $query ) ) {
       
        $id = $array['id'];
        if( $array['displaygroup'] == "2" ) {
        $displaygroup = "<strong>Radio DJ</strong>";
        }
        echo "
        <div class=\"staff\" align=\"center\">
        <img src=\"http://www.habbo.com/habbo-imaging/avatarimage?user=".$array['habbo']."&action=0&direction=4&head_direction=3&gesture=0&size=s\" border=\"0\"><br />
		<strong>".$array['role']."</strong><br />
        <strong><a href=\"http://www.habbo.com/home/".$array['habbo']."\" target=\"_blank\">".$array['habbo']."</a></strong><br />
		<i>DJ ".$array['djname']."</i>
        </div>
        ";
        }
        if($num == 0 ) {
        echo "<div class=\"bad\">There's currently no user's in this user group.</div>";
        }
        ?>
	</div>
	</body>
	</html>