// $(function(goodbutton) {
//   $('#goodbutton').click(function(){
//     $this = $(this);
//     const $data =$this.children('hidden').val();
//     $.ajax({
//       Type:'POST',  //POSTのタイプを付与
//       url:'/good',  //routeで設定したURL
//       dataType:'json',
//       headers: {
//         'X-CSRF=TOKEN' : $('meta[name="csrf-token"]').attr('content')
//       },
//       data:{ "id":$data }   //アクセスの時に必要なデータを記載
//     }).done(function (){    //成功時 iタグにactiveを付与
//       $this.children('i').toggleClass("active");
//     }).fail(function (){
//       alert("通信に失敗しました。");
//     });
//   });
// });



// function like(postId) {
//   console.log("動いてない");
//     $.ajax({
//       headers: {
//         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//       },
//       url: `/like/${postId}`,
//       type: "POST",
//     })
//     .done(function (data, status, xhr) {
//       console.log(data);
//     })
//     .fail(function (xhr, status, error) {
//       console.log();
//     });
// }


// $(function () {
//     let like = $('.like-toggle');
//     let likeDestinationId; 

//     $(".like-toggle").click(function(){
// 		console.log("動いてる？");
// 	});



    // like.on('click',function () {
    //     let $this = $(this); //イベント発火した要素が入る=iタグ
    //     likeDestinationId = $this.data('review-id');
    //     //Ajax処理
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    //         },  //name属性がcsrf-tokenかつmetaタグがcontent属性の値を取得
    //         url: '/like',  //routeでこのアドレスを定義
    //         method: 'POST',
    //         data: { //サーバに送信するデータ
    //             'destination_id' : likeDestinationId
    //         },
    //     })
    //     //成功時
    //     .done(function (data) {
    //         $this.toggleClass('liked'); //likedクラスのON/OFF
    //         $this.next('like-counter').html(data.review_likes_count);//いいねのカウント数変更
    //     })
    //     //通信失敗時
    //     .fail(function () {
    //         console.log('fail');
    //     });
    // });
// });


// $(function(goodbutton) {
//     $('#goodbutton').on('click', function() {
//         $this = $(this);
//         const $data = $this.children('hidden').val();
//         $.ajax({
//             Type:'POST',
//             url:'/good',
//             dataType:'json',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data:{ "id":$data }
//         }).done(function (){
//             $this.children('i').toggleClass("active");
//         }).fail(function (){
//             alert("通信に失敗しました。");
//         });
//     });
// });

// $(function ()
// {
//     //「toggle_wish」というクラスを持つタグがクリックされたときに以下の処理が走る
//     $('.toggle_wish').on('click', function ()
//     {
//         //表示しているプロダクトのIDと状態、押下し他ボタンの情報を取得
//         product_id = $(this).attr("product_id");
//         like_product = $(this).attr("like_product");
//         click_button = $(this);

//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  //基本的にはデフォルトでOK
//             },
//             url: '/like_product',  //route.phpで指定したコントローラーのメソッドURLを指定
//             type: 'POST',   //GETかPOSTメソットを選択
//             data: { 'product_id': product_id, 'like_product': like_product, }, //コントローラーに送るに名称をつけてデータを指定
//                 })
//             //正常にコントローラーの処理が完了した場合
//             .done(function (data) //コントローラーからのリターンされた値をdataとして指定
//             {
//                 if ( data == 0 )
//                 {
//                     //クリックしたタグのステータスを変更
//                     click_button.attr("like_product", "1");
//                     //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
//                     click_button.children().attr("class", "fas fa-heart");
//                 }
//                 if ( data == 1 )
//                 {
//                     //クリックしたタグのステータスを変更
//                     click_button.attr("like_product", "0");
//                     //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
//                     click_button.children().attr("class", "far fa-heart");
//                 }
//             })
//             ////正常に処理が完了しなかった場合
//             .fail(function (data)
//             {
//                 alert('いいね処理失敗');
//                 alert(JSON.stringify(data));
//             });
//     });
// });

// function like(postId){
//     $.ajax({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         url: `/like/${postId}`,
//         type: "POST",
//     })
//         .done(function(data, status, xhr) {
//             console.log(data);
//         })
//         .fail(function(xhr, status, error) {
//             console.log();
//         });
// };

