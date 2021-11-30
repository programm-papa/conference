<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package family53
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> style = "margin-top: 0px !important;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php print_r(get_template_directory_uri());?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php print_r(get_template_directory_uri());?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php print_r(get_template_directory_uri());?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php print_r(get_template_directory_uri());?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php print_r(get_template_directory_uri());?>/img/favicon/safari-pinned-tab.svg" color="#7e5da7">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

     <?php  $cur_user_id = get_current_user_id();
            $user_info = get_userdata($cur_user_id);
            $roles = array_shift($user_info->roles);
            if($roles == 'subscriber') {?>
                <style>
                    #wpadminbar {
                        display: none !important;
                    }
                    html {
                        margin-top: 0px !important;
                    }
                </style>
            <?php } 
            if($roles == 'subscriber' || $roles == 'contributor' ) {
                show_admin_bar( false );
            }
            ?>
	<?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); 
$post_id = get_the_ID();
$headerClass = "";
if($post_id == 11 || $post_id == 22) {
    $headerClass = 'user-account';
}?>
    <header class="header <?= $headerClass; ?>">
        <div class="wrapper top-header desctop">
            <a href="/">
                <img src="<?php print_r(get_template_directory_uri());?>/img/icons/logo-top-header.svg" alt="" class="logo">
            </a>
            <nav class="menu">
                <ul class="menu__list">
                    <li class="item"><a href="/#programm-block">Программа</a></li>
                    <li class="item"><a href="/#speakers-block">Спикеры</a></li>
                    <!--<li class="item"><a href="/#question-block">Вопросы</a></li>-->
                    <li class="item"><a href="/#organizers-block">Организаторы</a></li>
                    <li class="item"><a href="/#broadcast-link-block">Ссылка на конференцию</a></li>
                </ul>
            </nav>
            <?php 
                    if($cur_user_id !=0) {
                        $user_name = $user_info->user_lastname." ".$user_info->user_firstname;
                        ?>
                        <a href="/kabinet" class="account">
                            <div class="name"><?= $user_name?></div>
                            <div class="avatar">
                                <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                            </div>
                        </a>
                         <?php
                    } else {
                ?>
                <div class="account open-signin-popup">
                    <div class="name">Личный кабинет</div>
                    <div class="avatar">
                        <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                    </div>
                </div>
            <?php
                    }
            ?>
        </div>
        <div class="wrapper top-header adaptive">
            <div class="top">
            <a href="/">
                <img src="<?php print_r(get_template_directory_uri());?>/img/icons/logo-top-header.svg" alt="" class="logo">
            </a>
                <?php 
                    $cur_user_id = get_current_user_id();
                    if($cur_user_id !=0) {  ?>
                      <a href="/kabinet" class="account">
                            <div class="name"><?= $user_name?></div>
                            <div class="avatar">
                                <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                            </div>
                        </a>
                         <?php
                    } else {
                ?>
                 <div class="account open-signin-popup">
                    <div class="name">Личный кабинет</div>
                    <div class="avatar">
                        <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                    </div>
                </div>
            <?php
                    }
            ?>
            </div>
            <nav class="menu">
                <ul class="menu__list">
                    <div class="first">
                        <li class="item"><a href="/#programm-block">Программа</a></li>
                        <li class="item"><a href="/#speakers-block">Спикеры</a></li>
                        <!--<li class="item"><a href="/#question-block">Вопросы</a></li>-->
                    </div>
                    <div class="second">
                        <li class="item"><a href="/#organizers-block">Организаторы</a></li>
                        <li class="item"><a href="/#broadcast-link-block">Ссылка на конференцию</a></li>
                    </div>
                </ul>
            </nav>

        </div>
        <div class="wrapper header-logo">
            <img src="<?php print_r(get_template_directory_uri());?>/img/logo.svg" alt="Лого " class="logo">
        </div>
        <div class="wrapper header-info">
            <div class="page-title">Конференция</div>
            <div class="page-description">Эффективные практики оказания социальных услуг для выхода семей с детьми с низким уровнем дохода на уровень самообеспечения</div>
            <div class="page-icons">
                <div class="online-icon">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/online-icon.svg" alt="online" class="icon">
                    <div class="text">Онлайн-формат</div>
                </div>
                <div class="date-icons">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/calendar-icons.svg" alt="calendar" class="icon">
                    <div class="text">1-2 декабря 2021 </div>
                </div>
            </div>
            <?php 
                    if($cur_user_id == 0) {  ?>
            <div class="btns-wrapper">
                <div class="registration-btn open-registr-popup purple">Зарегистрироваться</div>
                <a  href="/#broadcast-link-block"  class="registration-btn">Ссылка на трансляцию</a>
            </div>
            
            <?php
                    } else {
                ?>
                 <div class="btns-wrapper">
                    <a href="/kabinet" class="registration-btn purple">Личный кабинет</a>
                    <a href="/#broadcast-link-block" class="registration-btn">Ссылка на трансляцию</a>
                </div>
                <?php
                    }
            ?>

        </div>
        <div class="autorization-block">
            <div class="popup login" id="login">
                <div class="popup-title">
                    Вход в Личный кабинет
                </div>
                <input class="autorization__input" type="text" name="login__login" placeholder="Логин (или email)">
                <div class="password-block">
                    <input class="autorization__input password" type="password" name="login__password" placeholder="Пароль">
                    <label for="login__password">
                        <img src="<?php print_r(get_template_directory_uri());?>/img/icons/show_password.svg" alt="">
                    </label>
                </div>
                <div class="error-description">Неизвестное имя пользователя. Перепроверьте или попробуйте ваш адрес email.</div>
                <div class="popup-btn">
                    Войти
                </div>
                <div class="links two">
                    <div class="link open-registr-popup" id="link_registration">
                        Зарегистрироваться
                    </div>
                    <a href="/wp-login.php?action=lostpassword" target="_blank" class="link" id="link_recovery">
                        Забыли пароль?
                </a>
                </div>
            </div>
            <div class="popup registrattion" id="registrattion">
                <div class="popup-title">
                    Зарегистрируйтесь<br>на конференцию
                </div>
                <input class="autorization__input" type="text" name="registrattion__login" placeholder="Логин*">
                <div class="password-block">
                    <input class="autorization__input" type="password" name="registrattion__password" placeholder="Пароль*">
                    <label for="registrattion__password">
                        <img src="<?php print_r(get_template_directory_uri());?>/img/icons/show_password.svg" alt="">
                    </label>
                </div>
                <input class="autorization__input" type="text" name="registrattion__email" placeholder="Email*">
                <input class="autorization__input" type="text" name="registrattion__surname" placeholder="Фамилия*">
                <input class="autorization__input" type="text" name="registrattion__name" placeholder="Имя*">
                <input class="autorization__input" type="text" name="registrattion__patronymic" placeholder="Отчество*">
                <input class="autorization__input" type="text" name="registrattion__organization" placeholder="Организация">
                <div class="error-description"></div>
                <div class="popup-btn">
                    Зарегистрироваться
                </div>
                <div class="description">Нажимая на кнопку “Зарегистрироваться” я соглашаюсь на обработку персональных данных и политику конфиденциальности</div>
                <div class="links">
                    <div class="link open-signin-popup" id="link_login">
                        Войти в «Личный кабинет»
                    </div>
                </div>
            </div>
            <div class="close-popup">
                <img src="<?php print_r(get_template_directory_uri());?>/img/icons/close.svg" alt="">
            </div>
            <div class="mask"></div>
        </div>
    </header>

    