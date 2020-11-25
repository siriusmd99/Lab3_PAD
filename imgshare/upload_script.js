var img;
function readURL(input) {
  if (input.files && input.files[0]) {
	$('#url_copied').hide();
    img = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);
	

  } else {
	
    removeUpload();
  }
}

function removeUpload() {
	$(".file-upload-input").val(null);
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});

function clearSelection()
{
 if (window.getSelection) {window.getSelection().removeAllRanges();}
 else if (document.selection) {document.selection.empty();}
}


function shareImage() 
{
	
	var fd = new FormData();
    fd.append('file',img);
	$.ajax({
		
		type: 'post',
		url: location.href.replace(/[^/]*$/, '')+"upload_image.php",
		data: fd,
		contentType: false,
        processData: false,
		success: function(response){
			
			var json_resp = JSON.parse( response );
		
			if(json_resp.status == "Success")
			{
				$('#url_copied').show();
				var input = document.getElementById("url_input");
               input.value = json_resp.msg;
			   input.select();        
               document.execCommand("copy");
			   clearSelection();
			   document.getElementById("url_msg").text = "Image URL Copied to Clipboard!";
			   
            }else{
				if(json_resp.status == "Error")
                 document.getElementById("url_msg").text = json_resp.msg;
			    else
			     document.getElementById("url_msg").text = "Unknown Error While Uploading Image. Try again later.";
			}
		}
	});
	
	removeUpload();

}


