<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Language lines for admin panel
    |--------------------------------------------------------------------------
    */

    "title"                         => "Kontrol Paneli",
    "submit"                        => "Gönder",
    "last_login"                    => "Son Oturum Başlangıcı",
    "profile"                       => "Profil",
    "elfinder"                      => "Dosya Yoneticisi",
    "empty"                         => "Kaydedilmiş herhangi bir içerik bulunamadı. Yeni bir içerik eklemeyi deneyebilirsiniz?",
    // Menu
    "menu" => [
        "dashboard"                 => "Dashboard",
        "article" => [
            "root"                  => "Makaleler",
            "all"                   => "Tüm Makaleler",
            "add"                   => "Makale Ekle"
        ],
        "category" => [
            "root"                  => "Kategoriler",
            "all"                   => "Tüm Kategoriler",
            "add"                   => "Kategori Ekle"
        ],
        "language" => [
            "root"                  => "Diller",
            "all"                   => "Tüm Diller",
            "add"                   => "Dil Ekle"
        ],
        "page" => [
            "root"                  => "Sayfalar",
            "all"                   => "Tüm Sayfalar",
            "add"                   => "Sayfa Ekle"
        ],
        "user" => [
            "root"                  => "Kullanıcılar",
            "all"                   => "Tüm Kullanıcılar",
            "add"                   => "Kullanıcı Ekle"
        ],
        "setting"                   => "Ayarlar"
    ],
    // Operations
    "ops" => [
        "name"                      => "İşlemler",
        "edit"                      => "Düzenle",
        "create"                    => "Yeni Ekle",
        "delete"                    => "Sil",
        "show"                      => "Göster",
        "order"                     => "Sırala",
        "confirmation"              => "Emin misiniz?",
        "modified"                  => "Son Düzenlenme"
    ],
    // Fields
    "fields" => [
        "updated_at"                => "Güncelleme",
        "created_at"                => "Oluşturulma",
        "published_at"              => "Yayınlanma",
        "read"                      => "Okunma",
        "dashboard" => [
            'total_visits'          => "Toplam Ziyaretçi Sayısı",
            'unique_visits'         => "Günlük Tekil Ziyaretçi Sayısı",
            'bounce_rate'           => "Hemen Çıkma Oranı",
            'average_time'          => "Ortalama Ziyaret Süresi",
            'page_visits'           => "Ortalama Gezilen Sayfa",
            'pages'                 => "Sayfalar",
            'os'                    => "OS",
            'keywords'              => "Kelimeler",
            'entrance_pages'        => "Giriş",
            'exit_pages'            => "Çıkış",
            'time_pages'            => "Süre",
            'browsers'              => "Tarayıcılar",
            'traffic_sources'       => "Kaynaklar",
            'visits'                => "Ziyaretler",
            'visitors'              => "Ziyaretçiler",
            'world_visitors'        => "Ziyaretçi Dağılımı: Dünya",
            'region_visitors'       => "Ziyaretçi Dağılımı: Bölge",
            'chart_visitors'        => "Ziyaretci",
            'chart_region'          => "Bölge",
            'chart_country'         => "Ülke",
        ],
        "language" => [
            "title"                 => "Adı",
            "code"                  => "Kısa Kodu",
            "site_title"            => "Site Başlığı",
            "site_description"      => "Site Tanımı",
            "flag"                  => "Bayrak"
        ],
        "page" => [
            "title"                 => "Başlık",
            "description"           => "Tanımı",
            "language_id"           => "Dil",
            "content"               => "İçeriği",
        ],
        "category" => [
            "title"                 => "Başlık",
            "description"           => "Tanımı",
            "color"                 => "Rengi",
            "language_id"           => "Dili"
        ],
        "article" => [
            "title"                 => "Başlık",
            "description"           => "Tanımı",
            "category_id"           => "Kategori",
            "content"               => "İçeriği",
        ],
        "user" => [
            "name"                  => "Ad",
            "email"                 => "Email",
            "password"              => "Şifre",
            "password_confirmation" => "Şifre Tekrarı",
            "picture"               => "Fotoğraf",
            "logged_in_at"          => "Son Giriş",
            "logged_out_at"         => "Son Çıkış",
            "ip_address"            => "IP"
        ],
        "setting" => [
            "email"                 => "Email",
            "facebook"              => "Facebook",
            "twitter"               => "Twitter",
            "logo"                  => "Logo",
            "status" => [
                "title"             => "Bakım Modu",
                "down"              => "Aktif",
                "up"                => "Aktif Değil"
            ]
        ],
        "save"                      => "Kaydet",
        "reset"                     => "Reset",
        "uploaded"                  => "Yüklenmiş Dosya :"
    ],
    // Titles of the pages, naming is made with each routes' name
    "root"                          => "Dashboard",
    "language" => [
        "index"                     => "Diller",
        "edit"                      => "Dil düzenle",
        "create"                    => "Dil oluştur",
        "show"                      => "Dil göster"
    ],
    "page" => [
        "index"                     => "Sayfalar",
        "edit"                      => "Sayfa düzenle",
        "create"                    => "Sayfa oluştur",
        "show"                      => "Sayfa göster"
    ],
    "category" => [
        "index"                     => "Kategoriler",
        "edit"                      => "Kategori düzenle",
        "create"                    => "Kategori oluştur",
        "show"                      => "Kategori göster"
    ],
    "article" => [
        "index"                     => "Makaleler",
        "edit"                      => "Makale düzenle",
        "create"                    => "Makale oluştur",
        "show"                      => "Makale göster"
    ],
    "user" => [
        "index"                     => "Kullanıcılar",
        "edit"                      => "Kullanıcı düzenle",
        "create"                    => "Kullanıcı oluştur",
        "show"                      => "Kullanıcı göster"
    ],
    "setting" => [
        "index"                     => "Ayarlar"
    ],
    // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
    "datatables" => [
        "sProcessing"               => "İşleniyor...",
        "sLengthMenu"               => "Sayfada _MENU_ Kayıt Göster",
        "sZeroRecords"              => "Eşleşen Kayıt Bulunmadı",
        "sInfo"                     => "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
        "sInfoEmpty"                => "Kayıt Yok",
        "sInfoFiltered"             => "( _MAX_ Kayıt İçerisinden Bulunan)",
        "sInfoPostFix"              => "",
        "sSearch"                   => "Bul:",
        "sUrl"                      => "",
        "oPaginate" => [
            "sFirst"                => "İlk",
            "sPrevious"             => "Önceki",
            "sNext"                 => "Sonraki",
            "sLast"                 => "Son",
        ]
    ],
    // Flash messages upon create, update and delete
    "create" => [
        "success"                   => "Oluşturma işlemi başarıyla gerçekleştirildi.",
        "fail"                      => "Oluşturma işlemi gerçekleştirilemedi."
    ],
    "update" => [
        "success"                   => "Düzenleme işlemi başarıyla gerçekleştirildi.",
        "fail"                      => "Düzenleme işlemi gerçekleştirilemedi."
    ],
    "delete" => [
        "success"                   => "Silme işlemi başarıyla gerçekleştirildi.",
        "fail"                      => "Silme işlemi gerçekleştirilemedi.",
        "self"                      => "Kendinizi silemezsiniz."
    ]
];