<?php
/*
Template Name: Личного Кабинета
*/
?>

<?php
get_header();
?>
<?php
    
    $cur_user_id = get_current_user_id();
    if($cur_user_id !=0) {
        $user_info = get_userdata($cur_user_id);
        $roles = array_shift($user_info->roles);
        if($roles == 'subscriber') {
            echo "subscriber";
            class subscriberUserData {
                public $login;
                public $surname;
                public $patronymic;
                public $login;
                public $login;

            } 
        }
        else {
            echo "super";
        }
        // class userData {
            
        // } 
    }
?>
<main class="account-page">
        <div class="wrapper">
            <div class="page-title">Личный кабинет</div>
            <div class="account-tabs-wrapper">
                <div class="account-tabs-wrapper__buttons">
                    <div class="tab__btn active">
                        <div class="text">Личные данны</div>
                    </div>
                    <div class="tab__btn">
                        <div class="text">Материалы конференции</div>
                    </div>
                    <div class="tab__btn ansver">
                        <div class="text">Вопросы и ответы</div>
                        <div class="new-message">
                            <div class="value">2</div>
                        </div>
                    </div>
                    <div class="tab__btn question">
                        <div class="text">Задать вопрос</div>
                        <div class="icon"><img src="../assets/img/icons/question-simbol.svg" alt="" class="icon__img"></div>
                    </div>
                    <div class="tab__btn sign-out">
                        <div class="text">Выйти из аккаунта</div>
                    </div>

                </div>
                <div class="account-tabs-wrapper__content">
                    <div class="tab" id="personal-data">
                        <div class="login">
                            Login: <?= $user_info->user_login?>
                        </div>
                        <input type="text" class="input-line surname*" value="<?= $user_info->user_lastname?>" placeholder="Фамилия*">
                        <input type="text" class="input-line name*" value="<?= $user_info->user_name?>" placeholder="Имя*">
                        <input type="text" class="input-line patronymic*" value="" placeholder="Отчество*">
                        <input type="text" class="input-line email*" value="" placeholder="E-mail*">
                        <input type="phone" class="input-line phone" value="" placeholder="Телефон">
                        <input type="text" class="input-line organization" value="" placeholder="Организация">
                        <!-- Поля для выступающих -->
                        <textarea class="input-line " placeholder="Тема выступления*"></textarea>
                        <textarea name="about-info" class="input-line" placeholder="Информация о спикере*"></textarea>
                        <label for="about-info" class="input-line-label">не более 500 символов</label>
                        <div class="btn-block">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();