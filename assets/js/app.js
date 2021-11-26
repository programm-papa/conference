$(document).ready(function() {
    // //Работа переключения табов программы
    // let tabBtnFirst = document.getElementById("tab_1");
    // let tabBtnSecond = document.getElementById("tab_2");
    // let tabsBtnsArr = document.getElementsByClassName("tabs-btn");
    // for (i = 0; i < tabsBtnsArr.length; ++i) {
    //     tabsBtnsArr[i].addEventListener("click", function() {
    //         document.querySelector('.tabs-btn.active').classList.remove('active');
    //         this.classList.add('active');
    //         console.log(this.id.slice(9));
    //         if (this.id.slice(9) == '1') {
    //             if (document.querySelector('.programm-tab.hidden#tab_1')) {
    //                 document.querySelector('.programm-tab#tab_2').classList.add('hidden');
    //                 document.querySelector('.programm-tab.hidden#tab_1').classList.remove('hidden');
    //             }
    //         } else {
    //             if (document.querySelector('.programm-tab.hidden#tab_2')) {
    //                 document.querySelector('.programm-tab#tab_1').classList.add('hidden');
    //                 document.querySelector('.programm-tab.hidden#tab_2').classList.remove('hidden');
    //             }
    //         }
    //     });
    // }

    // //Открытие элемента "подробнее" карточек спикера
    // // let detailedSpeakerInformation = [];
    // // class speakerInfo {
    // //     constructor()
    // // }

    // let moreSpeakerBtnArr = document.getElementsByClassName("speaker-description__detailed");
    // for (i = 0; i < moreSpeakerBtnArr.length; ++i) {
    //     moreSpeakerBtnArr[i].addEventListener("click", function() {
    //         // alert(this.closest('.speaker-card').id);
    //         let parrentSpeakerCard = this.closest('.speaker-card');
    //         morePopUpOn(parrentSpeakerCard.offsetTop + parrentSpeakerCard.offsetHeight / 6);
    //         // let parrentSpeakerBlockPosition = document.getElementsByClassName("speakers-block").;
    //     })
    // }

    // let closePopUpBtn = document.querySelector(".close-btn");
    // closePopUpBtn.addEventListener("click", function() {
    //     morePopUpOff();
    // });

    // function morePopUpOn(position) {
    //     let moreBlock = document.querySelector(".more-block");
    //     let moreBlockPopUp = document.querySelector(".more-block .more-popup");
    //     if (position + moreBlockPopUp.offsetHeight > moreBlock.offsetHeight) {
    //         // дописать проверку
    //     }
    //     moreBlock.classList.add("open");
    //     moreBlockPopUp.style.top = position + "px";
    // }

    // function morePopUpOff() {
    //     let moreBlock = document.querySelector(".more-block");
    //     moreBlock.classList.remove("open");
    // }

    // //Работа блока "вопрос-ответ"
    // let questionArr = document.getElementsByClassName("question");
    // for (i = 0; i < questionArr.length; ++i) {
    //     questionArr[i].addEventListener("click", function() {
    //         this.parentElement.classList.toggle('open');
    //     })
    // }

    // //Запуск регистрации
    // $('.open-registr-popup').on('click', function() {
    //     if ($('.autorization-block').length > 0) {
    //         $('.autorization-block').addClass('open');
    //     }
    //     if ($('.popup.active').length > 0) {
    //         $('.popup.active').removeClass('active');
    //     }
    //     if ($('#registrattion').length > 0) {
    //         $('#registrattion').addClass('active');
    //     }
    // })

    // //Запуск входа/login
    // $('.open-signin-popup').on('click', function() {
    //     if ($('.autorization-block').length > 0) {
    //         $('.autorization-block').addClass('open');
    //     }
    //     if ($('.popup.active').length > 0) {
    //         $('.popup.active').removeClass('active');
    //     }
    //     if ($('#login').length > 0) {
    //         $('#login').addClass('active');
    //     }
    // })

    // //Закрытие попапов
    // $('.close-popup').on('click', function() {
    //     if ($('.popup.active').length > 0) {
    //         $('.popup.active').removeClass('active');
    //     }
    //     if ($('.autorization-block.open').length > 0) {
    //         $('.autorization-block').removeClass('open');
    //     }
    // })


    // //Валидация, функционал и ошибки в попапах
    // $('.password-block label').hover(function() {
    //     $('.password-block label').prev().attr('type', "text");
    // }, function() {
    //     $('.password-block label').prev().attr('type', "password");
    // })


    // $('.autorization__input.error').on('input', function() {
    //     $('.autorization__input.error').removeClass('error');
    //     if ($('.popup.login .error-description.visible').length > 0) {
    //         $('.popup.login .error-description.visible').removeClass('visible');
    //     }

    // })


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


    }

})