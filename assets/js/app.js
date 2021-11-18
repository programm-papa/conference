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
        morePopUpOn(parrentSpeakerCard.offsetTop + parrentSpeakerCard.offsetHeight / 6);
        // let parrentSpeakerBlockPosition = document.getElementsByClassName("speakers-block").;
    })
}

let closePopUpBtn = document.querySelector(".close-btn");
closePopUpBtn.addEventListener("click", function() {
    morePopUpOff();
});

function morePopUpOn(position) {
    let moreBlock = document.querySelector(".more-block");
    let moreBlockPopUp = document.querySelector(".more-block .more-popup");
    if (position + moreBlockPopUp.offsetHeight > moreBlock.offsetHeight) {
        // дописать проверку
    }
    moreBlock.classList.add("open");
    moreBlockPopUp.style.top = position + "px";
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