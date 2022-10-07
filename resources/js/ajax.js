window.addEventListener('DOMContentLoaded', function() {
    $('.like-toggle').on('click',function() {
        $this = $('.like-toggle');    //aタグ
        const $destinationId = $this.data('destination-id');
        $.ajax({
            type:"POST",
            url:"/good",
            dataType:"json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                "destination_id":$destinationId
            }
        }).done(function (data){
            console.log("成功");
            $this.toggleClass("liked");
        }).fail(function (data){
            console.log("失敗しました");
            console.log(data);
        });
    });
});