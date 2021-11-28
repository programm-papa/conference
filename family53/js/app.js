jQuery(document).ready(function($) {
    //Работа переключения табов программы
    let tabBtnFirst = document.getElementById("tab_1");
    let tabBtnSecond = document.getElementById("tab_2");
    let tabsBtnsArr = document.getElementsByClassName("tabs-btn");
    for (i = 0; i < tabsBtnsArr.length; ++i) {
        tabsBtnsArr[i].addEventListener("click", function() {
            document.querySelector('.tabs-btn.active').classList.remove('active');
            this.classList.add('active');
            console.log(this.id.slice(9));
            if (this.id.slice(9) == '1') {
                if (document.querySelector('.programm-tab.hidden#tab_1')) {
                    document.querySelector('.programm-tab#tab_2').classList.add('hidden');
                    document.querySelector('.programm-tab.hidden#tab_1').classList.remove('hidden');
                }
            } else {
                if (document.querySelector('.programm-tab.hidden#tab_2')) {
                    document.querySelector('.programm-tab#tab_1').classList.add('hidden');
                    document.querySelector('.programm-tab.hidden#tab_2').classList.remove('hidden');
                }
            }
        });
    }

    //Открытие элемента "подробнее" карточек спикера
    // let detailedSpeakerInformation = [];
    // class speakerInfo {
    //     constructor()
    // }

    if ($('.speaker-description__detailed').length > 0) {
        $('.speaker-description__detailed').each(function() {
            $(this).click(function() {
                let speakerCard = $(this).parents('.speaker-card');
                $(speakerCard).find('.more-block').addClass('open');
            })
        })
        $('.more-block .close-btn').on('click', function() {
            if ($(this).parents('.more-block').hasClass('open')) {
                $(this).parents('.more-block').removeClass('open');
            }
        })
    }
    //Работа блока "вопрос-ответ"
    let questionArr = document.getElementsByClassName("question");
    for (i = 0; i < questionArr.length; ++i) {
        questionArr[i].addEventListener("click", function() {
            this.parentElement.classList.toggle('open');
        })
    }

    //Запуск регистрации
    $('.open-registr-popup').on('click', function() {
        if ($('.autorization-block').length > 0) {
            $('.autorization-block').addClass('open');
        }
        if ($('.popup.active').length > 0) {
            $('.popup.active').removeClass('active');
        }
        if ($('#registrattion').length > 0) {
            $('#registrattion').addClass('active');
        }
    })

    //Запуск входа/login
    $('.open-signin-popup').on('click', function() {
        if ($('.autorization-block').length > 0) {
            $('.autorization-block').addClass('open');
        }
        if ($('.popup.active').length > 0) {
            $('.popup.active').removeClass('active');
        }
        if ($('#login').length > 0) {
            $('#login').addClass('active');
        }
    })

    //Закрытие попапов
    $('.close-popup').on('click', function() {
        if ($('.popup.active').length > 0) {
            $('.popup.active').removeClass('active');
        }
        if ($('.autorization-block.open').length > 0) {
            $('.autorization-block').removeClass('open');
        }
    })


    //Валидация, функционал и ошибки в попапах
    $('.password-block label').hover(function() {
        $('.password-block label').prev().attr('type', "text");
    }, function() {
        $('.password-block label').prev().attr('type', "password");
    })

    if ($('.account-page .tab__btn').length > 0) {
        $('.account-page .tab__btn').each(function() {
            $(this).click(function() {
                if ($('.tab__btn.active').length > 0) {
                    $('.tab__btn.active').removeClass('active');
                }
                $(this).addClass('active');
                let id = $(this).attr('id').slice(4);
                if (id != 'open-question') {
                    if ($('.account-page .tab.active').length > 0) {
                        $('.account-page .tab.active').removeClass('active');
                    }
                    if ($('.account-page #' + id).length > 0) {
                        $('.account-page #' + id).addClass('active');
                    }
                }
            })
        })
    }

    if ($('.account-page #materials').length > 0) {
        if ($('.speaker-add-file-block .file').length > 0) {
            $('.speaker-add-file-block .file .btn-edit').on('click', function() {
                //Блок файла
                let fileBlock = $(this).parent();
                //Убираем селект с других файлов
                if ($('.speaker-add-file-block .file.selected').length > 0) {
                    $('.speaker-add-file-block .file.selected').removeClass('selected');
                }
                //Записываем старое название
                let oldFileName = $(fileBlock).find('.file__name').val();
                //Добавляем классы на блок файла
                $(fileBlock).addClass('selected');
                $(fileBlock).addClass('editable');
                //Включаем маску
                $('.speaker-add-file-block .mask').addClass('active');
                //Обработка клика по маску для выхода из редактирования
                $('.speaker-add-file-block .mask').click(function() {
                    let newFileName = $(fileBlock).find('.file__name').val();
                    if (newFileName !== oldFileName) {
                        if (confirm('Продолжить без сохранения ?')) {
                            $(fileBlock).find('.file__name').val(oldFileName);
                            $(this).removeClass('active');
                            $(fileBlock).removeClass('editable');
                            $(fileBlock).removeClass('selected');
                        }
                    } else {
                        $(this).removeClass('active');
                        $(fileBlock).removeClass('editable');
                        $(fileBlock).removeClass('selected');
                    }
                })
                $('.speaker-add-file-block .file .btn-delete').on('click', function() {
                    $('.speaker-add-file-block .mask').removeClass('active');
                    $(fileBlock).remove();
                });
            })
        }
        if ($('.input__wrapper .input__file').length > 0) {
            $('.input__wrapper .input__file').on('change', function() {
                if (this.files !== undefined) {
                    file = this.files;
                    if (!$('.input__wrapper .upload-file').hasClass('visible')) {
                        $('.input__wrapper .upload-file').addClass('visible');
                        $('.input__wrapper .upload-file').on('click', function(event) {
                            event.stopPropagation();
                            event.preventDefault();
                            console.log(file);
                            if (file === undefined) {
                                alert('Ошибка загрузки файла, попробуйте позже');
                                return 0;
                            }
                            let data = new FormData();
                            $.each(file, function(key, value) {
                                data.append(key, value);
                            });
                            // добавим переменную идентификатор запроса
                            data.append('user_id', $(this).attr('id'));
                            data.append('my_file_upload', 1);
                            console.log(data);

                            // AJAX запрос
                            $.ajax({
                                url: 'https://familyconf53.ru/file-load.php',
                                type: 'POST',
                                data: data,
                                cache: false,
                                dataType: 'json',
                                // отключаем обработку передаваемых данных, пусть передаются как есть
                                processData: false,
                                // отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
                                contentType: false,
                                // функция успешного ответа сервера
                                success: function(respond, status, jqXHR) {
                                    // ОК
                                    if (typeof respond.error === 'undefined') {
                                        location.reload();
                                    }
                                    // error
                                    else {
                                        console.log('ОШИБКА: ' + respond.error);
                                    }
                                },
                                // функция ошибки ответа сервера
                                error: function(jqXHR, status, errorThrown) {
                                    console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
                                }

                            });
                        })
                    }
                    let fileName = this.files[0].name;
                    console.log(this.files);
                    $('.add-file_btn').html(fileName);
                } else {
                    alert("Ошибка, файл не удалось добавить");
                }
            })

        }

    }

})