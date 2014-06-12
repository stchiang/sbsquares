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
        <table id="main">
            <tr>
                <td></td>
              <td style="text-align: center">
                    <img width="650" src="images/broncos.jpg">
                </td>
                <td></td>
                <!--
                <td id="rules">
                    <h2>Rules</h2>
                    <ul>
                        <li>Every score change (including extra points) gets $20.</li>
                        <li>End of 1st, half, and 3rd each get $30.</li>
                        <li>Final score gets remaining money (if any).</li> 
                        <li>Prizes are awarded until the money runs out.</li>
                    </ul>              
                </td>
                -->
            </tr>    
            <tr>
                <td style="vertical-align: top; padding-top: 15px">
                    <img height="650" src="images/seahawks.jpg">
                </td>
                <td id="board">
                    <canvas id="canvas" width="680" height="680">
                        <p>
                            You can't see these paragraphs if your browser supports HTML5 canvas. <br>
                            If you can see them, that means you can't see my superbowl squares. <br>
                            You should consider downloading a newer browser! 
                        </p>
                    </canvas>
                </td>
                <td id="rules">                    
                    <h2>Rules</h2>
                    <ul>

                        <li>Cost is $5 per square (limit 5 squares per player).</li>
                        <li>Numbers will be chosen randomly after all squares have been purchased.</li>
                        <li>Payoff based upon the last digit of each team's score.</li>
                        <br>
                        <li>Every score change (including extra points) gets $20.</li>
                        <li>End of 1st, half, and 3rd each get $30.</li>
                        <li>Final score gets remaining money (if any).</li> 
                        <li>Prizes are awarded until the money runs out.</li>
                    </ul>
                    <p> 
                        Please fill out the following form with your first name, last name, and email address, and 
                        select the squares you would like to pick by clicking them on the board.<br><br>
                        Once you've finished, click the Submit button below to submit your squares. 
                    </p>
                    <form name="myForm" action="insertData.php" method="post" onSubmit="return validateData(this)">
                        <label>First Name:</label> <input type="text" name="first_name" value="" maxlength="15" required><br>
                        <label>Last Name:</label> <input type="text" name="last_name" value="" maxlength="15" required><br>
                        <label>E-mail:</label> <input type="email" name="email" value="" maxlength = "50" required><br>
                        <input type="hidden" name="squares" value="">
                        <br>
                        <label></label><input id="button" type="submit" value="Submit" onclick="setSquaresValue()">
                    </form>
                    <br>
                    <!--                    
                    <h2> Scoreboard </h2>
                    <table id="player-info">
                        <tr>
                            <th> DEN </th>
                            <th> SEA </th>
                            <th> Winner </th>
                            <th> Reason </th>
                            <th> Amount </th>
                        </tr>
                        <script src="js/generateWinnersTable.js"></script>                      
                    </table>
                    -->
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
