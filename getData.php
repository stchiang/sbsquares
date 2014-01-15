<?php
    include '/config.php';
    include '/DBConnector.class.php';
    
    $squaresDB = new DBConnector($link);
    $sql = "SELECT * FROM players";
    $result = $squaresDB->query($sql);
    $names_arr = array();
    $squares_arr = array();
    
    while($row = $squaresDB->fetchArray($result)) {
        $temp_name = "$row[first_name] " . "$row[last_name]"; 
        $temp_squares = explode(',', "$row[squares]");
        array_push($names_arr, $temp_name);
        array_push($squares_arr, $temp_squares);
    }
    
    echo "<script>\n            var taken_squares = " . json_encode($squares_arr)
         . "\n            var player_names = " . json_encode($names_arr)
         . "\n        </script>\n";

    $squaresDB->close();
?>