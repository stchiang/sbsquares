var len = 660;
var p = 10;

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

function drawGrid(){
	var imageObj = new Image();
    imageObj.onload = function() {
		context.drawImage(imageObj, 11, 11);
     }
    imageObj.src = "images/sb.jpg";

    context.fillStyle = "#FFFFFF";
    context.fillRect(10, 10, 660, 660);
	
    context.beginPath();
    for (var x = 0; x <= len; x += 60) {
        context.moveTo(0.5 + x + p, p);
        context.lineTo(0.5 + x + p, len + p);
        context.moveTo(p, 0.5 + x + p);
        context.lineTo(len + p, 0.5 + x + p);
    }
    context.strokeStyle = "black";
    context.lineWidth = 0.5;
    context.stroke();
}

function fillBoxes()
{    
    context.font = "11px Arial";
	context.textAlign="center";
    for (var i = 0; i < taken_squares.length; i++) {
        var first_last = player_names[i].split(' ');
        var temp_arr = taken_squares[i];
        for (j = 0; j < temp_arr.length; j++) {
            var a = temp_arr[j]%10;        
            var b = Math.floor((temp_arr[j]/10));
            if (a === 0) {
                a = 10;
                b -= 1;
            }
            context.fillStyle = "#FF6347";
            context.fillRect(p + (60*a) + 1, p + (60*b) + 61, 59, 59); 
            context.fillStyle = "white";
            context.fillText(first_last[0], p + (60*a) + 30, p + (60*b) + 96, 58);
            context.fillText(first_last[1], p + (60*a) + 30, p + (60*b) + 111, 58);
        }
    }            
    context.fillStyle = "#DCDCDC";    
    for (var x = 0; x < 10; x++) {        
        context.fillRect(p + 1 + (60*(x+1)), p + 1, 59, 59);
        context.fillRect(p + 1, p + 1 + (60*(x+1)), 59, 59);
    }    
    context.fillStyle = "black";    
}

function placeNumbers() {
    var arr1 = [0,1,2,3,4,5,6,7,8,9];
    var arr2 = [0,1,2,3,4,5,6,7,8,9];
    context.font="30px Arial";
    var a = 23+p;
    var b = 40+p;
    for (var x = 0; x < 10; x++) {        
        context.fillText(arr1[x], a, b + 60 + (60*x));
        context.fillText(arr2[x], a + 60 + (60*x), b);                    
    }                
}

function labelSquares() {
    context.font="10px Arial";	
	context.textAlign="start";
    var a = 63+p;
    var b = 70+p;
    for (var x = 0; x < 10; x++)
        for (var y = 0; y < 10; y++)
            context.fillText((10*y)+ x + 1, a + (60*x), b + (60*y));            
}

function drawThickBorders() {
    context.beginPath();
    context.moveTo(0.5 + 60 + p, p);
    context.lineTo(0.5 + 60 + p, len + p);
    context.moveTo(p, 0.5 + 60 + p);
    context.lineTo(len + p, 0.5 + 60 + p);
    context.rect(10, 10, 660, 660);
    context.strokeStyle = "black";
    context.lineWidth = 2;
    context.stroke();
}

//run functions
drawGrid();
fillBoxes();
labelSquares();
//placeNumbers();
drawThickBorders();