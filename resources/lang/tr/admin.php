<?php

$translation = [

    /*
    |--------------------------------------------------------------------------
    | Turkish Language Admin Translations
    |--------------------------------------------------------------------------
    */

    'create' => [
        'fail'                      => 'Oluşturma işlemi gerçekleştirilemedi.',
        'success'                   => 'Oluşturma işlemi başarıyla gerçekleştirildi.'
    ],
    'csrf_error'                    => 'Oturum süreniz dolduğu için isteğiniz işlenemedi, lütfen formu tekrar doldurunuz.',
    'datatables' => [               // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
        'sInfo'                     => '_TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar',
        'sInfoEmpty'                => 'Kayıt Yok',
        'sInfoFiltered'             => '( _MAX_ Kayıt İçerisinden Bulunan )',
        'sInfoPostFix'              => '',
        'sLengthMenu'               => 'Sayfada _MENU_ Kayıt Göster',
        'sProcessing'               => '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>',
        'sSearch'                   => 'Bul:',
        'sUrl'                      => '',
        'sZeroRecords'              => 'Eşleşen Kayıt Bulunmadı',
        'oPaginate' => [
            'sFirst'                => 'İlk',
            'sLast'                 => 'Son',
            'sNext'                 => 'Sonraki',
            'sPrevious'             => 'Önceki'
        ]
    ],
    'delete' => [
        'fail'                      => 'Silme işlemi gerçekleştirilemedi.',
        'self'                      => 'Kendinizi silemezsiniz.',
        'success'                   => 'Silme işlemi başarıyla gerçekleştirildi.'
    ],
    'elfinder'                      => 'Dosya Yoneticisi',
    'empty'                         => 'Kaydedilmiş herhangi bir içerik bulunamadı. Yeni bir içerik eklemeyi deneyebilirsiniz?',
    'fields' => [
        'created_at'                => 'Oluşturulma',
        'deleted_at'                => 'Silinme',
        'no'                        => 'Hayır',
        'published_at'              => 'Yayınlanma Tarihi',
        'reset'                     => 'Reset',
        'save'                      => 'Kaydet',
        'updated_at'                => 'Güncelleme',
        'uploaded'                  => 'Yüklenmiş Dosya',
        'yes'                       => 'Evet'
    ],
    'last_login'                    => 'Son Oturum Başlangıcı',
    'ops' => [
        'confirmation'              => 'Emin misiniz?',
        'create'                    => 'Yeni Ekle',
        'delete'                    => 'Sil',
        'edit'                      => 'Düzenle',
        'modified'                  => 'Son Düzenlenme',
        'name'                      => 'İşlemler',
        'order'                     => 'Sırala',
        'show'                      => 'Göster'
    ],
    'profile'                       => 'Profil',
    'root'                          => 'Dashboard',
    'submit'                        => 'Gönder',
    'title'                         => 'Kontrol Paneli',
    'update' => [
        'fail'                      => 'Düzenleme işlemi gerçekleştirilemedi.',
        'success'                   => 'Düzenleme işlemi başarıyla gerçekleştirildi.'
    ]
];

return createTranslation(require __DIR__ . DIRECTORY_SEPARATOR . 'resources.php', $translation);
