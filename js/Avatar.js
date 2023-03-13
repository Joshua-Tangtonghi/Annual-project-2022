let a=-1;
var array_color=["yellow","white"];






function color() {

    let somme = ++a;
    var canvas = document.getElementById('canvasId');
    var ctx = canvas.getContext('2d');

    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = 50;

    ctx.beginPath();
    ctx.fillStyle = array_color[somme];
    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;

    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
    ctx.fill();
    ctx.stroke();

    console.log(array_color[somme]);
    console.log(somme);

}
  function image () {


        var yeux = new Image();
        yeux.src = 'Avatar/eyes1.png';
        var bouche = new Image();
        bouche.src = 'Avatar/Face1.png';

        bouche.onload = function () {
            fill_canvas(bouche, yeux);

        }

        function fill_canvas(bouche, yeux) {
            var canvas = document.getElementById('canvasId');
            var ctx = canvas.getContext('2d');


            ctx.drawImage(bouche, 10, 50);
            ctx.drawImage(yeux, 10, 0);
        }
    }

