<?php
/**
 * family53 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package family53
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'family53_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function family53_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on family53, use a find and replace
		 * to change 'family53' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'family53', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'family53' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'family53_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'family53_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function family53_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'family53_content_width', 640 );
}
add_action( 'after_setup_theme', 'family53_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function family53_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'family53' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'family53' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'family53_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function family53_scripts() {
	wp_enqueue_style( 'family53-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'family53-style', 'rtl', 'replace' );
	wp_enqueue_style( 'family53-main-style', get_template_directory_uri() . '/css/style.css');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'family53-main-script', get_template_directory_uri() . '/js/app.js', array('jquery'));
	wp_enqueue_script( 'family53-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'family53_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function wpcourses_remove_recentcomments_css() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'wpcourses_remove_recentcomments_css' );

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'programm', [
		'label'  => null,
		'labels' => [
			'name'               => 'Программа', // основное название для типа записи
			'singular_name'      => 'Выступление', // название для одной записи этого типа
			'add_new'            => 'Добавить выступление', // для добавления новой записи
			'add_new_item'       => 'Добавление выступления', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование выступления', // для редактирования типа записи
			'new_item'           => 'Новое выступление', // текст новой записи
			'view_item'          => 'Смотреть выступление', // для просмотра записи этого типа.
			'search_items'       => 'Искать выступление', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Программа', // название меню
		],
		'public'              => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-status',
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'has_archive'         => false,
	] );
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}

//Обработка регистрации и входа в аккаунт
// Добавляем событие в процесс инициализации JS скриптов
add_action( 'wp_enqueue_scripts', 'wplb_ajax_enqueue' );
//Описываем событие
function wplb_ajax_enqueue() {
    // Подключаем файл js скрипта.
    wp_enqueue_script(
        'wplb-ajax', // Имя
        get_template_directory_uri() . '/js/wplb-ajax.js', // Путь до JS файла.
        array('jquery') // В массив jquery.
    );
    // Используем функцию wp_localize_script для передачи переменных в JS скрипт.
    wp_localize_script(
        'wplb-ajax', // Куда будем передавать
        'wplb_ajax_obj', // Название массива, который будет содержать передаваемые данные
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ), // Элемент массива, содержащий путь к admin-ajax.php
            'nonce' => wp_create_nonce('wplb-nonce') // Создаем nonce
        )
    );
}

// Создаём событие обработки Ajax в WordPress теме.
add_action( 'wp_ajax_nopriv_wplb_ajax_request', 'wplb_ajax_request' );
add_action( 'wp_ajax_wplb_ajax_request', 'wplb_ajax_request' );
// Описываем саму функцию.
function wplb_ajax_request() {
    // Перемененная $_REQUEST содержит все данные заполненных форм.
    if ( isset( $_REQUEST ) ) {
        // Проверяем nonce, а в случае если что-то пошло не так, то прерываем выполнение функции.
        if ( !wp_verify_nonce( $_REQUEST[ 'security' ], 'wplb-nonce' ) ) {
            wp_die( 'Базовая защита не пройдена' );
        }
		switch ( $_REQUEST[ 'type' ] ) {
            case 'login':  
				$creds = array(
					'user_login' => $_REQUEST[ 'login' ], // Логин пользователя
					'user_password' => $_REQUEST[ 'password' ], // Пароль пользователя
					'remember' => true // Запоминаем
				);
				// Пробуем авторизовать пользователя.
				$signon = wp_signon( $creds, false );
				if ( is_wp_error( $signon ) ) {
					// Авторизовать не получилось
					$result[ 'status' ] = false;
					$result[ 'content' ] = $signon->get_error_message();
				} else {
					// Авторизация успешна, устанавливаем необходимые куки.
					wp_clear_auth_cookie();
					clean_user_cache( $signon->ID );
					wp_set_current_user( $signon->ID );
					wp_set_auth_cookie( $signon->ID );
					update_user_caches( $signon );
					// Записываем результаты в массив.
					$result[ 'status' ] = true;
				}
				echo json_encode( $result );
				break;


			case 'registration':
				$user = username_exists( $_REQUEST[ 'login' ]);
				if ( !$user && false == email_exists( $_REQUEST['email' ]) ) {
					$result[ 'status' ] = true;
					// Создаём массив с данными для регистрации нового пользователя.
					 $user_data = array(
						'user_login' => $_REQUEST[ 'login' ], // Логин.
						'user_email' => $_REQUEST[ 'email' ], // Email.
						'user_pass' => $_REQUEST[ 'password' ], // Пароль.
						'display_name' => $_REQUEST[ 'login' ], // Отображаемое имя.
						'role' => 'subscriber' // Роль.
					);
					// Добавляем пользователя в базу данных.
					$user = wp_insert_user( $user_data );
					  // Проверка на ошибки.
				  	if ( is_wp_error( $user ) ) {
						// Невозможно создать пользователя, записываем результат в массив.
						$result[ 'status' ] = false;
						$result[ 'content' ] = $user->get_error_message();
					} else {
						// Создаём массив для авторизации.
						$creds = array(
							'user_login' => $_REQUEST[ 'login' ], // Логин пользователя.
							'user_password' => $_REQUEST[ 'password' ], // Пароль пользователя.
							'remember' => true // Запоминаем.
						);
						// Пробуем авторизовать пользователя.
						$signon = wp_signon( $creds, false );
						if ( is_wp_error( $signon ) ) {
							// Авторизовать не получилось.
							$result[ 'status' ] = false;
							$result[ 'content' ] = $signon->get_error_message();
						} else {
							$user_id = wp_update_user( [
								'ID'       => $signon->ID,
								'first_name' => $_REQUEST[ 'name' ],
								'last_name'  => $_REQUEST[ 'surname' ],
							] );
							update_user_meta($signon->ID,'patronymic',$_REQUEST[ 'patronymic' ]);
							update_user_meta($signon->ID,'organization',$_REQUEST[ 'organization' ]);
							// Авторизация успешна, устанавливаем необходимые куки.
							wp_clear_auth_cookie();
							clean_user_cache( $signon->ID );
							wp_set_current_user( $signon->ID );
							wp_set_auth_cookie( $signon->ID );
							update_user_caches( $signon );
							// Записываем результаты в массив.
							$result[ 'status' ] = true;
						}
					}
				} else {
						// Такой пользователь уже существует, регистрация не возможна, записываем данные в массив.
						$result[ 'status' ] = false;
						$result[ 'content' ] = esc_html__( 'Пользователь уже существует', 'wplb_ajax_lesson' );
					}

				echo json_encode( $result );
				break;
			case 'overwriting':
				$result[ 'status' ] = false;
				if($_REQUEST[ 'super' ] == 'true') {
					$creds = array(
						'user_id' => $_REQUEST[ 'id' ], // ID пользователя
						'user_surname' => $_REQUEST[ 'surname' ], // Фамилия пользователя
						'user_name' => $_REQUEST[ 'name' ], // Имя пользователя
						'user_patronymic' => $_REQUEST[ 'patronymic' ], // Отчество пользователя
						'user_email' => $_REQUEST[ 'email' ], // Почта пользователя
						'user_phone' => $_REQUEST[ 'phone' ], // Телефон пользователя
						'user_region' => $_REQUEST[ 'region' ], // Регион пользователя
						'user_organization' => $_REQUEST[ 'organization' ], // Организация пользователя
						'user_topic' => $_REQUEST[ 'speechTopic' ], // Название темы выступления пользователя
						'user_theme_description' => $_REQUEST[ 'speechDescription' ], // Описание выступления пользователя
					);
					//Перезапись имени пользователя
					if($creds['user_topic'] != 'false') {
						$result[ 'status' ] = update_user_meta($creds[user_id], 'user_topic', $creds[user_topic]);
					}
					////Перезапись отчества пользователя
					if($creds['user_theme_description'] != 'false') {
						$result[ 'status' ] = update_user_meta($creds[user_id], 'user_theme_description', $creds[user_theme_description]);
					}
				}
				else {
					$creds = array(
						'user_id' => $_REQUEST[ 'id' ], // ID пользователя
						'user_surname' => $_REQUEST[ 'surname' ], // Фамилия пользователя
						'user_name' => $_REQUEST[ 'name' ], // Имя пользователя
						'user_patronymic' => $_REQUEST[ 'patronymic' ], // Отчество пользователя
						'user_email' => $_REQUEST[ 'email' ], // Почта пользователя
						'user_phone' => $_REQUEST[ 'phone' ], // Телефон пользователя
						'user_region' => $_REQUEST[ 'region' ], // Регион пользователя
						'user_organization' => $_REQUEST[ 'organization' ], // Организация пользователя
					);
				}
				//Перезапись фамилии пользователя
				if($creds['user_surname'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'last_name', $creds[user_surname]);
				}
				//Перезапись имени пользователя
				if($creds['user_name'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'first_name', $creds[user_name]);
				}
				////Перезапись отчества пользователя
				if($creds['user_patronymic'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'user_patronymic', $creds['user_patronymic']);
				}
				//Перезапись почты пользователя
				if($creds['user_email'] != 'false') {
					$updateuser = wp_update_user( [
						'ID'       => $creds[user_id],
						'user_email' => $creds[user_email]
					] );
					if ( is_wp_error( $updateuser ) ) {
						$result[ 'status' ] = 'false';
						$result[ 'content' ] = $updateuser->get_error_message();
					}
				}
				//Перезапись телефона пользователя
				if($creds['user_phone'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'user_phone', $creds[user_phone]);
				}
				//Перезапись Региона пользователя
				if($creds['user_region'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'user_region', $creds[user_region]);
				}
				//Перезапись организации пользователя
				if($creds['user_organization'] != 'false') {
					$result[ 'status' ] = update_user_meta($creds[user_id], 'user_organization', $creds[user_organization]);
				}
				echo json_encode( $result );
				break;
		}
		 // Конвертируем массив с результатами обработки и передаем его обратно как строку в JSON формате.
		 
    }
    // Заканчиваем работу Ajax.
    wp_die();
}