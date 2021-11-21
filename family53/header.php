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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body>
<?php wp_body_open(); ?>
    <header class="header">
        <div class="wrapper top-header desctop">
            <div class="logo"></div>
            <nav class="menu">
                <ul class="menu__list">
                    <li class="item"><a>Программа</a></li>
                    <li class="item"><a>Спикеры</a></li>
                    <li class="item"><a>Вопросы</a></li>
                    <li class="item"><a>Организаторы</a></li>
                    <li class="item"><a>Ссылка на конференцию</a></li>
                </ul>
            </nav>
            <div class="account">
                <div class="name">Личный кабинет</div>
                <div class="avatar">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                </div>
            </div>
        </div>
        <div class="wrapper top-header adaptive">
            <div class="top">
                <div class="logo"></div>
                <div class="account">
                    <div class="name">Личный кабинет</div>
                    <div class="avatar">
                        <img src="<?php print_r(get_template_directory_uri());?>/img/icons/avatar-icon.svg" alt="Фото">
                    </div>
                </div>
            </div>
            <nav class="menu">
                <ul class="menu__list">
                    <div class="first">
                        <li class="item"><a>Программа</a></li>
                        <li class="item"><a>Спикеры</a></li>
                        <li class="item"><a>Вопросы</a></li>
                    </div>
                    <div class="second">
                        <li class="item"><a>Организаторы</a></li>
                        <li class="item"><a>Ссылка на конференцию</a></li>
                    </div>
                </ul>
            </nav>

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
            <div class="registration-btn">Зарегистрироваться</div>
        </div>
        <div class="autorization-block">
            <div class="popup login" id="login">
                <div class="popup-title">
                    Вход в Личный кабинет
                </div>
                <input class="autorization__input" type="text" name="login__login" placeholder="Логин (или email)">
                <input class="autorization__input" type="password" name="login__password" placeholder="Пароль">
                <div class="popup-btn">
                    Войти
                </div>
                <div class="links two">
                    <div class="link" id="link_registration">
                        Зарегистрироваться
                    </div>
                    <div class="link" id="link_recovery">
                        Забыли пароль?
                    </div>
                </div>
            </div>
            <div class="popup registrattion" id="registrattion">
                <div class="popup-title">
                    Зарегистрируйтесь<br>на конференцию
                </div>
                <input class="autorization__input" type="text" name="registrattion__login" placeholder="Логин (или email)*">
                <input class="autorization__input" type="password" name="registrattion__password" placeholder="Пароль*">
                <input class="autorization__input" type="text" name="registrattion__surname" placeholder="Фамилия*">
                <input class="autorization__input" type="text" name="registrattion__name" placeholder="Имя*">
                <input class="autorization__input" type="text" name="registrattion__patronymic" placeholder="Отчество*">
                <input class="autorization__input" type="text" name="registrattion__organization" placeholder="Организация">

                <div class="popup-btn">
                    Зарегистрироваться
                </div>
                <div class="description">Нажимая на кнопку “Зарегистрироваться” я соглашаюсь на обработку персональных данных и политику конфиденциальности</div>
                <div class="links">
                    <div class="link" id="link_login">
                        Войти в «Личный кабинет»
                    </div>
                </div>
            </div>
            <div class="mask"></div>
        </div>
    </header>

    