<?php

return [

    /*
    |--------------------------------------------------------------------------
    | English Application App Specific Resources
    |--------------------------------------------------------------------------
    */

    'article' => [
        'create' => 'Create article',
        'edit'   => 'Edit article',
        'fields' => [
            'category_id'  => 'Category',
            'content'      => 'Content',
            'description'  => 'Description',
            'published_at' => 'Published At',
            'title'        => 'Article Title'
        ],
        'index'  => 'Articles',
        'show'   => 'Show article'
    ],
    'category' => [
        'create' => 'Create category',
        'edit'   => 'Edit category',
        'fields' => [
            'article_count' => 'Article Count',
            'description'   => 'Description',
            'title'         => 'Category Title'
        ],
        'index'  => 'Categories',
        'show'   => 'Show category'
    ],
    'dashboard' => [
        'fields' => [
            'alexa_local'     => 'Alexa Local',
            'alexa_world'     => 'Alexa World',
            'average_time'    => 'Average Time',
            'bounce_rate'     => 'Bounce Rate',
            'browsers'        => 'Browsers',
            'chart_country'   => 'Country',
            'chart_region'    => 'Region',
            'chart_visitors'  => 'Visitors',
            'entrance_pages'  => 'Entrance',
            'exit_pages'      => 'Exit',
            'keywords'        => 'Keywords',
            'os'              => 'OS',
            'page_visits'     => 'Page Visits',
            'pages'           => 'Pages',
            'region_visitors' => 'Region Visitors',
            'time_pages'      => 'Time',
            'total_visits'    => 'Total Visits',
            'traffic_sources' => 'Traffic Sources',
            'unique_visits'   => 'Unique Visits',
            'visitors'        => 'Visitors',
            'visits'          => 'Visits',
            'visits_today'    => 'Visits Today',
            'world_visitors'  => 'World Visitor Distribution'
        ],
        'index' => 'Dashboard'
    ],
    'elfinder' => [
        'index' => 'File Manager',
    ],
    'page' => [
        'create' => 'Create page',
        'edit'   => 'Edit page',
        'fields' => [
            'content'      => 'Content',
            'description'  => 'Description',
            'parent_id'    => 'Parent',
            'title'        => 'Title',
        ],
        'index'  => 'Pages',
        'show'   => 'Show page'
    ],
    'parent' => [
        'fields' => [
            'title' => 'Parent Page',
        ]
    ],
    'user' => [
        'create' => 'Create user',
        'edit'   => 'Edit user',
        'fields' => [
            'email'                 => 'Email',
            'ip_address'            => 'IP',
            'logged_in_at'          => 'Login At',
            'logged_out_at'         => 'Logout At',
            'password'              => 'Password',
            'password_confirmation' => 'Password Confirm'
        ],
        'index'  => 'Users',
        'show'   => 'Show user'
    ]
];
