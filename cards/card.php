<!doctype html>
<html dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Tajawal&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

	<style type="text/css">
		.text-name{
			margin-bottom: 30px;
		}
		.text-name label{
			display: block;
		}
		.text-name input{
			display: inline-block;
			max-width: 300px;
		}
		.bg-dark,.navbar-dark {background-color: #c33f52!important;}

        .btn-dark {
            color: #fff;
            background-color: #c33f52;
            border-color: #000000;
        }

        .form-control {
            color: #28627d;
            background-color: #fff;
            border: 1px solid #c33f52;;
        }

        .card-row .col{ margin-top: 25px; }
        .card-row a:hover{ text-decoration: none }
        canvas {
        	clear:both;
        	font-family: 'Tajawal';
        	font-weight:bold;
        	height:400px;
        	width:auto;
        	border: 1px solid #c33f52;;
        }
        .box{
          box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
          padding: 50px 10px;
          width: 70%;
          margin: 20px auto;
          border-radius: 30px;
        }
	</style>
	<title>بطاقة تهنئة</title>

  </head>
  <body style="font-family: 'Tajawal', sans-serif;">


		<!-- /.container -->
		<div class="container">
      <div class="box mt-5">
		  <div class="row mt-5 justify-content-center">
			<div class="col-md-4 col-12">
				<div class="text-center text-name">
					<label class="control-label">أدخل اسمك:</label>
					<input type="text" class="form-control" name="name-input" id="name-input"><br><br>
          <label class="control-label">اختر لون الخط :</label>
					<input type="color" class="form-control" placeholder="اختر اللون" name="color" id="color" value="#c0c0c0"><br><br>
          <label class="control-label">اختر حجم الخط : </label>
					<input type="number" class="form-control" placeholder="اختر الحجم" name="font_size" id="font_size" value="70"><br>
				</div>





				<div class="text-center">
					 <div style="text-align:center">
					  <button class="btn btn-dark" onclick="javascript: movetext('right');"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
					  <button class="btn btn-dark" onclick="javascript: movetext('left');"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
					  <button class="btn btn-dark" onclick="javascript: movetext('up');"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
					  <button class="btn btn-dark" onclick="javascript: movetext('down');"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
					</div>
          <p class="text-center mt-4">
  					<a class="btn btn-dark" id="download_btn" style="color: #fff;">تحميل البطاقة</a>
  				</p>
          <br>
				</div>
      </div>

			     <div class="col-md-4 col-12 text-center">
			     	<img id="card-image" src="img.jpg" style="display: none">
			     	<canvas id="canvas" width="1024" height="1024">


			</div>
    </div>
    </div>
		</div>


		<!-- /.container -->

<link href="https://fonts.googleapis.com/css?family=Tajawal&amp;display=swap" rel="stylesheet"><input type="hidden" name="x_axis" id="x_axis" value="0">
<input type="hidden" name="y_axis" id="y_axis" value="0">

<script type="text/javascript">
var context = null;
var canvas = null;
var size_template = "bold Xpx Tajawal";

window.onload = function()
{
	canvas = document.getElementById('canvas'), context = canvas.getContext('2d');
	canvas.width = $('#card-image').width();
	canvas.height = $('#card-image').height();
	//canvas.crossOrigin = "Anonymous";
	context.drawImage($('#card-image').get(0), 0, 0);
	var size_template = "bold Xpx Tajawal";
	context.font = size_template.replace("Xpx", $("#font_size").val() + "px");
	var value = '';

	update_xy(canvas);

	$(document).on('input','#name-input', function()
	{
		var x_a = $("#x_axis").val();
		var y_a = $("#y_axis").val();

		console.log($(this).val());
		context.clearRect(0, 0, ((canvas.width/2)),((canvas.height/2)));
		context.drawImage($('img').get(0), 0, 0);
		context.fillStyle = $("#color").val();
		context.fillText($(this).val(), x_a, y_a);
		value = $(this).val();
	});
	function downloadCanvas(link, canvasId, filename)
	{
		var image = new Image();
		image.src = document.getElementById(canvasId).toDataURL("image/png");
		var ua = navigator.userAgent.toLowerCase();
		if (ua.indexOf('safari') != -1) {
		  if (ua.indexOf('chrome') > -1) {
		  } else {
			  $('#download').attr("target", "_blank");
		  }
		}

		link.href = document.getElementById(canvasId).toDataURL("image/png");
		link.download = filename;
	}

	document.getElementById('download_btn').addEventListener('click', function() {
		downloadCanvas(this, 'canvas', value);
	}, false);

	$("#color").on('change', function()
	{
		refresh_card();
	});
	$("#font_size").on('change', function()
	{
		context.font = size_template.replace("Xpx", $("#font_size").val() + "px");
		refresh_card();
	});
};
function update_xy(canvas)
{
	var x_a = $("#x_axis").val();
	var y_a = $("#y_axis").val();

	if(x_a == 0)
	{
		$("#x_axis").val(((canvas.width/2)));
		$("#y_axis").val(((canvas.height/2)));
	}

	console.log(x_a, y_a);
}
function refresh_card()
{
	var ccontext = window.context;
	var ccanvas = window.canvas;
	var x_a = $("#x_axis").val();
	var y_a = $("#y_axis").val();

	ccontext.clearRect(0, 0, ((ccanvas.width/2)),((ccanvas.height/2)));
	ccontext.drawImage($('img').get(0), 0, 0);
	ccontext.fillStyle = $("#color").val();
	ccontext.fillText($("#name-input").val(), x_a, y_a);
}
function movetext(direction)
{
	var ccanvas = window.canvas;

	switch(direction)
	{
		case 'left':
			var new_val = parseInt($("#x_axis").val())-10;
			if(new_val < 10) new_val = ccanvas.width/2;

			$("#x_axis").val(new_val);
			refresh_card();
		break;
		case 'right':
			var new_val = parseInt($("#x_axis").val()) + 10;
			console.log(new_val, ccanvas.width);
			if(new_val > ccanvas.width) new_val = ccanvas.width/2;

			$("#x_axis").val(new_val);
			refresh_card();
		break;
		case 'up':
			var new_val = parseInt($("#y_axis").val())-10;
			if(new_val < 10) new_val = ccanvas.height/2;

			$("#y_axis").val(new_val);
			refresh_card();
		break;
		case 'down':
			var new_val = parseInt($("#y_axis").val())+10;
			if(new_val > ccanvas.height) new_val = ccanvas.height/2;

			$("#y_axis").val(new_val);
			refresh_card();
		break;
	}
}
</script>


  </body>

</html>
