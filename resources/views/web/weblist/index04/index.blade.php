<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>在线画图思密达</title>
    <style>
        *{padding:0;margin:0;}
        body{background: #abcdef;}
        #header, #footer {width:500px;height:100px;margin: 0 auto;text-align: center;line-height: 100px;}
        #content {width:800px;height:600px;margin: 0 auto;background: #999999;}
        #content #operation{width:100%;height:120px;margin:0 auto;background: #f8f8f8;}
        #operation li {list-style: none;width:159px;height:120px;float:left;border-right: 1px solid #DF2A2A;}
        h3 {text-align: center;width:160px;font-size: 16px;border-bottom: 1px solid #41E8F1;}

        #save{width:160px;margin-top:10px;}
        #save li{list-style:armenian inside;height: 20px;width:120px;margin: 10px 0 0px 10px;border: none; cursor: pointer;text-align: center;border: 1px solid #999999;}
        #save li:hover{list-style:armenian inside;height: 20px;width:120px;margin: 10px 0 0px 10px;border: none; cursor: pointer;text-align: center;border: 1px solid #000000;}


        #tool, #form {margin: 20px auto;width:126px;}
        #tool li, #form li{border:1px solid #666666;height: 30px;width:40px;cursor: pointer;}
        #tool li:hover, #form li:hover{border:1px solid #DF2A2A;height: 30px;width:40px;cursor: pointer;}
        #tool img, #form li img{width:20px;height:20px;margin:6px 8px;}

        #line {margin:10px auto;width:140px;}
        #line li {width:140px;height: 16px;border: none;margin-top: 2px;border:1px solid #f8f8f8;}
        #line li:hover{width:140px;height: 16px;border: none;margin-top: 2px;border:1px solid #DF2A2A;}
        #line img {width:136px;margin: 2px 2px;}
        #color {width:158px;margin:10px auto;}
        #color li{width:20px;height: 20px;border:1px solid #000000;list-style: none;margin: 12px 0 0 8px;}
        #color li:hover{width:20px;height: 20px;border:1px solid #FFFFFF;list-style: none;margin: 12px 0 0 8px;}
        #red{background: red;}
        #green{background: green;}
        #blue{background: blue;}
        #yellow{background: yellow;}
        #white{background: #ffffff;}
        #black{background: #000000;}
        #pink{background: pink;}
        #purple{background: purple;}
        #skyblue{background: skyblue;}
        #orange{background: orange;}
        #canvas {background: #FFFFFF;margin: 0 auto;}
    </style>

<body>
<header id="header"><h2>html5在线画板</h2></header>
<section id="content">
    <ul id="operation">
        <li><h3>图像</h3>
            <ul id="save">
                <li id="saveimg" onclick="saveAll()">保存图片</li>
                <li id="clear" onclick="clearAll()">清除画布</li>
            </ul>
        </li>
        <li><h3>工具</h3>
            <ul id="tool">

                <li id="brush" onclick="drawBrush(0)"><img src="{{url('assets/images/images_huatuban/Brush.png')}}"></li>
                <li id="eraser" onclick="drawEraser(1)"><img src="{{url('assets/images/images_huatuban/Eraser.png')}}"></li>
                <li id="paint" onclick="drawPaint(2)"><img src="{{url('assets/images/images_huatuban/Paint.png')}}"></li>
                <li id="straw" onclick="drawStraw(3)"><img src="{{url('assets/images/images_huatuban/Straw.png')}}"></li>
                <li id="text" onclick="drawText(4)"><img src="{{url('assets/images/images_huatuban/text.png')}}"></li>
                <li id="marnifer" onclick="drawMagnifier(5)"><img src="{{url('assets/images/images_huatuban/Magnifier.png')}}"></li>
            </ul>
        </li>
        <li><h3>形状</h3>
            <ul id="form">
                <li id="drawline" onclick="drawLine(6)"><img src="{{url('assets/images/images_huatuban/line.png')}}"></li>
                <li id="arc" onclick="drawArc(7)"><img src="{{url('assets/images/images_huatuban/arc.png')}}"></li>
                <li id="rect" onclick="drawRect(8)"><img src="{{url('assets/images/images_huatuban/rect.png')}}"></li>
                <li id="poly" onclick="drawPoly(9)"><img src="{{url('assets/images/images_huatuban/poly.png')}}"></li>
                <li id="arcfill" onclick="drawArcfill(10)"><img src="{{url('assets/images/images_huatuban/arcfill.png')}}"></li>
                <li id="rectfill" onclick="draRectfill(11)"><img src="{{url('assets/images/images_huatuban/rectfill.png')}}"></li>
            </ul>


        </li>
        <li><h3>粗细</h3>
            <ul id="line">

                <li id="line_1" onclick="lineWidth(0)"><img src="{{url('assets/images/images_huatuban/line1px.png')}}"></li>
                <li id="line_3" onclick="lineWidth(1)"><img src="{{url('assets/images/images_huatuban/line3px.png')}}"></li>
                <li id="line_5" onclick="lineWidth(2)"><img src="{{url('assets/images/images_huatuban/line5px.png')}}"></li>
                <li id="line_8" onclick="lineWidth(3)"><img src="{{url('assets/images/images_huatuban/line8px.png')}}"></li>
            </ul>

        </li>
        <li style="border:none"><h3>颜色</h3>
            <ul id="color">
                <li id="red" onclick="setColor(this,0)"></li>
                <li id="green" onclick="setColor(this,1)"></li>
                <li id="blue" onclick="setColor(this,2)"></li>
                <li id="yellow" onclick="setColor(this,3)"></li>
                <li id="white" onclick="setColor(this,4)"></li>
                <li id="black" onclick="setColor(this,5)"></li>
                <li id="pink" onclick="setColor(this,6)"></li>
                <li id="purple" onclick="setColor(this,7)"></li>
                <li id="skyblue" onclick="setColor(this,8)"></li>
                <li id="orange" onclick="setColor(this,9)"></li>
            </ul>


        </li>
    </ul>
    <canvas id="canvas" width="800" height="480"></canvas>

    <script type="text/javascript">
        var oSave = document.getElementById('saveimg');
        var oClear = document.getElementById('clear');
        // 工具
        var oBrush = document.getElementById('brush');
        var oEraser = document.getElementById('eraser');
        var oPaint = document.getElementById('paint');
        var oStraw = document.getElementById('straw');
        var oText = document.getElementById('text');
        var oMarnifer = document.getElementById('marnifer');
        // 形状
        var oDrawline = document.getElementById('drawline');
        var oArc = document.getElementById('arc');
        var oRect = document.getElementById('rect');
        var oPoly = document.getElementById('poly');
        var oArcfill = document.getElementById('arcfill');
        var oRrectfill = document.getElementById('rectfill');

        // 线宽
        var oLine_1 = document.getElementById('line_1');
        var oLine_3 = document.getElementById('line_3');
        var oLine_5 = document.getElementById('line_5');
        var oLine_8 = document.getElementById('line_8');

        //颜色
        var colorRed = document.getElementById('red');
        var colorGreen = document.getElementById('green');
        var colorBlue = document.getElementById('blue');
        var colorYellow = document.getElementById('yellow');
        var colorWhite = document.getElementById('white');
        var colorBlack = document.getElementById('black');
        var colorPink = document.getElementById('pink');
        var colorPurple = document.getElementById('purple');
        var colorSky = document.getElementById('skyblue');
        var colorOrange = document.getElementById('orange');
        var actions = [oBrush, oEraser, oPaint, oStraw, oText, oMarnifer, oDrawline, oArc, oRect, oPoly, oArcfill, oRrectfill];
        var widths = [oLine_1, oLine_3, oLine_5, oLine_8];
        var colors = [colorRed, colorGreen, colorBlue, colorYellow, colorWhite, colorBlack, colorPink, colorPurple, colorSky, colorOrange]
        var canvas = document.getElementById('canvas');
        var cxt = canvas.getContext('2d');
        function saveAll() {
            var imgData = canvas.toDataURL();
            var saveData = imgData.substring(22);
            alert(imgData);
        }
        function clearAll() {
            cxt.clearRect(0, 0, 800, 480);
        }
        function setStatus(Arr, num, type) {
            for (var i = 0; i < Arr.length; i++) {
                if (i == num) {
                    if (type == 1) {
                        Arr[i].style.background = "yellow";
                    } else {
                        Arr[i].style.border = "1px solid #fff";
                    }

                } else {
                    if (type == 1) {
                        Arr[i].style.background = "#ffffff";
                    } else {
                        Arr[i].style.border = "1px solid #000";
                    }
                }
            }
        }


        function drawBrush(num) {

            setStatus(actions, num, 1);
            // var canvas = document.getElementById('canvas');
            //   var cxt = canvas.getContext('2d');
            canvas.onmousedown = function (ev) {
                ev = window.event || ev;
                var startX = this.offsetLeft;
                var startY = this.offsetTop;
                var x = ev.pageX - startX;
                var y = ev.pageY - startY;

                cxt.beginPath();
                cxt.moveTo(x, y);

                canvas.onmousemove = function (ev) {
                    ev = window.event || ev;
                    var x = ev.pageX - startX;
                    var y = ev.pageY - startY;
                    cxt.lineTo(x, y);
                    cxt.stroke();
                }

                canvas.onmouseup = function () {
                    canvas.onmousemove = null;
                    canvas.onmouseup = null;
                }
            }
        }
        drawBrush(0);
        function drawEraser(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;
                cxt.clearRect(x - cxt.lineWidth, y - cxt.lineWidth, 2 * cxt.lineWidth, 2 * cxt.lineWidth);
                canvas.onmousemove = function (ev) {
                    var ev = window.event || ev;
                    var x = ev.pageX - this.offsetLeft;
                    var y = ev.pageY - this.offsetTop;
                    cxt.clearRect(x - cxt.lineWidth, y - cxt.lineWidth, 2 * cxt.lineWidth, 2 * cxt.lineWidth);

                }
                canvas.onmouseup = function () {
                    canvas.onmousemove = null;
                    canvas.onmouseup = null;
                }
            }
        }

        function drawPaint(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function () {
                cxt.fillRect(0, 0, 800, 480);
                cxt.fill();
            }
        }

        function drawStraw(num) {
//    alert(1);
            setStatus(actions, num, 1);

            canvas.onmousedown = function (ev) {

                var ev = document.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;
//        获取图像信息的方法getImageData(开始点X，开始点Y，宽度，高度)
                var obj = cxt.getImageData(x, y, 1, 1);
//        getImageData包含【width，heigh，data】，
// data是指 每个像素的【红，绿，蓝，透明度】，整体是一个数组，每个值的范围是0-255；

                var color = 'rgb(' + obj.data[0] + ',' + obj.data[1] + ',' + obj.data[2] + ')';
//        alert(color);

                cxt.strokeStyle = color;
                cxt.fillStyle = color;
                drawBrush(0);
                canvas.onmousemove = null;
                canvas.onmouseup = null;
                canvas.onmouseout = null;
            }
        }

        function drawText(num) {
            setStatus(actions, num, 1);

            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;
                // prompt(提示，默认值)
                // window.prompt('呵呵哒','不是我写的');
                var uValue = window.prompt('请输入文字', '');
                cxt.fillText(uValue, x, y);

                canvas.onmousemove = null;
                canvas.onmouseup = null;
            }
        }
        function drawMagnifier(num) {
            setStatus(actions, num, 1);
            var scale = window.prompt('请输入要放大的百分比【只能是整数】', '100');
            var scaleW = 800 * scale / 100;
            var scaleH = 480 * scale / 100;
            canvas.style.width = parseInt(scaleW) + 'px';
            canvas.style.height = parseInt(scaleH) + 'px';
        }
        function drawLine(num) {

            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var startX = this.offsetLeft;
                var startY = this.offsetTop;
                var x = ev.pageX - startX;
                var y = ev.pageY - startY;

                cxt.beginPath();
                cxt.moveTo(x, y);

                canvas.onmousemove = null;

                canvas.onmouseup = function (ev) {
                    var ev = window.event || ev;
                    var startX = this.offsetLeft;
                    var startY = this.offsetTop;
                    var x = ev.pageX - startX;
                    var y = ev.pageY - startY;
                    cxt.lineTo(x, y);
                    cxt.closePath();
                    cxt.stroke();
                    canvas.onmousemove = null;
                    canvas.onmouseup = null;
                    canvas.onmouseout = null;
                }
            }
        }
        function drawArc(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;
                canvas.onmousemove = null;
                canvas.onmouseup = function (ev) {
                    var ev = window.event || ev;
                    var endX = ev.pageX - this.offsetLeft;
                    var endY = ev.pageY - this.offsetTop;
                    var a = endX - x;
                    var b = endY - y;
                    var c = Math.sqrt(a * a + b * b);

                    cxt.beginPath();
                    cxt.arc(x, y, c, 0, 360, false);
                    cxt.closePath();
                    cxt.stroke();

                }
                cxt.onmousemove = null;
                cxt.onmousedup = null;
                canvas.onmouseout = null;

            }
        }

        function drawRect(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;

                canvas.onmousemove = null;
                canvas.onmouseup = function (ev) {
                    var ev = window.event || ev;
                    var endX = ev.pageX - this.offsetLeft;
                    var endY = ev.pageY - this.offsetTop;
                    var a = endX - x;
                    var b = endY - y;

                    cxt.beginPath();
                    cxt.strokeRect(x, y, a, b);
                    cxt.closePath();
                    cxt.stroke();
                    cxt.onmousemove = null;
                    cxt.onmousedup = null;

                }
                canvas.onmouseout = null;

            }
        }

        function drawPoly(num) {
            setStatus(actions, num, 1);

            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;

                canvas.onmouseup = function (ev) {


                    var ev = window.event || ev;
                    var endX = ev.pageX - this.offsetLeft;
                    var endY = ev.pageY - this.offsetTop;
                    // alert(endX);
                    var leftX = 2 * x - endX;
                    var leftY = endY;
                    cxt.beginPath();
                    cxt.moveTo(endX, endY);
                    // 左下角顶点坐标
                    cxt.lineTo(leftX, leftY);

                    // 顶点坐标

                    cxt.lineTo(x, 2 * y - endY);
                    cxt.closePath();
                    cxt.stroke();

                }
                canvas.onmousemove = null;
                canvas.onmouseout = null;

            }


        }

        function drawArcfill(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;


                canvas.onmousemove = null;
                canvas.onmouseup = function (ev) {
                    var ev = window.event || ev;
                    var endX = ev.pageX - this.offsetLeft;
                    var endY = ev.pageY - this.offsetTop;
                    var a = endX - x;
                    var b = endY - y;
                    var c = Math.sqrt(a * a + b * b);

                    cxt.beginPath();
                    cxt.arc(x, y, c, 360, 0, true);
                    cxt.closePath();
                    cxt.fill();
                    cxt.onmousemove = null;
                    cxt.onmousedup = null;

                }
                canvas.onmouseout = null;
            }
        }

        function draRectfill(num) {
            setStatus(actions, num, 1);
            canvas.onmousedown = function (ev) {
                var ev = window.event || ev;
                var x = ev.pageX - this.offsetLeft;
                var y = ev.pageY - this.offsetTop;


                canvas.onmousemove = null;
                canvas.onmouseup = function (ev) {
                    var ev = window.event || ev;
                    var endX = ev.pageX - this.offsetLeft;
                    var endY = ev.pageY - this.offsetTop;
                    var a = endX - x;
                    var b = endY - y;


                    cxt.beginPath();
                    cxt.fillRect(x, y, a, b);
                    cxt.closePath();
                    cxt.fill();
                    cxt.onmousemove = null;
                    cxt.onmousedup = null;

                }
                canvas.onmouseout = null;
            }
        }

        function lineWidth(num) {
            setStatus(widths, num, 1);
            var canvas = document.getElementById('canvas');
            var cxt = canvas.getContext('2d');
            switch (num) {
                case 0 :
                    cxt.lineWidth = 1;
                    break;
                case 1 :
                    cxt.lineWidth = 3;
                    break;
                case 2 :
                    cxt.lineWidth = 5;
                    break;
                case 3 :
                    cxt.lineWidth = 8;

            }
        }

        function setColor(obj, num) {
            setStatus(colors, num, 0);

            cxt.strokeStyle = obj.id;
            cxt.fillStyle = obj.id;
        }
    </script>
</section>
<footer id="footer">啦啦啦啦啦啦啦啦啦啦啦啦这是我写的</footer>
</body>
</html>