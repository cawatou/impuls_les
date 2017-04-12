jQuery(document).ready(function () {
    
    // Отправка заявки на обратный звонок
    $('.callback_btn').on('click', function(){
        $('.modal').hide();
        $('.callback_modal').show();
    })

    $('.callback_modal .close').on('click', function(){
        $('.callback_modal').hide()
    })

    $('#callbacksend').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/callbacksend',
            data: $('#callbacksend').serialize(),
            success: function(res){
                if(res = 'done'){
                    $('.callback_modal').hide();
                    $('.callback_modal input[type=text]').val('');
                    alert('Ваше сообщение отправлено');
                }else if(res = 'error'){
                    alert('Произошла ошибка при отправке сообщения');
                }
            }
        })

    })

    // Отправка заявки на обратную связь с главной страницы
    $('.btn-add_to_cart').on('click', function(){
	var name = $(this).attr('data-value');
	var id = $(this).attr('data-id');
	$('.item_name').val(name);
	$('.item_id').val(id);
        $('.modal').hide();
        $('.main_modal').show();
    })

    $('.main_modal .close').on('click', function(){
        $('.main_modal').hide()
    })
    
    
     $('#order_mail').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/ordermail',
            data: $('#order_mail').serialize(),
            success: function(res){
                if(res = 'done'){
                    $('.main_modal').hide();
                    $('.main_modal input[type=text]').val('');
                    alert('Ваше сообщение отправлено');
                }else if(res = 'error'){
                    alert('Произошла ошибка при отправке сообщения');
                }
            }
        })

    })
     
      $('#feedback').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/feedback',
            data: $('#feedback').serialize(),
            success: function(res){
                if(res = 'done'){
                    $('.main_modal').hide();
                    $('#feedback input[type=text]').val('');
		    $('#feedback textarea').val('');
                    alert('Ваше сообщение отправлено');
                }else if(res = 'error'){
                    alert('Произошла ошибка при отправке сообщения');
                }
            }
        })

    })


    // Подсветка диалогов в сортности
    $('.comment_block').hover(
        function() {
            $(this).parent().addClass( "comment_hover" );
        }, function() {
            $(this).parent().removeClass( "comment_hover" );
        }
    )
});