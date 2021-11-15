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

//Работа блока "вопрос-ответ"
let questionArr = document.getElementsByClassName("question");
for (i = 0; i < questionArr.length; ++i) {
    questionArr[i].addEventListener("click", function() {
        this.parentElement.classList.toggle('open');
    })
}