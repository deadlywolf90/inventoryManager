<?php 
 /**
  * This part will be the frontend for the item editor
  */

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<title>Inventory Manager</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="canonical" href="https://serratus.github.io/examples/live_w_locator.html" />
	<link rel="stylesheet" href="https://serratus.github.io/quaggaJS/stylesheets/styles.css">
	<link rel="stylesheet" href="https://serratus.github.io/quaggaJS/stylesheets/example.css">
	<link rel="stylesheet" href="https://serratus.github.io/quaggaJS/stylesheets/pygment_trac.css">

	<script type="text/javascript" src="assets/js/quagga.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
	<div class="wrapper">
		<div id="container" class="container">
			<div class="controls">
				<fieldset class="input-group">
					<button class="stop">Stop</button>
				</fieldset>
				<fieldset class="reader-config-group">
					<label>
						<span>Barcode-Type</span>
						<select name="decoder_readers">
							<option value="code_128">Code 128</option>
							<option value="code_39">Code 39</option>
							<option value="code_39_vin">Code 39 VIN</option>
							<option value="ean" selected="selected">EAN</option>
							<option value="ean_extended">EAN-extended</option>
							<option value="ean_8">EAN-8</option>
							<option value="upc">UPC</option>
							<option value="upc_e">UPC-E</option>
							<option value="codabar">Codabar</option>
							<option value="i2of5">I2of5</option>
							<option value="2of5">Standard 2 of 5</option>
							<option value="code_93">Code 93</option>
						</select>
					</label>
					<label>
						<span>Resolution (long side)</span>
						<select name="input-stream_constraints">
							<option value="320x240">320px</option>
							<option selected="selected" value="640x480">640px</option>
							<option value="800x600">800px</option>
							<option value="1280x720">1280px</option>
							<option value="1600x960">1600px</option>
							<option value="1920x1080">1920px</option>
						</select>
					</label>
					<label>
						<span>Patch-Size</span>
						<select name="locator_patch-size">
							<option value="x-small">x-small</option>
							<option value="small">small</option>
							<option selected="selected" value="medium">medium</option>
							<option value="large">large</option>
							<option value="x-large">x-large</option>
						</select>
					</label>
					<label>
						<span>Half-Sample</span>
						<input type="checkbox" checked="checked" name="locator_half-sample" />
					</label>
					<label>
						<span>Workers</span>
						<select name="numOfWorkers">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option selected="selected" value="4">4</option>
							<option value="8">8</option>
						</select>
					</label>
					<label>
						<span>Camera</span>
						<select name="input-stream_constraints" id="deviceSelection">
						</select>
					</label>
					<label style="display: none">
						<span>Zoom</span>
						<select name="settings_zoom"></select>
					</label>
					<label style="display: none">
						<span>Torch</span>
						<input type="checkbox" name="settings_torch" />
					</label>
				</fieldset>
			</div>
			<div id="result_strip">
				<ul class="thumbnails"></ul>
			</div>
			<div id="interactive" class="viewport"></div>
		</div>

		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//webrtc.github.io/adapter/adapter-latest.js" type="text/javascript"></script>
		<script src="js/quagga.min.js" type="text/javascript"></script>
		<script src="assets/js/live_w_locator.js" type="text/javascript"></script>

</body>

</html>
<?php 
?>