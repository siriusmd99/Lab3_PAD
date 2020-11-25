<html>
<head>
<title>ImgShare</title>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
<script type="text/javascript" src="upload_script.js"></script>  
<link rel="stylesheet" href="upload_style.css">
</head>
<body>
<div class="main">
	<div class="file-upload">
	<img src="logo_shareimg.png" class="center" style="cursor: pointer;" onclick="location.reload();">
	 <div id="logo_title" style="text-align: center; padding-bottom:100px">
	   <h3 style="color: gray;">Upload and Share Images Fast and Free on the Web!</h3>
	  </div>
	  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Upload Image</button>

	  <div class="image-upload-wrap">
		<input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
		<div class="drag-text">
		  <h3>Drag and drop an Image or select Upload Image</h3>
		</div>
	  </div>
	  <div class="file-upload-content">
		<img class="file-upload-image" src="#" />
		<div class="image-title-wrap">
		  <button type="button" onclick="removeUpload()" class="remove-image" style="margin-right:20px">Remove <span class="image-title">Uploaded Image</span></button>
		   <button type="button" onclick="shareImage()" class="confirm-image">Share Image</button>
		</div>
		
		
	  </div>
	  <div id="url_copied">
	  <h4 style="color: gray; text-align:center; padding-top:20px" id="url_msg">Image URL Copied to Clipboard!</h4>
		<input type="text" id="url_input" readonly>
		
		</div>
	 
	</div>
</div>
	
</body>
<div id="footer" class="drag-text">
	   <h5 style="color: gray; padding-top:25px">ImgShare © 2020, All Rights Reserved.</h5>
	  </div>
</html>

