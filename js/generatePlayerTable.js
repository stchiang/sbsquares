var list = new Array();

for (var j=0; j<player_names.length; j++) {
    list.push({'name': player_names[j], 'squares': taken_squares[j]});
}

list.sort(function(a, b) {
    return ((a.name.toLowerCase() < b.name.toLowerCase()) ? -1 : 
        ((a.name.toLowerCase() == b.name.toLowerCase()) ? 0 : 1));
});

for (var k=0; k<list.length; k++) {
    player_names[k] = list[k].name;
    taken_squares[k] = list[k].squares;
}

for (var i=0; i<player_names.length; i++) {
    document.write("<tr><td>");
    document.write(player_names[i]);
    document.write("</td><td style='text-align: center;'>");
    document.write(taken_squares[i].length);
    document.write("</td><td style='text-align: center;'>");
    document.write("$" + taken_squares[i].length * 5);
    document.write("</td></tr>");
}