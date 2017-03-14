<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Turkish Application App Specific Resources
    |--------------------------------------------------------------------------
    */

    'article' => [
        'all'    => 'Makaleler',
        'create' => 'Makale oluştur',
        'edit'   => 'Makale düzenle',
        'fields' => [
            'category_id' => 'Kategori',
            'content'     => 'İçerik',
            'description' => 'Tanımı',
            'title'       => 'Makale Başlığı'
        ],
        'index'  => 'Makaleler',
        'show'   => 'Makale Göster'
    ],
    'category' => [
        'all'    => 'Tüm Kategoriler',
        'create' => 'Kategori oluştur',
        'edit'   => 'Kategori düzenle',
        'fields' => [
            'article_count' => 'Makale Sayısı',
            'color'         => 'Rengi',
            'description'   => 'Tanımı',
            'language_id'   => 'Dili',
            'title'         => 'Kategori Başlığı'
        ],
        'index'  => 'Kategoriler',
        'show'   => 'Kategori göster'
    ],
    'dashboard' => [
        'fields' => [
            'average_time'    => 'Ortalama Ziyaret Süresi',
            'bounce_rate'     => 'Hemen Çıkma Oranı',
            'browsers'        => 'Tarayıcılar',
            'chart_country'   => 'Ülke',
            'chart_region'    => 'Bölge',
            'chart_visitors'  => 'Ziyaretci',
            'entrance_pages'  => 'Giriş',
            'exit_pages'      => 'Çıkış',
            'invalid_setup'   => 'Dashboard\'a ulaşabilmek için lütfen .env dosyanızı düzenleyin (ANALYTICS_CONFIGURED).',
            'keywords'        => 'Kelimeler',
            'os'              => 'OS',
            'page_visits'     => 'Ortalama Gezilen Sayfa',
            'pages'           => 'Sayfalar',
            'region_visitors' => 'Ziyaretçi Dağılımı: Bölge',
            'time_pages'      => 'Süre',
            'total_visits'    => 'Toplam Ziyaretçi Sayısı',
            'traffic_sources' => 'Kaynaklar',
            'unique_visits'   => 'Günlük Tekil Ziyaretçi Sayısı',
            'visitors'        => 'Ziyaretçiler',
            'visits'          => 'Ziyaretler',
            'world_visitors'  => 'Ziyaretçi Dağılımı: Dünya'
        ],
        'index' => 'Dashboard'
    ],
    'language' => [
        'all'    => 'Tüm Diller',
        'create' => 'Dil oluştur',
        'edit'   => 'Dil düzenle',
        'fields' => [
            'code'             => 'Kısa Kodu',
            'flag'             => 'Bayrak',
            'site_description' => 'Site Tanımı',
            'site_title'       => 'Site Başlığı',
            'title'            => 'Adı'
        ],
        'index'  => 'Diller',
        'show'   => 'Dil göster'
    ],
    'page' => [
        'all'    => 'Tüm Sayfalar',
        'create' => 'Sayfa oluştur',
        'edit'   => 'Sayfa düzenle',
        'fields' => [
            'content'     => 'İçerik',
            'description' => 'Tanımı',
            'language_id' => 'Dil',
            'title'       => 'Başlık'
        ],
        'index'  => 'Sayfalar',
        'show'   => 'Sayfa göster'
    ],
    'setting' => [
        'fields' => [
            'analytics_id'     => 'Analytics ID ( Format: UA-XXXXXXXXX-YYYY )',
            'disqus_shortname' => 'Disqus Kullanıcı Adı',
            'email'            => 'Email',
            'facebook'         => 'Facebook',
            'logo'             => 'Logo',
            'twitter'          => 'Twitter'
        ],
        'index'  => 'Ayarlar',
    ],
    'user' => [
        'all'    => 'Tüm Kullanıcılar',
        'create' => 'Kullanıcı oluştur',
        'edit'   => 'Kullanıcı düzenle',
        'fields' => [
            'email'                 => 'Email',
            'ip_address'            => 'IP',
            'logged_in_at'          => 'Son Giriş',
            'logged_out_at'         => 'Son Çıkış',
            'name'                  => 'Ad',
            'password'              => 'Şifre',
            'password_confirmation' => 'Şifre Tekrarı',
            'picture'               => 'Fotoğraf'
        ],
        'index'  => 'Kullanıcılar',
        'show'   => 'Kullanıcı göster'
    ]
];
