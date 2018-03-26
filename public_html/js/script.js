jQuery(document).ready(function () {
    $('.modal .close').on('click', function () {
        modal_close();
    })

    // Отправка заявки на обратный звонок
    $('.callback_btn').on('click', function () {
        $('.modal').hide();
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function () { // после выполнения предъидущей анимации
                $('.callback_modal').css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
            });
    })


    $('#callbacksend').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/callbacksend',
            data: $('#callbacksend').serialize(),
            success: function (res) {
                if (res = 'done') {
                    modal_close();
                    $('.callback_modal input[type=text]').val('');
                    alert('Ваше сообщение отправлено');
                } else if (res = 'error') {
                    alert('Произошла ошибка при отправке сообщения');
                }
            }
        })
    })

    // Отправка заявки на обратную связь с главной страницы
    $('.btn-add_to_cart').on('click', function () {
        var name = $(this).attr('data-value');
        var id = $(this).attr('data-id');
        $('.item_name').val(name);
        $('.item_id').val(id);
        modal_close();
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function () { // после выполнения предъидущей анимации
                $('.main_modal').css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
            });
    })

    /*$('.main_modal .close').on('click', function(){
     $('.main_modal').hide()
     })*/


    $('#order_mail').on('submit', function (e) {
        e.preventDefault();
        var grade = $('.grade option:selected').text(),
            m2 = $('.m2').val(),
            m3 = $('.m3').val(),
            count = $('.count').val(),
            total_price = $('.total_price').text(),
            length = $('#amount').val();
        var data = $('#order_mail').serialize();
        var extra_data = '&grade=' + grade + '&m2=' + m2 + '&m3=' + m3 + '&count=' + count + '&lenght=' + length + '&total_price=' + total_price;

        $.ajax({
            type: 'post',
            url: '/ordermail',
            data: data + extra_data,
            success: function (res) {
                if (res = 'done') { 
                    modal_close();
                    $('.main_modal input[type=text]').val('');
                    alert('Ваше сообщение отправлено');
                } else if (res = 'error') {
                    alert('Произошла ошибка при отправке сообщения');
                }
            }
        })

    })

    $('#feedback').on('submit', function (e) {
        e.preventDefault();
        modal_close();
        /*
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
         */
    })


    // Подсветка диалогов в сортности
    $('.comment_block').hover(
        function () {
            $(this).parent().addClass("comment_hover");
        }, function () {
            $(this).parent().removeClass("comment_hover");
        }
    )

    // Range slider в карточке товара
    $(function () {
        $("#slider-range-max").slider({
            range: "max",
            min: 1000,
            max: 4000,
            value: 1000,
            step: 1000,
            slide: function (event, ui) {
                $("#amount").val(ui.value);
                $('.measure').val('');
            }
        });
        $("#amount").val($("#slider-range-max").slider("value"));
    })
    .each(function() {
        // var steps = 3;
        // console.log(steps);
        // for (var i = 0; i <= steps; i++) {
        //
        //     // Create a new element and position it with percentages
        //     var el = $('<label>|</label>').css('left', (i/steps*100) + '%');
        //
        //     // Add the element inside #slider
        //     $("#slider-range-max").append(el);
        //
        // }
    });;

    // Фильтр ввода в input (только цифры)
    $('.measure').bind("change keyup input click", function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

});


/*========================  CALCULATOR =================================*/
$('.grade').on('change', function () {
    var id = $(this).val();
    var price_list = [];
    console.log(id);
    $("#price_list option").each(function () {
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

    if (value > 0) calculate(type, value);
    console.log(value, type);
});

function calculate(type, value) {
    var width = $('input.width').val(),
        thikness = $('input.thikness').val(),
        length = $('#amount').val(),
        price = $('span.price').text(),
        cubic, square, m3, m2, count, total_price;

    length = length / 1000;
    cubic = length * thikness * width;
    square = length * width;

    if (type === 'm3') {
        m3 = value;
        m2 = m3 / thikness;
        m2 = parseFloat(m2).toFixed(3);
        count = m3 / cubic;
    }

    if (type === 'm2') {
        m2 = value;
        m3 = m2 * thikness;
        m3 = parseFloat(m3).toFixed(3);
        count = m2 / square;
    }

    if (type === 'count') {
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

function modal_close() {
    $('.modal').animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
        function () { // после анимации
            $(this).css('display', 'none'); // делаем ему display: none;
            $('#overlay').fadeOut(400); // скрываем подложку
        }
    );
}
