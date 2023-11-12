
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadmore(){
    const page = $('#page').val(); // lấy giá trị của element có id page
    $.ajax({
        type: 'POST',
        datatype:'JSON',
        data:{page},
        url:'/services/load-product',
        success:function (result){
            //result là biến và html được xem là một key đẫ gửi ở phần json của controller
            if(result.html !== ''){
                $('#loadProduct').append(result.html)
                $('#page').val(+page + 1)
            }
            else{
                alert('Đã hiển thị toàn bộ sản phẩm');
                $('#btn-load-more').css('display','none');
            }
        }
    })
}
$(document).ready(function() {
    $('#size').change(function() {
        size = $('#size').val();
        if(size==="S"){
            $('#sizeM').css('display','none');
            $('#sizeS').css('display','block');
            $('#getsize').val("S");
        }
        else if(size==="M"){
            $('#sizeS').css('display','none');
            $('#sizeM').css('display','block');
            $('#getsize').val("M");
        }
    })
})


