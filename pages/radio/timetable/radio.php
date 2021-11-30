<?php
	require_once( "glob.php" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>

		<title>Radio Timetable</title>

		<style type="text/css" media="screen">

			body {

				background:;
				padding: 0;
				margin: 0;

			}

			body, input, select, textarea {

				font-family: Verdana, Tahoma, Arial;
				font-size: 9px;
				color: black;

			}

			form {

				padding: 0;
				margin: 0;

			}

			.wrapper {

				
				width: 450px;
				margin: auto;
				padding: 5px;
				margin-top: 15px;
				border-radius: 5px

			}

			.title {

				padding: 5px;	
				margin-bottom: 5px;
				font-size: 14px;
				font-weight: bold;
				background-color: lightblue;
				color: white;
				border-radius: 5px;


			}

			.content {

				padding: 5px;

			}

			.good, .bad {

				padding: 5px;	
				margin-bottom: 5px;

			}

			.good strong, .bad strong {

				font-size: 14px;
				font-weight: bold;

			}

			.good {

				background-color: #d9ffcf;
				border-color: #ade5a3;
				color: #1b801b;

			}

			.bad {

				background-color: #ffcfcf;
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
<body>

         <div class="wrapper"> 
     
            <table width="100%" cellpadding="3" cellspacing="0"> 
                 
                <tr> 
                 
                    <td width="18.5%" class="bg"></td> 
                     
                    <td width="18.5%" class="bg"> 
                        Monday 
                    </td> 
                 
                    <td width="18.5%" class="bg"> 
                        Tuesday 
                    </td> 

                    <td width="18.5%" class="bg"> 
                        Wednesday 
                    </td> 

                    <td width="18.5%" class="bg"> 
                        Thursday 
                    </td> 

                    <td width="18.5%" class="bg"> 
                        Friday 
                    </td> 

                    <td width="18.5%" class="bg"> 
                        Saturday 
                    </td> 

                    <td width="18.5%" class="bg"> 
                        Sunday 
                    </td> 

                </tr> 
                 
                <?php 
     
                    for( $i = 0; $i <= 23; $i++ ) { 
                         
                        $k = $i + 1; 
                         
                        if( $i < 10 ) { 
     
                            $time = "0{$i}:00"; 
     
                        } 
                        else { 
     
                            $time = "{$i}:00"; 
     
                        } 

                        if( $k < 10 ) { 

                            $time2 = "0{$k}:00"; 

                        } 
                        elseif( $k == 24 ) { 
                             
                            $time2 = "00:00"; 
                             
                        } 
                        else { 

                            $time2 = "{$k}:00"; 

                        } 

                        echo "<tr>"; 
     
                        echo "<td width=\"18.5%\" class=\"bg\">"; 
                        echo $time . " - " . $time2; 
                        echo "</td>"; 
     
                        for( $j = 1; $j <= 7; $j++ ) { 
     
                            $query = $db->query( "SELECT * FROM timetable WHERE day = '{$j}' AND time = '{$i}'" ); 
                            $array = $db->assoc( $query ); 
     
                            $query2 = $db->query( "SELECT * FROM users WHERE id = '{$array['dj']}'" ); 
                            $array2 = $db->assoc( $query2 ); 

                        $query3 = $db->query( "SELECT * FROM usergroups WHERE id = '{$array2['displaygroup']}'" ); 
                        $array3 = $db->assoc( $query3 ); 
     
                            echo "<td width=\"18.5%\" align=\"center\">"; 
                                                    echo "<span style=\"color: #{$array3['colour']}; font-weight: bold;\">"; 
                            echo $array2['username'] ? $array2['username'] : '-'; 
                                                        echo "</span>"; 
     
                            echo "</td>"; 
     
                        } 
     
                        echo "</tr>"; 
     
                    } 
     
                ?> 
     
            </table> 
     
        </div> 

    </body>
		
	</body>

</html>