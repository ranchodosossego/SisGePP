<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'RDS - Painel',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo 'logo_img' => '/public/assets/img/logopainel.png',
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Rancho</b> do Sossego',
    'logo_img' => 'assets/img/logopainel.png',
    'logo_img_class' => 'brand-image img-circle elevation-3 invisible',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Rancho do Sossego',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-light',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-light',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'text-sm',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-light',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light ',
    'classes_topnav_nav' => 'navbar-expand ',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => null, /*'lg', */
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => null,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'header'   => '',
            'classes'  => 'w-auto m-1 p-0 border-top border-secondary',
        ],
        [
            'text'        => 'Web Site',
            'url'         => '/',
            'icon'        => 'fab fa-cloudsmith p-1',
        ],

        //-- Rebanho
        [
            'text'    => 'Rebanho',
            'icon'    => 'fab fa-mendeley p-1',
            'submenu' => [
                [
                    'text' => 'Quadro Geral',
                    'shift'   => 'ml-2',
                    'url'  => 'rebanho',
                    'icon'    => 'fab fa-cloudscale p-1',
                ],
                [
                    'text' => 'Novos Animais',
                    'shift'   => 'ml-2',
                    'url'  => 'animal',
                    'icon'    => 'fas fa-paw p-1',
                ],
                [
                    'text'    => 'Formação de Lote',
                    'shift'   => 'ml-2',
                    'url'     => 'lote',
                    'icon'    => 'fas fa-grip-horizontal p-1',
                ],
            ],
        ],

        //-- Dieta
        [
            'text'    => 'Alimentação',
            'icon'    => 'fas fa-utensils p-1',
            'submenu' => [
                [
                    'text' => 'Dieta',
                    'shift'   => 'ml-3',
                    'url'  => 'dieta',
                    'icon'    => 'fab fa-nutritionix p-1',
                ],
                [
                    'text' => 'Receitas',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-mitten p-1',
                ],
            ],
        ],

        //-- Plantio
        [
            'text'    => 'Pantio',
            'icon'    => 'fab fa-audible p-1',
            'submenu' => [
                [
                    'text' => 'Cultura',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-seedling p-1',
                ],
                [
                    'text' => 'Área',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'far fa-map p-1',
                ],
                [
                    'text'    => 'Agenda',
                    'shift'   => 'ml-3',
                    'url'     => '#',
                    'icon'    => 'far fa-calendar-alt p-1',
                ],
            ],
        ],

        //-- Estoque
        [
            'text'    => 'Estoque',
            'icon'    => 'fas fa-warehouse p-1',
            'submenu' => [
                [
                    'text' => 'Ração',
                    'shift'   => 'ml-3',
                    'url'  => 'racao',
                    'icon'    => 'fas fa-utensils p-1',
                ],
                [
                    'text' => 'Insumos',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-spray-can p-1',
                ],
            ],
        ],

        //-- Produção <i class="fab fa-affiliatetheme"></i>
        [
            'text'    => 'Produção',
            'icon'    => 'fas fa-industry p-1',
            'submenu' => [
                [
                    'text' => 'Leite',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-fill-drip p-1',
                ],
                [
                    'text' => 'Corte',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fab fa-affiliatetheme p-1',
                ],
                [
                    'text' => 'Bezerro',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fab fa-behance p-1',
                ],

            ],
        ],

        //-- Sanidade
        [
            'text'    => 'Sanidade',
            'icon'    => 'fas fa-hand-holding-medical p-1',
            'submenu' => [
                [
                    'text' => 'Prontuário',
                    'shift'   => 'ml-3',
                    'url'  => 'prontuario',
                    'icon'    => 'fas fa-notes-medical p-1',
                ],
                [
                    'text' => 'Reprodução',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-microscope p-1',
                ],
                [
                    'text'    => 'Vacina',
                    'shift'   => 'ml-3',
                    'url'     => '#',
                    'icon'    => 'fas fa-syringe p-1',
                ],
                [
                    'text'    => 'Farmácia',
                    'shift'   => 'ml-3',
                    'url'     => '#',
                    'icon'    => 'fas fa-pills p-1',
                ],
            ],
        ],

        //--> Equipe
        [
            'text'    => 'Equipe',
            'icon'    => 'fas fa-users p-1',
            'submenu' => [
                [
                    'text' => 'Funcionário',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-user-cog p-1',
                ],
                [
                    'text' => 'Veterinário',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-user-md p-1',
                ],
                [
                    'text' => 'Fornecedor',
                    'shift'   => 'ml-3',
                    'url'  => '#',
                    'icon'    => 'fas fa-truck p-1',
                ],

            ],
        ],

        // Autenticação
        [
            'header'   => '',
            'classes'  => 'w-auto m-1 p-0 border-top border-secondary',
        ],
        [
            'text'        => 'register',
            'url'         => 'guesthome',
            'icon'        => 'fab fa-cloudsmith p-1',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],



    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuratbuttonsion
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => 'rebanho',
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
