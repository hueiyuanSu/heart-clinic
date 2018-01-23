$(document).ready(function(){
	/* datarangepicker */
	if($('.datetimepicker').length){
		$('.datetimepicker').datetimepicker({

	    });
	}

	if($.FroalaEditor != undefined){
		$.FroalaEditor.DefineIcon('imageInfo', {NAME: 'info'});
		$.FroalaEditor.RegisterCommand('imageInfo', {
		  title: 'Info',
		  focus: false,
		  undo: false,
		  refreshAfterCallback: false,
		  callback: function () {
			var $img = this.image.get();
			alert($img.attr('src'));
		  }
		});
	}



	/* typeahead-typehint */
	var searchSourceHint = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		prefetch: '',
		remote: {
			url: '/api/type-hint/?',
			replace: function(url, uriEncodedQuery) {

				var val = $(".typehint").filter(":focus").attr("data-type");
				var res = (url + "type=" + val + "&text="
						  + encodeURIComponent(uriEncodedQuery));
				// console.log(res);
				return res
			  }
		}
	});

	$('.typehint').typeahead({
			hint: true,
            highlight:true,
            hint: $('.typehint-hint'),
            menu: $('.typehint-menu'),
            classNames: {
                open: 'is-open',
                empty: 'is-empty',
                cursor: 'is-active',
                suggestion: 'typehint-suggestion',
                selectable: 'typehint-selectable'
            }
		}, {
			name: 'search-source-hint',
			display: 'name',
			source: searchSourceHint
	}).on('typeahead:selected', function(obj, datum, name) {
        /* select candidate */
        // console.log(datum);
        // for candidate create/update search
        if(datum.industry){
            $("#get-industry-child option[value="+datum.industry+"]").prop("selected", true);
            _this = $('#get-industry-child');
            var _target = $('option:selected', _this);
            $.get(_this.attr('data-url'), {parent:_target.attr('data-id')},
                function(result){
                    if(result.length){
                        var _string = '<option value="">select one</option>';
                        $.each(result, function(index, value){
                            _string+='<option value="'+value.name+'" data-id="'+value.id+'">'+value.name+'</option>';
                        });
                        $('#industry-child').html(_string);
                        $('#industry-child option[value="'+datum.category+'"]').prop("selected", true);
                    }else{
                        $('#industry-child').html('<option value="">select industry first</option>');
                    }

                }).fail(function(){
                    swal("Find industry fial!", 'Network error or server error', "error");
                });

        }
    });
;

});
