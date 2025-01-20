window.onload = function(){
    var canvas, ctx, clear;
    var webSocket = new WebSocket('ws://10.0.100.160:8888');
    var isConnect = false;
    var isDrag = false;

    webSocket.onopen = function(event){
        isConnect = true;
    };
    webSocket.onclose = function(event){
        isConnect = false;
    };

    clear = document.getElementById('clear');
    canvas = document.getElementById('myDrawer');
    ctx = canvas.getContext('2d');

    clear.addEventListener('click',function(event){
        ctx.clearRect(0,0,canvas.width, canvas.height);
    });

    canvas.addEventListener('mousedown',function(event){
        isDrag = true;
        var x = event.offsetX, y = event.offsetY;
        ctx.beginPath();
        ctx.lineWidth = 4;
        ctx.moveTo(x, y);
    });
    canvas.addEventListener('mouseup',function(event){
        isDrag = false;
    });
    canvas.addEventListener('mousemove',function(event){
        if (isDrag){
            var x = event.offsetX, y = event.offsetY;
            ctx.lineTo(x, y);
            ctx.stroke();
        }
    });



}