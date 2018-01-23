
var avatarUpload = function(avatarForm, sourceWrapper) {
    var cropWidth = sourceWrapper.attr('data-width') || 500;
    var cropHeight = sourceWrapper.attr('data-height') || 500;
    var ratio = cropWidth/cropHeight;
    var boundaryWidth = 300;
    var boundaryHeight = boundaryWidth/ratio;
	var $uploadCrop;
	function readFile(input) {
			if (input.files && input.files[0]) {
            var reader = new FileReader();
            // console.log('reader',reader);
            reader.onload = function (e) {
				avatarForm.find('.preview_area').addClass('ready');
            	$uploadCrop.croppie('bind', {
            		url: e.target.result
            	}).then(function(){
            		console.log('jQuery bind complete');
            	});

            }

            reader.readAsDataURL(input.files[0]);
        }
        else {
	        swal("Sorry - you're browser doesn't support the FileReader API");
	    }
	}

	$uploadCrop = avatarForm.find('.uploaded-image').croppie({
		viewport: {
			width: boundaryWidth,
			height: boundaryHeight,
		},
        size:{
            width: cropWidth,
			height: cropHeight,
        },
        // boundary: { width: boundaryWidth, height: boundaryHeight },
		enableExif: true
	});

	avatarForm.find('.js-croppie-input').on('change', function () {
        readFile(this);
    });
	avatarForm.find('.upload_comfirm').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: {
                width: cropWidth,
    			height: cropHeight,
            },
		}).then(function (resp) {
            sourceWrapper.find('.form-preview-avatar').attr('src',resp);
            avatarForm.find('.croped-image-base64').val(resp);
			// ajax upload to
            var formData = new FormData(avatarForm[0]);
            $.ajax({
                type: "POST",
                url: avatarForm.attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(result) {
        			if(result.success){

                        sourceWrapper.find('input').val(result.link);
                        avatarForm.parents($('.modal-wrapper')).modal('hide');
    		    	}else{
                        swal("Fail!", 'upload fail', "error");
    			    }
        			$('this').removeClass('lock');
                },
                error: function() {
                    swal("Fail!", 'Network error or server error', "error");
    		    	$('this').removeClass('lock');
                },
            });
		});
	});
}
