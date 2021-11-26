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

    let moreSpeakerBtnArr = document.getElementsByClassName("speaker-description__detailed");
    for (i = 0; i < moreSpeakerBtnArr.length; ++i) {
        moreSpeakerBtnArr[i].addEventListener("click", function() {
            // alert(this.closest('.speaker-card').id);
            let parrentSpeakerCard = this.closest('.speaker-card');
            morePopUpOn();
            // let parrentSpeakerBlockPosition = document.getElementsByClassName("speakers-block").;
        })
    }

    let closePopUpBtn = $(".close-btn");
    if (closePopUpBtn.length > 0) {
        closePopUpBtn.on("click", function() {
            morePopUpOff();
        });
    }

    function morePopUpOn() {
        let moreBlock = document.querySelector(".more-block");
        moreBlock.classList.add("open");
    }

    function morePopUpOff() {
        let moreBlock = document.querySelector(".more-block");
        moreBlock.classList.remove("open");
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
                alert(1);
            })
        })
    }

})