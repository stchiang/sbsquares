<!DOCTYPE html>
<html>
    <head>
        <title>Superbowl Squares</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/mystyle.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>    
    <body>
        <?php include "getData.php"; ?>
        <table>
            <tr>
                <td></td>
                <td>
                    <img width="680" height="80" src="images/afc.jpg">
                </td>
                <td></td>
            </tr>    
            <tr>
                <td>
                    <img height="680" width="80" src="images/nfc.jpg">
                </td>
                <td>
                    <canvas id="canvas" width="680" height="680">             
                        <p>
                            You can't see these paragraphs if your browser supports HTML5 canvas.
                        </p>
                        <p>
                            If you can see them, that means you can't see my superbowl squares.                           
                        </p>
						<p>
							 You should consider downloading a newer browser! 
						</p>
                    </canvas>                                       
                </td>
                <td id = "rules">
                    <h2>Rules</h2>
                    <ul>
                        <li>Cost is $5 per square (limit 5 squares per player).</li>
                        <li>Numbers will be chosen randomly after all squares have been purchased.</li>
                        <li>Payoff based upon the last digit of each team's score.</li>
                    </ul>
                    <ul>
                        <li>Every score change (including extra points) gets $20.</li>
                        <li>End of 1st, half, and 3rd each get $30.</li>
                        <li>Final score gets remaining money (if any).</li> 
                        <li>Prizes are awarded until the money runs out.</li>
                    </ul>
                    <p> 
                        Please fill out the following form with your name and unique email address, and 
                        select the squares you would like to pick by clicking them on the board. Press the 
                        Submit button below once you've finished. 
					</p>
                    <form name="myForm" action="insertData.php" method="post" onSubmit="return validateData(this)">
                        <label>First Name:</label> <input type="text" name="first_name" value="" maxlength="10" required><br>
                        <label>Last Name:</label> <input type="text" name="last_name" value="" maxlength="15" required><br>
                        <label>E-mail:</label> <input type="email" name="email" value="" maxlength = "50" required><br>
                        <input type="hidden" name="squares" value="">
                        <br>
                        <label></label><input type="submit" value="Submit" onclick="setSquaresValue()">
                    </form>
                    <br>
                </td>
            </tr>
        </table>
		<script src="js/validateData.js"></script>
        <script src="js/drawBoard.js"></script>
        <script>
        function setSquaresValue(){
            document.myForm.squares.value = mysquares;
        }
        </script>
        </body>
    </html>
