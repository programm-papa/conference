<?php
/*
Template Name: Страницы трансляции
*/
?>

<?php
get_header();
?>

<main class="links-page">
        <div class="wrapper">
            <div class="page-title">Трансляции</div>
            <div class="translation-links">
                <a class="day" id="first_day">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/1day.svg" alt="">
                    <!-- <iframe src="https://www.youtube.com/embed/WrlQw48royo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                </a>
                <a class="day" id="second_day">
                    <img src="<?php print_r(get_template_directory_uri());?>/img/icons/2day.svg" alt="">
                </a>
            </div>
        </div>
        
    </main>

<?php
get_footer();