var len = 660;
var p = 10;

var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
var mysquares = new Array();

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
            if (first_last[0].length > 8) {
                first_last[0] = first_last[0].substring(0, 8) + "..";
            }
            if (first_last[1].length > 8) {
                first_last[1] = first_last[1].substring(0, 8) + "..";
            }
            context.fillText(first_last[0], p + (60*a) + 30, p + (60*b) + 90, 58);
            context.fillText(first_last[1], p + (60*a) + 30, p + (60*b) + 105, 58);
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

function getMousePos(canvas, evt) {
    var rect = canvas.getBoundingClientRect();
    return {
      x: evt.clientX - rect.left - 70,
      y: evt.clientY - rect.top - 70
    };
}

function rgbToHex(r, g, b) {
    if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
    return ((r << 16) | (g << 8) | b).toString(16);
}

// Draw the board and its corresponding elements
drawGrid();
fillBoxes();
//placeNumbers();
drawThickBorders();

// Mouse listener
canvas.addEventListener('mousemove', function(evt) {
    var mousePos = getMousePos(canvas, evt);
    var message = mousePos.x + ',' + mousePos.y;
    }, false);

$("#canvas").click(function(e){
    var x = e.pageX-$("#canvas").offset().left - 70;
    var y = e.pageY-$("#canvas").offset().top - 70;
    if (x >= 0 && y >= 0 && x < 600 && y < 600) {
        var a = Math.floor(x/60);
        var b = Math.floor(y/60);
        var p = context.getImageData((60*a) + 101, (60*b) + 81, 1, 1).data;
        var hex = "#" + ("000000" + rgbToHex(p[0], p[1], p[2])).slice(-6);
        var num = a + (10*b) + 1;
        if (hex == "#ffffff") {
            context.fillStyle = "#7ddeff";
            context.fillRect(74 + (60*a), 74 +(60*b), 53, 53);    
            mysquares.push(num);
        }
        else if (hex == "#7ddeff") {
            context.fillStyle = "#ffffff";
            context.fillRect(74 + (60*a), 74 +(60*b), 53, 53);
            for (var x = 0; x < mysquares.length; x++) {
                if (mysquares[x] == num) {
                    mysquares.splice(x, 1);
                }
            }                    
        }        
    }
}
);