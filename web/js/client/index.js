$(document).ready(function(){
    var _client_table = $('#client-table');
    var _delete_url =  _client_table.attr('data-delete-action');
    var _edit_url =  _client_table.attr('data-edit-action');
    var _view_url = _client_table.attr('data-view-action');
    var privacy = false;
    var _api_url = _client_table.attr('data-index-action');
    var _pager = 0;

    /*  datatable*/
    var dataTableSettings = {
        stateSave: true,
//        processing: true,
        serverSide: true,
        searching: false,
        destroy: true,
        autoWidth: true,
        order: [[ 1, "desc" ]],
        ajax: {
            url: _api_url,
            type:'POST',
            dataType: 'json',
            data: function ( aoData ) {
                //把分頁的參數與自訂的搜尋結合
                $.each($('#search-form').serializeArray(), function(key, value){
                    aoData[value.name] =value.value;
                });
                return aoData;
            },
            dataSrc: 'content'
        },
        columns: [
          { data: 'company' },
          { data: 'short' },
          { data: 'phone' },
          { data: 'email' },
          { data: 'contact' },
          { data: 'sales' },
          { data: 'created_at' },
          {
              data: null,
              width:'100px',
              defaultContent: '',
              mRender: function(data,type,full){
                	// console.log('data',type);
                	if(type=="display"){
                        var ret ='<a href="'+_view_url+'?id='+data.id+'" class="btn">\
                        <i class="fa fa-eye"></i>\
                        </a>\<a href="'+_edit_url+'?id='+data.id+'" class="btn">\
                        <i class="fa fa-pencil"></i>\
                        </a>';
                        ret+= '<span class="btn js-delete-btn">\
                        <i class="fa fa-trash"></i>\
                        </span>';
                        return ret;
                	}
                	return "";
                }},
      ],
      "rowCallback": function( row, data, index ) {

        $(row).attr('data-id',data.id);

      }
    }
 /*   if(_client_table.attr('data-admin')==0){
        dataTableSettings.deferLoading =  0;
    }*/

    var _data_table = _client_table.DataTable(dataTableSettings);
    
    /* search form */
    $('#search-form-submit').on('click', function(){
        _data_table.ajax.reload();
    });

//    console.log(_data_table);
    /* detect pager btn */
    _data_table.on( 'page.dt', function () {
        var info = _data_table.page.info();
    } );

    /* get-industry-child */
    
    $('#get-industry-child').on('change', function(){
        var _this = $(this);
        var _target = $('option:selected', this);
        $.get(_this.attr('data-url'), {parent:_target.attr('data-id')},
            function(result){
                if(result.length){
                    var _string = '<option value="">select one</option>';
                    $.each(result, function(index, value){
                        _string+='<option value="'+value.name+'" data-id="'+value.id+'">'+value.name+'</option>';
                    });
                    $('#industry-child').html(_string);
                }else{
                    $('#industry-child').html('<option value="">select industry first</option>');
                }

            }).fail(function(){
                swal("Find industry Fail!", 'Network error or server error', "error");
            });
    });
    /* delete */
    _client_table.on('click', '.js-delete-btn',function(){
        var _this = $(this);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            html: false
        }, function(isConfirm){
            if(isConfirm){
                $.post(_delete_url, {id:_this.parents('tr').attr('data-id')}, function(result){
            			if(result.success){
                            swal("Deleted!", result.message, "success");
                            _this.parents('tr').remove();
            			}else{
                            swal("Fail!", result.message, "error");
            			}

            		}).fail(function(){
            			swal("Fail!", 'Network error or server error', "error");
            		});
            }

        });

    });

});
