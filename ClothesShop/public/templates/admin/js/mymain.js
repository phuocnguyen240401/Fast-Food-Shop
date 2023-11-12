
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/*uploadfile*/
$(document).ready(function() {
    $('#uploadfile').change(function() {
        var form = new FormData();
        form.append('file', $(this)[0].files[0]);
            $.ajax({
                processData: false,
                contentType: false,
                type: 'POST',
                datatype: 'JSON',
                data:form,
                url:'/admin/upload/services',
                success: function (result) {
                    if(result.error==false){
                        $('#img_show').html('<a href="'+result.url+'" target="_blank"><img src="'+result.url+'" width="100px"></a>');
                        $('#file').val(result.url);
                    }
                    else{
                        alert('uploadfile lỗi');
                    }
                },
            });
        });
});



function removeRow(id,url){
    var token = $('meta[name="csrf-token"]').attr('content');
    if(confirm('Bạn có chắc muốn xóa không ?')){
        $.ajax ({
            type: 'DELETE',
            datatype: 'JSON',
            data:{'menuId':id,'_token':token},
            url:url+id,
            success:function (result) {
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }
            }

        })

    }

}

