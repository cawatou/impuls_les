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

    // Range slider в карточке товара
    $( function() {
        $( "#slider-range-max" ).slider({
            range: "max",
            min: 600,
            max: 4000,
            value: 1200,
            step: 100,
            slide: function( event, ui ) {
                $( "#amount" ).val( ui.value );
                $('.measure').val('');
            }
        });
        $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
    } );

    // Фильтр ввода в input (только цифры)
    $('.measure').bind("change keyup input click", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

});


/*========================  CALCULATOR =================================*/
$('.grade').on('change', function(){
    var id = $(this).val();
    var price_list = [];
    $( "#price_list option" ).each(function() {
        var key = $(this).val();
        var value = $(this).text();
        key = parseInt(key);
        price_list[key] = value;
    });
    var price = price_list[id];
    $('span.price').html(price);
    $('.measure').val('');
})

$(document).on('input', '.measure', function () {
    var $item = $(this),
        value = $item.val(),
        type = $item.attr('name');

    if(value > 0) calculate(type, value);
    console.log(value, type);
});

function calculate(type, value){
    var width = $('input.width').val(),
        thikness = $('input.thikness').val(),
        length = $('#amount').val(),
        price = $('span.price').text(),
        cubic, square, m3, m2, count, total_price;

    length = length / 1000;
    cubic = length * thikness * width;
    square = length * width;

    if(type === 'm3'){
        m3 = value;
        m2 = m3 / thikness;
        m2 = parseFloat(m2).toFixed(3);
        count = m3 / cubic;
    }

    if(type === 'm2'){
        m2 = value;
        m3 = m2 * thikness;
        m3 = parseFloat(m3).toFixed(3);
        count = m2 / square;
    }

    if(type === 'count'){
        count = value;
        m3 = count * cubic;
        m3 = parseFloat(m3).toFixed(3);
        m2 = count * square;
        m2 = parseFloat(m2).toFixed(3);

    }

    total_price = price * m2;
    total_price = Math.round(total_price);
    count = Math.round(count);

    $('input.m3').val(m3);
    $('input.m2').val(m2);
    $('input.count').val(count);
    $('span.total_price').text(total_price);
    console.log(width, thikness, length);
}

