<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Bidang :attribute harus diterima.',
    'active_url'           => 'Bidang :attribute bukan URL yang valid.',
    'after'                => 'Bidang :attribute harus tanggal setelah :date.',
    'after_or_equal'       => 'Bidang :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha'                => 'Bidang :attribute hanya dapat berisi huruf.',
    'alpha_dash'           => 'Bidang :attribute hanya dapat berisi huruf, angka, dan tanda hubung.',
    'alpha_num'            => 'Bidang :attribute hanya dapat berisi huruf dan angka.',
    'array'                => 'Bidang :attribute harus array.',
    'before'               => 'Bidang :attribute harus tanggal sebelum :date.',
    'before_or_equal'      => 'Bidang :attribute harus tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => 'Bidang :attribute harus antara :min dan :max.',
        'file'    => 'Bidang :attribute harus antara :min dan :max kilobyte.',
        'string'  => 'Bidang :attribute harus antara :min dan :max karakter.',
        'array'   => 'Bidang :attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean'              => 'Bidang :attribute harus benar atau salah.',
    'confirmed'            => 'Bidang :attribute konfirmasi tidak cocok.',
    'date'                 => 'Bidang :attribute bukan tanggal yang valid.',
    'date_format'          => 'Bidang :attribute tidak sesuai format :format.',
    'different'            => 'Bidang :attribute dan :other harus berbeda.',
    'digits'               => 'Bidang :attribute harus :digits digit.',
    'digits_between'       => 'Bidang :attribute harus antara :min dan :max digit.',
    'dimensions'           => 'Bidang :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct'             => 'Bidang :attribute memiliki duplikat nilai.',
    'email'                => 'Bidang :attribute Harus alamat e-mail yang valid.',
    'exists'               => 'Yang dipilih :attribute tidak valid.',
    'file'                 => 'Bidang :attribute harus file.',
    'filled'               => 'Bidang :attribute diperlukan.',
    'image'                => 'Bidang :attribute harus gambar.',
    'in'                   => 'Yang dipilih :attribute tidak valid.',
    'in_array'             => 'Bidang :attribute tidak ada di :other.',
    'integer'              => 'Bidang :attribute harus integer.',
    'ip'                   => 'Bidang :attribute harus alamat IP yang valid.',
    'json'                 => 'Bidang :attribute harus JSON string yang valid.',
    'max'                  => [
        'numeric' => 'Bidang :attribute mungkin tidak lebih besar dari :max.',
        'file'    => 'Bidang :attribute mungkin tidak lebih besar dari :max kilobyte.',
        'string'  => 'Bidang :attribute mungkin tidak lebih besar dari :max karekter.',
        'array'   => 'Bidang :attribute mungkin tidak memiliki lebih dari :max item.',
    ],
    'mimes'                => 'Bidang :attribute harus menjadi file type: :values.',
    'mimetypes'            => 'Bidang :attribute harus menjadi file type: :values.',
    'min'                  => [
        'numeric' => 'Bidang :attribute harus minimal :min.',
        'file'    => 'Bidang :attribute harus minimal :min kilobyte.',
        'string'  => 'Bidang :attribute harus minimal :min karekter.',
        'array'   => 'Bidang :attribute harus memiliki minimal :min item.',
    ],
    'not_in'               => 'Yang dipilih :attribute tidak valid.',
    'numeric'              => 'Bidang :attribute harus berupa angka.',
    'present'              => 'Bidang :attribute harus hadir.',
    'regex'                => 'Bidang :attribute Format tidak valid.',
    'required'             => 'Bidang :attribute diperlukan.',
    'required_if'          => 'Bidang :attribute bidang diperlukan bila :other adalah :value.',
    'required_unless'      => 'Bidang :attribute bidang diperlukan kecuali :other adalah di :values.',
    'required_with'        => 'Bidang :attribute diperlukan bila :values hadir.',
    'required_with_all'    => 'Bidang :attribute diperlukan bila :values hadir.',
    'required_without'     => 'Bidang :attribute diperlukan bila :values tidak hadir.',
    'required_without_all' => 'Bidang :attribute diperlukan bila tidak ada :values yang hadir.',
    'same'                 => 'Bidang :attribute dan :other harus cocok.',
    'size'                 => [
        'numeric' => 'Bidang :attribute harus :size.',
        'file'    => 'Bidang :attribute harus :size kilobyte.',
        'string'  => 'Bidang :attribute harus :size karakter.',
        'array'   => 'Bidang :attribute harus berisi :size item.',
    ],
    'string'               => 'Bidang :attribute harus string.',
    'timezone'             => 'Bidang :attribute harus menjadi zona valid.',
    'unique'               => 'Bidang :attribute sudah diambil.',
    'uploaded'             => 'Bidang :attribute gagal meng-upload.',
    'url'                  => 'Bidang :attribute format tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
