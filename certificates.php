<!DOCTYPE html>

<html>

<head>
	<title>
		Generate a Certificate!
	</title>

	<center>
		<h1><em><a href="index.php">S E L E N A Z H A N G</a></em></h1>
	</center><br>

	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<?php
	include 'include/header.php';
	?>

	<form action="certificate/generate_certificate.php" method="post" onsubmit="return myFunction()" style="margin-bottom:175px;margin-top:100px;margin-left:200px;font-family:'Poppins', sans-serif">
		<div class="ftable">
			<div class="frow">
				<div class="fcell flabel">
					<label for="cute">Certificate Style:</label>
				</div>
				<div class="fcell">
					<input type="radio" id="cute" name="style" value="cute">
					<label for="cute">Cute</label><br>
					<input type="radio" id="formal" name="style" value="formal">
					<label for="formal">Formal</label><br><br>
				</div>
			</div>



			<script>
				function countChars1(obj) {
					var maxLength = 40;
					var strLength = obj.value.length;
					document.getElementById("charNum1").innerHTML = '(' + strLength + '/' + maxLength + ')';
				}
			</script>
			<div class="frow">
				<div class="fcell flabel">
					<label for="title">Certificate Title:</label>
				</div>
				<div class="fcell">
					<input type="text" id="title" name="title" size="50" maxlength="40" onkeyup="countChars1(this);"><span style="color:red">*</span>
					<p id="charNum1" style="font-size:10px">(0/40)</p><br>
				</div>
			</div>



			<script>
				function countChars2(obj) {
					var maxLength = 40;
					var strLength = obj.value.length;
					document.getElementById("charNum2").innerHTML = '(' + strLength + '/' + maxLength + ')';
				}
			</script>
			<div class="frow">
				<div class="fcell flabel">
					<label for="recipient">Recipient Name:</label>
				</div>
				<div class="fcell">
					<input type="text" id="recipient" name="recipient" maxlength="40" onkeyup="countChars2(this);"><span style="color:red">*</span>
					<p id="charNum2" style="font-size:10px">(0/40)</p><br>
				</div>
			</div>



			<script>
				function countChars3(obj) {
					var maxLength = 64;
					var strLength = obj.value.length;
					document.getElementById("charNum3").innerHTML = '(' + strLength + '/' + maxLength + ')';
				}
			</script>
			<div class="frow">
				<div class="fcell flabel">
					<label for="award">Certifies That the Recipient:</label>
				</div>
				<div class="fcell">
					<textarea id="award" name="award" rows="2" cols="40s" maxlength="64" onkeyup="countChars3(this);"></textarea><span style="color:red">*</span>
					<p id="charNum3" style="font-size:10px">(0/64)</p><br>
				</div>
			</div>



			<script>
				function countChars4(obj) {
					var maxLength = 150;
					var strLength = obj.value.length;
					document.getElementById("charNum4").innerHTML = '(' + strLength + '/' + maxLength + ')';
				}
			</script>
			<div class="frow">
				<div class="fcell flabel">
					<label for="description">Description of Award:</label>
				</div>
				<div class="fcell">
					<textarea id="description" name="description" rows="3" cols="40s" maxlength="150" onkeyup="countChars4(this);"></textarea>
					<p id="charNum4" style="font-size:10px">(0/150)</p><br>
				</div>
			</div>



			<div class="frow">
				<div class="fcell flabel">
					<label for="date">Date:</label>
				</div>
				<div class="fcell">
					<input type="date" id="date" name="date"><span style="color:red">*</span><br><br>
				</div>
			</div>



			<script>
				function countChars5(obj) {
					var maxLength = 40;
					var strLength = obj.value.length;
					document.getElementById("charNum5").innerHTML = '(' + strLength + '/' + maxLength + ')';
				}
			</script>
			<div class="frow">
				<div class="fcell flabel">
					<label for="signame">Signature Name:</label>
				</div>
				<div class="fcell">
					<input type="text" id="signame" name="signame" maxlength="40" onkeyup="countChars5(this);"><span style="color:red">*</span>
					<p id="charNum5" style="font-size:10px">(0/40)</p><br>
				</div>
			</div>


			<div class="frow">
				<div class="fcell flabel">
					<label for="signature">Signature:</label>
				</div>
				<div class="fcell">
					<canvas id="sig-canvas" width="620" height="160"></canvas><br>
					<button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
					<button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
					<textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
					<img id="sig-image" src="" alt="Your signature will go here!" />
				</div>
			</div>
			<script>
				(function() {
					window.requestAnimFrame = (function(callback) {
						return window.requestAnimationFrame ||
							window.webkitRequestAnimationFrame ||
							window.mozRequestAnimationFrame ||
							window.oRequestAnimationFrame ||
							window.msRequestAnimaitonFrame ||
							function(callback) {
								window.setTimeout(callback, 1000 / 60);
							};
					})();

					var canvas = document.getElementById("sig-canvas");
					var ctx = canvas.getContext("2d");
					ctx.strokeStyle = "#222222";
					ctx.lineWidth = 4;

					var drawing = false;
					var mousePos = {
						x: 0,
						y: 0
					};
					var lastPos = mousePos;

					canvas.addEventListener("mousedown", function(e) {
						drawing = true;
						lastPos = getMousePos(canvas, e);
					}, false);

					canvas.addEventListener("mouseup", function(e) {
						drawing = false;
					}, false);

					canvas.addEventListener("mousemove", function(e) {
						mousePos = getMousePos(canvas, e);
					}, false);

					// Add touch event support for mobile
					canvas.addEventListener("touchstart", function(e) {

					}, false);

					canvas.addEventListener("touchmove", function(e) {
						var touch = e.touches[0];
						var me = new MouseEvent("mousemove", {
							clientX: touch.clientX,
							clientY: touch.clientY
						});
						canvas.dispatchEvent(me);
					}, false);

					canvas.addEventListener("touchstart", function(e) {
						mousePos = getTouchPos(canvas, e);
						var touch = e.touches[0];
						var me = new MouseEvent("mousedown", {
							clientX: touch.clientX,
							clientY: touch.clientY
						});
						canvas.dispatchEvent(me);
					}, false);

					canvas.addEventListener("touchend", function(e) {
						var me = new MouseEvent("mouseup", {});
						canvas.dispatchEvent(me);
					}, false);

					function getMousePos(canvasDom, mouseEvent) {
						var rect = canvasDom.getBoundingClientRect();
						return {
							x: mouseEvent.clientX - rect.left,
							y: mouseEvent.clientY - rect.top
						}
					}

					function getTouchPos(canvasDom, touchEvent) {
						var rect = canvasDom.getBoundingClientRect();
						return {
							x: touchEvent.touches[0].clientX - rect.left,
							y: touchEvent.touches[0].clientY - rect.top
						}
					}

					function renderCanvas() {
						if (drawing) {
							ctx.moveTo(lastPos.x, lastPos.y);
							ctx.lineTo(mousePos.x, mousePos.y);
							ctx.stroke();
							lastPos = mousePos;
						}
					}

					// Prevent scrolling when touching the canvas
					document.body.addEventListener("touchstart", function(e) {
						if (e.target == canvas) {
							e.preventDefault();
						}
					}, false);
					document.body.addEventListener("touchend", function(e) {
						if (e.target == canvas) {
							e.preventDefault();
						}
					}, false);
					document.body.addEventListener("touchmove", function(e) {
						if (e.target == canvas) {
							e.preventDefault();
						}
					}, false);

					(function drawLoop() {
						requestAnimFrame(drawLoop);
						renderCanvas();
					})();

					function clearCanvas() {
						canvas.width = canvas.width;
					}

					// Set up the UI
					var sigText = document.getElementById("sig-dataUrl");
					var sigImage = document.getElementById("sig-image");
					var clearBtn = document.getElementById("sig-clearBtn");
					var submitBtn = document.getElementById("sig-submitBtn");
					clearBtn.addEventListener("click", function(e) {
						clearCanvas();
						sigText.innerHTML = "Data URL for your signature will go here!";
						sigImage.setAttribute("src", "");
					}, false);
					submitBtn.addEventListener("click", function(e) {
						var dataUrl = canvas.toDataURL();
						sigText.innerHTML = dataUrl;
						sigImage.setAttribute("src", dataUrl);
					}, false);

				})();
			</script>

			<!-- <div class="frow">
				<div class="fcell flabel">
					<textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
				</div>
				<br />
				<div class="fcell">
					<img id="sig-image" src="" alt="Your signature will go here!" />
				</div>
			</div> -->
		</div>
		<input style="font-family:'Poppins', sans-serif" type="submit" value="Generate">
	</form>

</body>

</html>