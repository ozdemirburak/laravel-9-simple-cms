<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Turkish Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'   => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after'      => ':attribute şundan daha eski bir tarih olmalıdır :date.',
    'alpha'      => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num'  => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array'      => ':attribute dizi olmalıdır.',
    'before'     => ':attribute şundan daha önceki bir tarih olmalıdır :date.',
    'between'    => [
        'array'   => ':attribute :min - :max arasında nesneye sahip olmalıdır.',
        'file'    => ':attribute :min - :max arasındaki kilobayt değeri olmalıdır.',
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'string'  => ':attribute :min - :max arasında karakterden oluşmalıdır.'
    ],
    'boolean'        => ':attribute alanı sadece doğru veya yanlış olabilir.',
    'confirmed'      => ':attribute tekrarı eşleşmiyor.',
    'date'           => ':attribute geçerli bir tarih olmalıdır.',
    'date_format'    => ':attribute :format biçimi ile eşleşmiyor.',
    'different'      => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits'         => ':attribute :digits rakam olmalıdır.',
    'digits_between' => ':attribute :min ile :max arasında rakam olmalıdır.',
    'email'          => ':attribute doğru bir e-posta olmalıdır.',
    'filled'         => 'Seçili :attribute alanı doldurulmak zorundadır.',
    'exists'         => 'Seçili :attribute geçersiz.',
    'image'          => ':attribute alanı resim dosyası olmalıdır.',
    'in'             => ':attribute değeri geçersiz.',
    'integer'        => ':attribute rakam olmalıdır.',
    'ip'             => ':attribute geçerli bir IP adresi olmalıdır.',
    'max'            => [
        'array'   => ':attribute değeri :max adedinden az nesneye sahip olmalıdır.',
        'file'    => ':attribute değeri :max kilobayt değerinden küçük olmalıdır.',
        'numeric' => ':attribute değeri :max değerinden küçük olmalıdır.',
        'string'  => ':attribute değeri :max karakter değerinden küçük olmalıdır.'
    ],
    'mimes' => ':attribute dosya biçimi :values olmalıdır.',
    'min'   => [
        'array'   => ':attribute en az :min nesneye sahip olmalıdır.',
        'file'    => ':attribute değeri :min kilobayt değerinden büyük olmalıdır.',
        'numeric' => ':attribute değeri :min değerinden büyük olmalıdır.',
        'string'  => ':attribute değeri :min karakter değerinden büyük olmalıdır.'
    ],
    'not_in'               => 'Seçili :attribute geçersiz.',
    'numeric'              => ':attribute rakam olmalıdır.',
    'regex'                => ':attribute biçimi geçersiz.',
    'required'             => ':attribute alanı gereklidir.',
    'required_if'          => ':attribute alanı, :other :value değerine sahip olduğunda zorunludur.',
    'required_with'        => ':attribute alanı :values varken zorunludur.',
    'required_with_all'    => ':attribute alanı :values varken zorunludur.',
    'required_without'     => ':attribute alanı :values yokken zorunludur.',
    'required_without_all' => ':attribute alanı :values yokken zorunludur.',
    'same'                 => ':attribute ile :other eşleşmelidir.',
    'size'                 => [
        'array'   => ':attribute :size nesneye sahip olmalıdır.',
        'file'    => ':attribute :size kilobayt olmalıdır.',
        'numeric' => ':attribute :size olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.'
    ],
    'string'   => ':attribute karakterlerden oluşmalıdır.',
    'timezone' => ':attribute geçerli bir zaman bölgesi olmalıdır.',
    'unique'   => ':attribute daha önceden kayıt edilmiş.',
    'url'      => ':attribute biçimi geçersiz.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention 'attribute.rule' to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of 'email'. This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'category_id'       => trans('admin.fields.article.category_id'),
        'code'              => trans('admin.fields.language.code'),
        'color'             => trans('admin.fields.category.color'),
        'content'           => trans('admin.fields.article.content'),
        'description'       => trans('admin.fields.article.description'),
        'email'             => trans('admin.fields.user.email'),
        'facebook'          => trans('admin.fields.setting.facebook'),
        'flag'              => trans('admin.fields.language.flag'),
        'language_id'       => trans('admin.fields.category.language_id'),
        'logo'              => trans('admin.fields.setting.logo'),
        'name'              => trans('admin.fields.user.name'),
        'password'          => trans('admin.fields.user.password'),
        'picture'           => trans('admin.fields.user.picture'),
        'published_at'      => trans('admin.fields.article.published_at'),
        'site_description'  => trans('admin.fields.language.site_description'),
        'site_title'        => trans('admin.fields.language.site_title'),
        'title'             => trans('admin.fields.article.title'),
        'twitter'           => trans('admin.fields.setting.twitter')
    ]

];
