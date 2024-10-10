<?php

use App\Models\Page;

return [
    'general' => [
        'title' => 'General Settings',
        'setting_page' => true,

        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'light_logo',
                'label' => 'Light Logo',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => 'general/static/logo.png',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'dark_logo',
                'label' => 'Dark Logo',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => 'general/static/logo.png',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'site_favicon',
                'label' => 'Site Favicon',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => 'general/static/favicon.ico',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'login_bg',
                'label' => 'Login Cover',
                'rules' => 'mimes:jpeg,jpg,png,svg|max:2000',
                'value' => 'general/illustrations/signin.svg',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'site_title',
                'label' => 'Site Title',
                'rules' => 'required|min:2|max:50',
                'value' => 'Coevs',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'admin_prefix',
                'label' => 'Admin Prefix',
                'rules' => 'required|min:4|max:10',
                'value' => 'admin',
                'class' => 'col-md-6',
                'message' => 'Prefix for admin panel routes. When you change this, you need to Re login with the new prefix for it to take effect.',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'home_redirect',
                'label' => 'Home Redirect',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-6',
                'message' => 'All Page Slugs',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'site_preloader',
                'label' => 'Site Preloader',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-6',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'site_appearance',
                'label' => 'Site Appearance',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-6',
            ],
            [
                'type' => 'color',
                'data' => 'string',
                'key' => 'primary_color',
                'label' => 'Primary Color',
                'rules' => 'required',
                'value' => '#3c72fc',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'color',
                'data' => 'string',
                'key' => 'secondary_color',
                'label' => 'Secondary Color',
                'rules' => 'required',
                'value' => '#0f0d1d',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'site_animation',
                'label' => 'Site Animation',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'img_error',
                'label' => 'Image Error Hide',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
                'message' => 'Image Not Found Error Message Hide When This Option Enabled',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'scroll_up',
                'label' => 'Scroll Up',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
                'message' => 'Scroll Up(Back to top) Button Show When This Option Enabled',
            ],

        ],
    ],
    'maintenance_mode' => [
        'title' => 'Maintenance Mode Settings',
        'info' => 'Caution: Enabling Maintenance Mode requires remembering the Secret Key to restore the website.',
        'info_icon' => 'fa fa-exclamation-triangle text-warning',
        'setting_page' => true,
        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'maintenance_cover',
                'label' => 'Cover Image',
                'rules' => 'mimes:jpeg,jpg,png,svg|max:2000',
                'value' => '',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'secret_key',
                'label' => 'Secret Key',
                'rules' => 'required',
                'value' => 'secret',
                'class' => 'col-md-12',
                'message' => 'Remember the secret key: domain/secret-key. Utilize it to restore the website live.',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'maintenance_title',
                'label' => 'Title',
                'rules' => 'required',
                'value' => 'Site is not under maintenance',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'textarea',
                'data' => 'string',
                'key' => 'maintenance_text',
                'label' => 'Maintenance Text',
                'rules' => 'required|max:500',
                'value' => 'Sorry for interrupt! Site will live soon.',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'site_environment',
                'label' => 'Site Environment',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-12',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'development_mode',
                'label' => 'Development Mode',
                'rules' => 'boolean',
                'value' => true,
                'class' => 'col-md-6',
                'message' => 'Enable this feature only when debug or script changes are required',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'maintenance_mode',
                'label' => 'Maintenance Mode',
                'rules' => 'boolean',
                'value' => 1,
                'class' => 'col-md-6',
                'message' => 'Only activate it if you want the site to be in maintenance mode.',
            ],
        ],
    ],
    'mail' => [
        'title' => 'SMTP Mail Settings',
        'setting_page' => true,
        'option' => '_smtp_test',
        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'email_from_name',
                'label' => 'Email From Name',
                'rules' => 'required|max:50',
                'value' => 'Coevs',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'email_from_address',
                'label' => 'Email From Address',
                'rules' => 'required|min:5|max:50',
                'value' => 'coevs@gmail.com',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'mail_username',
                'label' => 'Mail Username',
                'rules' => 'required',
                'value' => 'test',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'mail_password',
                'label' => 'Mail Password',
                'rules' => 'required',
                'value' => '0000',
                'class' => 'col-md-6',
            ],

            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'mail_host',
                'label' => 'Mail Host',
                'rules' => 'required',
                'value' => 'mail.coevs.co',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'integer',
                'key' => 'mail_port',
                'label' => 'Mail Port',
                'rules' => 'required',
                'value' => '465',
                'class' => 'col-md-3',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'mail_secure',
                'label' => 'Encryption',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-3',
            ],
        ],
    ],
    'cookie' => [
        'title' => 'Cookie Settings',
        'setting_page' => true,
        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'cookie_title',
                'label' => 'Cookie Title',
                'rules' => 'required',
                'value' => 'Cookies Consent',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'textarea',
                'data' => 'string',
                'key' => 'cookie_summary',
                'label' => 'Cookie Summary',
                'rules' => 'required',
                'value' => 'This website use cookies to help you have a superior and more relevant browsing experience on the website.',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'cookie_page',
                'label' => 'Cookie Page',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-12',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'cookie_status',
                'label' => 'Enable Cookie',
                'rules' => 'boolean',
                'value' => true,
                'class' => 'col-md-6',
            ],
        ],
    ],
    'page' => [
        'title' => 'Page Breadcrumb',
        'setting_page' => true,
        'option' => '_page_mange_link',
        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'breadcrumb_background',
                'label' => 'Breadcrumb Background',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'breadcrumb_shape_one',
                'label' => 'Shape One',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'breadcrumb_shape_two',
                'label' => 'Shape Two',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'breadcrumb_shape_three',
                'label' => 'Shape Three',
                'rules' => 'mimes:jpeg,jpg,png|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],

        ],
    ],
    'seo' => [
        'title' => 'Search Engine Optimization Settings',
        'setting_page' => false,
        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'meta_image',
                'label' => 'Meta Image',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => null,
                'class' => 'col-md-12',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'meta_title',
                'label' => 'Meta Title',
                'rules' => 'max:200',
                'value' => '',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'textarea',
                'data' => 'string',
                'key' => 'meta_description',
                'label' => 'Meta Description',
                'rules' => 'max:1000',
                'value' => '',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'tag',
                'data' => 'string',
                'key' => 'meta_keyword',
                'label' => 'Meta Keyword',
                'rules' => 'max:500',
                'value' => '',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'meta_charset',
                'label' => 'Meta Charset',
                'rules' => 'required|max:200',
                'value' => 'UTF-8"',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'meta_author',
                'label' => 'Meta Author',
                'rules' => 'max:200',
                'value' => '',
                'class' => 'col-md-6',
            ],

        ],
    ],
    'footer' => [
        'title' => 'Footer Manage',
        'setting_page' => false,
        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'footer_slide_left_regular',
                'label' => 'Slide Left Regular',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'footer_slide_left_solid',
                'label' => 'Slide Left Solid',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'footer_right_regular',
                'label' => 'Footer Right regular',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'footer_right_solid',
                'label' => 'Footer Right Solid',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'footer_shadow_shape',
                'label' => 'Shadow Shape',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'terms_condition_link',
                'label' => 'Terms & Condition Link',
                'rules' => 'required|max:500',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'privacy_policy_link',
                'label' => 'Privacy Policy Link',
                'rules' => 'required|max:500',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'footer_visibility',
                'label' => 'Footer Visibility',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
            ],

        ],
    ],
    'header' => [
        'title' => 'Header Manage',
        'setting_page' => false,
        'elements' => [
            [
                'type' => 'select',
                'data' => 'string',
                'key' => 'header_style',
                'label' => 'Header Style',
                'rules' => 'required',
                'value' => [],
                'class' => 'col-md-12',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'get_quote_link',
                'label' => 'Get A Quote Link',
                'rules' => 'required|max:500',
                'value' => '#',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'call_us',
                'label' => 'Call Us Link',
                'rules' => 'required|max:500',
                'value' => '#',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'header_top_bar',
                'label' => 'TopBar Visibility',
                'rules' => 'required',
                'value' => false,
                'class' => 'col-md-6',
                'message' => 'Only For Header Style 2',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'header_visibility',
                'label' => 'Header Visibility',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
            ],
            [
                'type' => 'switch',
                'data' => 'bool',
                'key' => 'language_visibility',
                'label' => 'Language Visibility',
                'rules' => 'required',
                'value' => true,
                'class' => 'col-md-6',
            ],

        ],
    ],
    'error_404' => [
        'title' => '404 Error Page Manage',
        'setting_page' => false,
        'elements' => [
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'error_background',
                'label' => 'Background',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'error_404',
                'label' => 'Error 404 Image',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'error_banner_shape_1',
                'label' => 'Error Banner Shape 1',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'error_banner_shape_2',
                'label' => 'Error Banner Shape 2',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'file',
                'data' => 'string',
                'key' => 'error_banner_shape_3',
                'label' => 'Error Banner Shape 3',
                'rules' => 'mimes:jpeg,jpg,png,ico|max:1000',
                'value' => '',
                'class' => 'col-md-4',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'error_heading',
                'label' => 'Error Heading',
                'rules' => 'required|max:1000',
                'value' => '404 Error',
                'class' => 'col-md-12',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'error_breadcrumb_title',
                'label' => 'Error Breadcrumb Title',
                'rules' => 'required|max:1000',
                'value' => 'Home',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'error_breadcrumb_link',
                'label' => 'Error Breadcrumb Link',
                'rules' => 'required|max:1000',
                'value' => '/',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'error_button_title',
                'label' => 'Error Button Title',
                'rules' => 'required|max:1000',
                'value' => 'Home',
                'class' => 'col-md-6',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'key' => 'error_button_link',
                'label' => 'Error Button Link',
                'rules' => 'required|max:1000',
                'value' => '/',
                'class' => 'col-md-6',
            ],

        ],
    ],

];