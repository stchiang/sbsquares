function findOwner(temp) {
    for (var j=0; j<taken_squares.length; j++) {
        var k = taken_squares[j].indexOf(temp);
        if (k >= 0) {
            return player_names[j];
        }
    }
}

function findType(temp) {
    if (temp == "one") {
        return "score change";
    }
    else if (temp == "two") {
        return "end of quarter";
    }
    else if (temp == "three") {
        return "final score";
    }
}

var pool = 500;
for (var i=0; i<winner_info.length; i++) {
    if (i % 2 == 1) {
        document.write("<tr style='background-color: #DCDCDC'><td>");
    }
    else {
        document.write("<tr><td>");
    }
    document.write(winner_info[i][0]);
    document.write("</td><td>");
    document.write(winner_info[i][1]);
    document.write("</td><td>");
    document.write(findOwner(winner_info[i][2]));
    document.write("</td><td>");
    document.write(findType(winner_info[i][3]));
    document.write("</td><td>");
    var amount = 0;
    if (winner_info[i][3] == "one") {
        if (pool >= 20) {
            amount = 20;
            pool -= 20;
        }
        else {
            amount = pool;
            pool = 0;            
        }        
    }
    else if (winner_info[i][3] == "two") {
        if (pool >= 30) {            
            amount = 30;
            pool -= 30;
        }
        else {
            amount = pool;
            pool = 0;            
        }        
    }
    else if (winner_info[i][3] == "three") {
        amount = pool;
        pool = 0;
    }
    document.write("$" + amount);
    document.write("</td></tr>");
}
document.write("<tr style='border-top: 2px solid black; background-color: LightYellow'><td colspan=4 style='text-align: right'><b>Money left:</b></td>");
document.write("<td><b>$" + pool + "</b></td>");
