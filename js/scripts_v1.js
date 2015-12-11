$(document).ready(function() {
});
function addComment(news_id){           //функция добавления коментариев изз модального окна
    $('#modal-comment').modal('show');    //делаем модальное окно видимым
    $('#modal-submit-button').click(function(){
        var comment = $('#comment_user').val();     //take data frome the form (modal window)
        var date = $('#date_user').val();
        $('input[type=button]'), $(this).attr('disabled','disabled'); //блокировка кнопки отправки коментария в модальном окне (для избежания повторных отправок)
    /*$('#modal-submit-button').submit(function(){
    // Блокируем кнопки при отправке формы
    $('input[type=submit]', $(this)).attr('disabled', 'disabled');
    });*/
        $.ajax({
            type:'POST',
            data:{id: news_id, com:comment,date:date},   //отправляем данные в контролер First в переменной comment
            url:'http://bogdandvinin.site88.net/first/add_comment', //usercomm                   //Controller/action
            success: function(response){ //response
                $('#modal-comment-news')[0].reset();  //refresh form input
            },
            error: function(xht,str){
                alert('Возникла ошибка: '+ xhr.responseCode);
            },
            complete:function(){
                $('#modal-comm-result').append('<p class="m-comm-res" align="center" style="font-size: 17px">'+'Коментарий добавлен'+'</p>') //show info to user

                setTimeout(function(){                                          //прячем модальное окно
                    $('#modal-comment').modal('hide')
                },1000);
                setTimeout(function(){window.location.reload();},1000);  //reload window for show data frome php script
            }
    });
})
    }
/*function send_data(data1){
    var comment_user = data1.comment_user.value;
    $.ajax({
        type:'POST',
        data:{comment_user:comment_user},   //отправляем данные в контролер First в переменной comment
        url:'First/add_comment',
        success: function(data){
        $('.modal-body').html(data);
        },
        error: function(xht,str){
            alert('Возникла ошибка: '+ xhr.responseCode);
        },
        complete:function(){
            $('#modal-coment').modal('hide');
        }
    });
}*/
function hideShow(id){
     x = document.getElementById(id);
     if(x.style.display == 'none'){
     x.style.display='block';
     }else{
     x.style.display ='none';
     }
 }
function confirm1(id){
     if (confirm("Вы уверены?")){
     return true;
     }else {
     return false;
     }
 }