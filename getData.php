<?php
    include 'config.php';
    include 'DBConnector.class.php';
    
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

    /*
     * HIGHLIGHT SQUARE WINNERS
     * UNCOMMENT FOR COMPLETED SQUARE
     *
    $winnersDB = new DBConnector($link);
    $sql = "SELECT * FROM winners";
    $result = $winnersDB->query($sql);
    $winners_arr = array();
    $winner_info_arr = array();

    while($row = $winnersDB->fetchArray($result)) {
        $temp_winner = $row[SQUARE]; 
        array_push($winners_arr, $temp_winner);
        $temp_arr = array($row[DEN], $row[SEA], $row[SQUARE], $row[TYPE]);
        array_push($winner_info_arr, $temp_arr);
    }
    */
    echo "<script>\n            var taken_squares = " . json_encode($squares_arr)
         . "\n            var player_names = " . json_encode($names_arr)
         //. "\n            var winning_squares = " . json_encode($winners_arr)
         //. "\n            var winner_info = " . json_encode($winner_info_arr)
         . "\n        </script>\n";

    $squaresDB->close();
?>