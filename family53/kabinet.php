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
        $user_meta_info = get_user_meta($cur_user_id);
        $roles = array_shift($user_info->roles);
        $super = false;
        if($roles == 'subscriber') {
        }
        else {
            $super = true;
        }
    }
?>
<main class="account-page">
        <div class="wrapper">
            <div class="page-title">Личный кабинет</div>
            <div class="account-tabs-wrapper">
                <div class="account-tabs-wrapper__buttons">
                    <div class="tab__btn personal-data active">
                        <div class="text">Личные данны</div>
                    </div>
                    <div class="tab__btn material">
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
                    <a href="<?php echo wp_logout_url(home_url());?>" class="tab__btn sign-out">
                        <div class="text">Выйти из аккаунта</div>
                    </a>

                </div>
                <div class="account-tabs-wrapper__content">
                    <div class="tab " id="personal-data">
                        <input class="input-role" type="hidden" value="<?= $super ?>">
                        <input class="input-user-id" type="hidden" value="<?= $cur_user_id ?>">
                        <div class="login">
                            Login: <?= $user_info->user_login?>
                        </div>
                        <input type="text" class="input-line surname" value="<?= $user_info->user_lastname?>" placeholder="Фамилия*">
                        <input type="text" class="input-line name" value="<?= $user_info->user_firstname?>" placeholder="Имя*">
                        <input type="text" class="input-line patronymic" value="<?= $user_info->user_patronymic?>" placeholder="Отчество*">
                        <input type="text" class="input-line email" value="<?= $user_info->user_email?>" placeholder="E-mail*">
                        <input type="phone" class="input-line phone" value="<?= $user_info->user_phone?>" placeholder="Телефон">
                        <input type="text" class="input-line organization" value="<?= $user_info->user_organization?>" placeholder="Организация">
                        <!-- Поля для выступающих -->
                        <?php 
                        if($super) {
                        ?>
                        <textarea maxlength='500'  class="input-line speech-topic" placeholder="Тема выступления*"><?= $user_info->user_topic?></textarea>
                        <textarea maxlength='500' name="about-info" class="input-line speech-description" placeholder="Информация о спикере*" ><?= $user_info->user_theme_description?></textarea>
                        <label for="about-info" class="input-line-label">не более 500 символов</label>
                        <?php } ?>
                        <div class="btn-block">
                            <div class="save-btn">Сохранить</div>
                        </div>
                    </div>
                    <!-- <div class="tab "></div> -->
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();