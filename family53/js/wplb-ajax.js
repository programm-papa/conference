jQuery(document).ready(function($) {
    $('.autorization-block #login .popup-btn').on("click", function() {
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
                }
            })
            .done(function(data) {
                // Функция для работы с обработанными данными.
                // Переменная $reslut будет хранить результат обработки.
                let result = JSON.parse(data);
                if (!result.status) {
                    switch (result.content) {
                        case 'Неизвестное имя пользователя. Перепроверьте или попробуйте ваш адрес email.':
                            $(".popup.login .autorization__input[name~='login__login']").addClass('error');
                            $('.popup.login .error-description').addClass('visible');
                            $('.popup.login .error-description').html('Неизвестное имя пользователя. Перепроверьте или попробуйте ваш адрес email.');
                            break;
                        default:
                            $(".popup.login .autorization__input[name~='login__password']").addClass('error');
                            $('.popup.login .error-description').addClass('visible');
                            $('.popup.login .error-description').html('Пароль неверный. Если вы не помните свой пароль, вы можете восстановить его.');
                            break;
                    }
                    $('.autorization__input.error').on('input', function() {
                        $('.autorization__input.error').removeClass('error');
                        if ($('.popup.login .error-description.visible').length > 0) {
                            $('.popup.login .error-description.visible').removeClass('visible');
                        }

                    })
                } else {
                    location.reload();
                }
            })
            .fail(function(errorThrown) {
                // Читать ошибки будем в консоли если что-то пойдет не по плану.
                console.log(errorThrown);

            });
        // Предотвращаем действие, заложенное в форму по умолчанию.
        // ev.preventDefault();
    });

    $('.autorization-block #registrattion .popup-btn').on("click", function() {
        if (regVerification()) {
            let organization = '';
            if ($(".input[name~='registrattion__organization'").val() !== '') {
                organization = $(".input[name~='registrattion__organization'").val();
            }
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
                        'type': 'registration',
                        // Передаём значения формы.
                        'login': $("input[name~='registrattion__login']").val(),
                        'password': $("input[name~='registrattion__password']").val(),
                        'email': $("input[name~='registrattion__email']").val(),
                        'surname': $("input[name~='registrattion__surname']").val(),
                        'name': $("input[name~='registrattion__name']").val(),
                        'patronymic': $("input[name~='registrattion__patronymic']").val(),
                        'organization': organization,
                        // Перед отправкой Ajax в WordPress.
                        beforeSend: function() {}
                    }
                })
                .done(function(data) {
                    // Функция для работы с обработанными данными.
                    // Переменная $reslut будет хранить результат обработки.
                    let result = JSON.parse(data);
                    if (!result.status) {
                        if (result.content == 'Пользователь уже существует') {
                            $(".popup.login .autorization__input[name~='registrattion__login']").addClass('error');
                            $('.popup.login .error-description').addClass('visible');
                            $('.popup.login .error-description').html('Пользователь с таким Логином или Email уже сущестует');
                        }
                    } else {
                        location.reload();
                    }
                    console.log(result);
                })
                .fail(function(errorThrown) {
                    // Читать ошибки будем в консоли если что-то пойдет не по плану.
                    console.log(errorThrown);

                });
        }

        //Валидация 
        function regVerification() {
            $("#registrattion input").on('input', function() {
                if ($(this).hasClass('error')) {
                    $(this).removeClass('error');
                }
                if ($('.error-description.visible').length > 0) {
                    $('.error-description.visible').removeClass('visible');
                }
            });
            loginPattern = /^([a-z1-9]+|\d+)$/i;
            passwordPattern = /^(?=.*[A-Za-z].*[A-Za-z])(?=.*[0-9].*[0-9])(?=.*[A-Za-z].*[A-Za-z].*[A-Za-z]).{8,}$/
            console.log($("#registrattion input[name~='registrattion__login']").val().search(loginPattern));
            //Проверка логина
            if ($("#registrattion input[name~='registrattion__login']").val().length < 5) {
                if ($("#registrattion input[name~='registrattion__login']").val() == '') {
                    $("#registrattion input[name~='registrattion__login']").addClass('error');
                    $('.popup.registrattion .error-description').addClass('visible');
                    $('.popup.registrattion .error-description').html('Обязательное поле "Логин" не заполнено.');
                    return false;
                }
                $("#registrattion input[name~='registrattion__login']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Создйте логин побольше');
                return false;
            } else if ($("#registrattion input[name~='registrattion__login']").val().search(loginPattern) != 0) {
                $("#registrattion input[name~='registrattion__login']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Логин должен содержать только символы английской раскладки и цифры');
            }
            //Проверка пароля
            if ($("#registrattion input[name~='registrattion__password']").val().length < 8) {
                if ($("#registrattion input[name~='registrattion__password']").val() == '') {
                    $("#registrattion input[name~='registrattion__password']").addClass('error');
                    $('.popup.registrattion .error-description').addClass('visible');
                    $('.popup.registrattion .error-description').html('Обязательное поле "Пароль" не заполнено.');
                    return false;
                }
                $("#registrattion input[name~='registrattion__password']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Пароль слишколм маленький. Минимум 8 символов.');
                return false;
            }

            //Проверка Фамилии
            if ($("#registrattion input[name~='registrattion__surname']").val() == '') {
                $("#registrattion input[name~='registrattion__surname']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Обязательное поле "Фамилия" не заполнено.');
                return false;
            }
            //Проверка Имени
            if ($("#registrattion input[name~='registrattion__name']").val() == '') {
                $("#registrattion input[name~='registrattion__name']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Обязательное поле "Фамилия" не заполнено.');
                return false;
            }
            //Проверка Имени
            if ($("#registrattion input[name~='registrattion__patronymic']").val() == '') {
                $("#registrattion input[name~='registrattion__patronymic']").addClass('error');
                $('.popup.registrattion .error-description').addClass('visible');
                $('.popup.registrattion .error-description').html('Обязательное поле "Отчество" не заполнено.');
                return false;
            }
            return true;
        }

    });
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