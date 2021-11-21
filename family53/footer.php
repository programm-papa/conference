<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package family53
 */

?>

<footer class="footer">
        <div class="wrapper">
            <img src="<?php print_r(get_template_directory_uri());?>/img/icons/shild.svg" alt="." class="shild">
            <div class="description">За дополнительной информацией вы можете обращаться в министерство труда и социальной защиты населения Новгородской области</div>
            <div class="contacts">
                <div class="phone">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/phone-icon.svg" alt="" class="icon">
                    <a href="tel:88162983170" class="phone-number">8 (8162) 983-170</a>
                </div>
                <div class="mail">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/mail-icon.svg" alt="" class="icon">
                    <a href="mailto:connect_06@mail.ru" class="mail-link">connect_06@mail.ru</a>
                </div>
            </div>
        </div>

    </footer>
    <div class="developer-block">
        <div class="wrapper">
            <a href="https://artgorka.ru/"><img src="<?php print_r(get_template_directory_uri());?>/img/icons/artGorka.svg" alt=""></a>
        </div>
    </div>

<?php wp_footer(); ?>

</body>
</html>
