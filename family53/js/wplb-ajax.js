jQuery(document).ready(function($) {



    $('.login.active .popup-btn').on("click", function(ev) {
        $.ajax({
                // Путь к файлу admin-ajax.php.
                url: wplb_ajax_obj.ajaxurl,
                // Создаем объект, содержащий параметры отправки.
                data: {
                    // Событие к которому будем обращаться.
                    'action': 'wplb_ajax_request',
                    // Используем nonce для защиты.
                    'security': wplb_ajax_obj.nonce,
                    // Передаём тип формы.
                    'type': 'login',
                    // Передаём значения формы.
                    'login': $("input[name~='login__login']").val(),
                    'password': $("input[name~='login__password']").val(),
                    // Перед отправкой Ajax в WordPress.
                    beforeSend: function() {}
                }
            })
            .done(function(data) {
                // Функция для работы с обработанными данными.
                // Переменная $reslut будет хранить результат обработки.
                let $result = JSON.parse(data);

            })
            .fail(function(errorThrown) {
                // Читать ошибки будем в консоли если что-то пойдет не по плану.

                console.log(errorThrown);

            });
        // Предотвращаем действие, заложенное в форму по умолчанию.
        ev.preventDefault();
    })

    //Кнопка выхода в аккаунте
    // $('.signout').click(function(ev) {
    //     $.ajax({
    //             // Путь к файлу admin-ajax.php.
    //             url: wplb_ajax_obj.ajaxurl,
    //             // Создаем объект, содержащий параметры отправки.
    //             data: {
    //                 // Событие к которому будем обращаться.
    //                 'action': 'wplb_ajax_request',
    //                 // Используем nonce для защиты.
    //                 'security': wplb_ajax_obj.nonce,
    //                 // Перед отправкой Ajax в WordPress.
    //                 beforeSend: function() {}
    //             }
    //         })
    //         .always(function() {
    //             // Выполнять после каждого Ajax запроса.

    //         })
    //         .done(function(data) {
    //             // Функция для работы с обработанными данными.

    //         })
    //         .fail(function(errorThrown) {
    //             // Читать ошибки будем в консоли если что-то пойдет не по плану.

    //             console.log(errorThrown);

    //         });
    //     // Предотвращаем действие, заложенное в форму по умолчанию.
    //     ev.preventDefault();
    // })
})