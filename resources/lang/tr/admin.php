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
        "settings"                  => "Ayarlar"
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
    // Form Fields
    "fields" => [
        "updated_at"                => "Güncelleme",
        "created_at"                => "Oluşturulma",
        "published_at"              => "Yayınlanma",
        "read"                      => "Okunma",
        "language" => [
            "title"                 => "Adı",
            "code"                  => "Kısa Kodu",
            "site_title"            => "Site Başlığı",
            "site_description"      => "Site Tanımı",
            "flag"                  => "Bayrak"
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
        "save"                      => "Kaydet",
        "reset"                     => "Reset",
        "uploaded"                  => "Yüklenmiş Dosya :"
    ],
    // Titles of the pages, naming is made with each routes' name
    "root"                          => "Dashboard",
    "user" => [
        "index"                     => "Kullanıcılar",
        "edit"                      => "Kullanıcı düzenle",
        "create"                    => "Kullanıcı oluştur",
        "show"                      => "Kullanıcı göster"
    ],
    "article" => [
        "index"                     => "Makaleler",
        "edit"                      => "Makale düzenle",
        "create"                    => "Makale oluştur",
        "show"                      => "Makale göster"
    ],
    "category" => [
        "index"                     => "Kategoriler",
        "edit"                      => "Kategori düzenle",
        "create"                    => "Kategori oluştur",
        "show"                      => "Kategori göster"
    ],
    "language" => [
        "index"                     => "Diller",
        "edit"                      => "Dil düzenle",
        "create"                    => "Dil oluştur",
        "show"                      => "Dil göster"
    ],
    "settings"                      => "Ayarlar",
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