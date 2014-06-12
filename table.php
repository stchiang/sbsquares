<!DOCTYPE html>
<html>
    <head>
        <title>Superbowl Squares</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/mystyle.css">
    </head>    
    <body>
        <?php include "getData.php"; ?>
        <table id="player-info">
            <tr>
                <th style='text-align: left; padding-left: 0px;'> Player </th>
                <th> Squares </th>
                <th> Cost </th>
            </tr>
            <script src="js/generatePlayerTable.js"> </script>
            <tr>
                <td style='text-align: left; padding-left: 0px;'>
                    <br>
                    <script> 
                        document.write('Total players: ' + player_names.length + '<br>'); 
                        var count = 0;
                        for (var i = 0; i < taken_squares.length; i++) {
                            count += taken_squares[i].length;
                        }
                        document.write('Total squares taken: ' + count + '<br>');
                        document.write('Squares remaining: ' + (100-count) + '<br>');
                    </script>
                </td>
            </tr>
        </table>    
    </body>
</html>