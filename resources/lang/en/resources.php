<?php

return [

    /*
    |--------------------------------------------------------------------------
    | English Application App Specific Resources
    |--------------------------------------------------------------------------
    */

    'article' => [
        'all'    => 'All Articles',
        'create' => 'Create article',
        'edit'   => 'Edit article',
        'fields' => [
            'category_id' => 'Category',
            'content'     => 'Content',
            'description' => 'Description',
            'title'       => 'Article Title'
        ],
        'index'  => 'Articles',
        'show'   => 'Show article'
    ],
    'category' => [
        'all'    => 'All Categories',
        'create' => 'Create category',
        'edit'   => 'Edit category',
        'fields' => [
            'articles'    => 'Article Count',
            'color'       => 'Color',
            'description' => 'Description',
            'language_id' => 'Language',
            'title'       => 'Category Title'
        ],
        'index'  => 'Categories',
        'show'   => 'Show category'
    ],
    'dashboard' => [
        'fields' => [
            'average_time'    => 'Average time',
            'bounce_rate'     => 'Bounce rate',
            'browsers'        => 'Browser',
            'chart_country'   => 'Country',
            'chart_region'    => 'Region',
            'chart_visitors'  => 'Visitor',
            'entrance_pages'  => 'Entrance',
            'exit_pages'      => 'Exit',
            'invalid_setup'   => 'Please configure your Google Analytics setup defined in your .env file to see the dashboard (ANALYTICS_CONFIGURED).',
            'keywords'        => 'Keywords',
            'os'              => 'OS',
            'page_visits'     => 'Average page visits',
            'pages'           => 'Pages',
            'region_visitors' => 'Visitor distribution: Regions',
            'time_pages'      => 'Time',
            'total_visits'    => 'Total visits',
            'traffic_sources' => 'Source',
            'unique_visits'   => 'Unique visits',
            'visitors'        => 'Visitors',
            'visits'          => 'Visits',
            'world_visitors'  => 'Visitor distribution: World'
        ],
        'index' => 'Dashboard'
    ],
    'language' => [
        'all'    => 'All Languages',
        'create' => 'Create language',
        'edit'   => 'Edit language',
        'fields' => [
            'code'             => 'Code',
            'flag'             => 'Flag',
            'site_description' => 'Site Description',
            'site_title'       => 'Site Title',
            'title'            => 'Title'
        ],
        'index'  => 'Languages',
        'show'   => 'Show language'
    ],
    'page' => [
        'all'    => 'All Pages',
        'create' => 'Create page',
        'edit'   => 'Edit page',
        'fields' => [
            'content'     => 'Content',
            'description' => 'Description',
            'language_id' => 'Language',
            'title'       => 'Title',
        ],
        'index'  => 'Pages',
        'show'   => 'Show page'
    ],
    'setting' => [
        'fields' => [
            'analytics_id'     => 'Analytics ID ( Format: UA-XXXXXXXXX-YYYY )',
            'disqus_shortname' => 'Disqus Shortname',
            'email'            => 'Email',
            'facebook'         => 'Facebook',
            'logo'             => 'Logo',
            'twitter'          => 'Twitter'
        ],
        'index'  => 'Settings',
    ],
    'user' => [
        'all'    => 'All Users',
        'create' => 'Create user',
        'edit'   => 'Edit user',
        'fields' => [
            'email'                 => 'Email',
            'ip_address'            => 'IP',
            'logged_in_at'          => 'Login At',
            'logged_out_at'         => 'Logout At',
            'name'                  => 'Name',
            'password'              => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'picture'               => 'Avatar'
        ],
        'index'  => 'Users',
        'show'   => 'Show user'
    ]
];
