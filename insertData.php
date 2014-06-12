<!DOCTYPE html>
<html>
    <head>
        <title>Superbowl Squares</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/mystyle.css">		
    </head>
    <body>
        <br>
<?php
	include 'config.php';
	include 'DBConnector.class.php';
	
	function goBackLink() {
		$home_url = "index.php";
		echo "<form action = " . $home_url . "><input id='button' type='submit' value='Back'></form>";
	}

	function checkForDuplicates($squaresDB, $squares_arr) {
		$master = array();  
		$sql = "SELECT * FROM players";
		$result = $squaresDB->query($sql); 
		while($row = $squaresDB->fetchArray($result)) {
			$temp = explode(',', "$row[squares]");
			foreach($temp as $value) {
				array_push($master, $value);
			}
		}
	
		foreach($squares_arr as $value) {
			array_push($master, $value);
		}

		$temp_arr = array_count_values($master);
		$duplicates = array();

		foreach($temp_arr as $key => $value) {
			if ($value > 1) {
				array_push($duplicates, $key);
			}
		}

		sort($duplicates, SORT_REGULAR);
		return $duplicates;
	}

	$squaresDB = new DBConnector($link);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $squares = str_replace(' ', '', $_POST['squares']);
	$squares_arr = array_filter(explode(',', $squares));

	$valid = true;	

	echo "Hi " . $first_name . " " . $last_name . " (" . $email . ")!\n";
	echo "<br><br>\n";

	// Check to make sure there are no empty fields.
	// This happens if insertData.php is somehow accessed directly!
	if ($first_name == "" || $last_name == "" || $email == "" || $squares == "") {
		$valid = false;
	}
	
	// Check to make sure user didn't select more than maximum number of squares.
    if (count($squares_arr) > $max_squares) {
		echo "<font color = 'red'>You've selected too many squares! Only " 
		. $max_squares . " squares per person are allowed.\n";
		echo "</b></font><br><br>\n";
		$valid = false;
	}
		
	// Check to make sure that there are no duplicates.
	// Duplicates happen if two users are choosing squares at the same time, so duplicate checking 
	// should be done on server side.
	$duplicates = checkForDuplicates($squaresDB, $squares_arr);
	if (count($duplicates)) {
		echo "<font color='red'>Duplicate square(s) found! You have selected a square that has already been taken.\n";
		echo "</font><br><br>\n";
		$valid = false;
	}	
	
	// Something went wrong, redirect to home page. 
	if ($valid == false) {	
		echo "Please go back and edit your selections.\n";
		echo "<br><br>\n";
		goBackLink();
	}
		
	// Data is valid, continue.
	else {
		echo "Entering your squares into the database... \n";	

		$sql = "INSERT INTO players (first_name, last_name, email, squares) "
			. "VALUES ('" . $first_name . "', '" . $last_name ."', '" . $email . "', '"
			. $squares . "')";

		// Duplicate email exists in database.
		if (!$squaresDB->query($sql)) {
			echo "email address <b>" . $email . "</b> exists in database!\n";
			echo "<br><br>\n";
			$sql = "SELECT * FROM players WHERE email='" . $email . "'";
			$result = $squaresDB->query($sql);
			$row = $squaresDB->fetchArray($result);
			$temp = explode(',', "$row[squares]");
			
			echo "Player: " . "$row[first_name]" . " " . "$row[last_name]" . "\n";
			echo "<br>\n";
			echo "Email: " . "$row[email]" . "\n";
			echo "<br>\n";

			// Player already has max number of squares
			if (count($temp) == $max_squares) {
				echo "<br>You already have the maximum number of squares allowed"
					. " per player, you can't add any more squares.\n";
				echo "<br><br>\n";
				goBackLink();
			}

			// Add additional squares for the player
			else {
				$num = $max_squares - count($temp);
				echo "Square(s) available: " . $num . "\n";
				echo "<br><br>\n";

				if (count($squares_arr) <= $num) {
					$temp_str = "$row[squares]";
					foreach($squares_arr as $value) {
						$temp_str .= "," . $value;
					}
				
					$sql = "UPDATE players SET squares='" . $temp_str . "' WHERE email='" . $email . "'";
					$squaresDB->query($sql);
					echo "Entering square(s) into the database... <font color='green'>success!</font>\n";
					echo "<br><br>\n"; 
					echo "<h2>Thanks for playing " . "$row[first_name]" . ", and good luck!</h2>\n";
					echo "<br>\n";
					goBackLink();
				}
				else {
					echo "<font color='red'> You've entered too many squares. Please go back and re-enter your squares.\n";
					echo "</font><br><br>\n";
					goBackLink();
				}
			}
		} 
		// all good  
		else {
			echo "<font color='green'>success!</font>\n";
			echo "<br><br>\n";
			echo "<h2>Thanks for playing " . $first_name . " and good luck!</h2>\n";
			echo "<br>\n";
			goBackLink();
		}
		
		$squaresDB->close();
		echo "\n";
	}
?>
	</body>
</html>