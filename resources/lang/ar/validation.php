<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => 'يجب قبول حقل :attribute',
    'active_url'           => 'حقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي حقل :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن يحتوي حقل :attribute على حروف أو ارقام أو شرطة فقط.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون حقل :attribute ًمصفوفة',
    'before'               => 'يجب على حقل :attribute أن يكون تاريخاً سابقاً للتاريخ :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute محصورة ما بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute محصورًا ما بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute محصورًا ما بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر محصورًا ما بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة حقل :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => 'حقل :attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'after_or_equal'       => 'الحقل :attribute يجب ان يكون اكبر او يساوي :date.',
    'different'            => 'يجب أن يكون حقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي حقل :attribute على :digits أرقام',
    'digits_between'       => 'يجب أن يحتوي حقل :attribute ما بين :min و :max رقمًا/أرقام ',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني مكتوب بصيغة صحيحة',
    'ends_with'            => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'starts_with'          => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'exists'               => 'حقل :attribute غير صالح',
    'filled'               => 'حقل :attribute إجباري',
    'image'                => 'يجب أن يكون حقل :attribute صورةً',
    'in'                   => 'حقل :attribute غير صالح',
    'in_array'             => 'حقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون حقل :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون حقل :attribute عنوان IP ذي بُنية صحيحة',
    'json'                 => 'يجب أن يكون حقل :attribute نصآ من نوع JSON.',
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أصغر من أو تساوي :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من أو يساوي :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون حقل ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من أو تساوي :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من أو يساوي :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute أكبر من أو يساوي :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => 'حقل :attribute غير صالح',
    'numeric'              => 'يجب على حقل :attribute أن يكون رقماً',
    'present'              => 'حقل :attribute يجب أن يكون متواجداً',
    'regex'                => 'صيغة حقل :attribute غير صحيحة.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_if'          => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_with_all'    => 'حقل :attribute مطلوب إذا توفّر :values.',
    'required_without'     => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute مطلوب إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق حقل :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :size.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :size كيلو بايت.',
        'string'  => 'يجب أن يحتوي النص :attribute عن ما لا يقل عن  :size حرفٍ/أحرف.',
        'array'   => 'يجب أن يحتوي حقل :attribute عن ما لا يقل عن:min عنصرٍ/عناصر',
    ],
    'string'               => 'يجب أن يكون حقل :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة حقل :attribute مُستخدمة من قبل',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',
    'hex_color'            => 'حقل :attribute غير صالح',
    'uploaded'             => 'فشل في رفع الصورة نرجو المحاولة مره اخرى',
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
    'success'=>'تم',
    'phone'                => 'الرجاء التأكد من أن رقم الجوال صحيح.',
    'recaptcha'            => 'يجب تجاوز التحقق من أنك لست روبوت.',
    'custom'               => [
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
    'attributes'           => [

        'first_name'                  => 'مدير المتجر',

        'admin_name'                                 => 'الاسم',
        'store_name'                                 => 'اسم المتجر',
        'settings_name'                              => 'اسم المتجر',
        'username'                                   => 'اسم المُستخدم',
        'email'                                      => 'البريد الالكتروني',
        'name'                                       => 'الاسم',
        'last_name'                                  => 'اسم العائلة',
        'password'                                   => 'كلمة المرور',
        'old_password'                               => 'كلمة المرور القديمة',
        'password_confirmation'                      => 'تأكيد كلمة المرور',
        'city'                                       => 'المدينة',
        'country'                                    => 'الدولة',
        'address'                                    => 'العنوان',
        'phone'                                      => 'الهاتف',
        'mobile'                                     => 'الجوال',
        'mobile_number'                              => 'الجوال',
        'age'                                        => 'العمر',
        'sex'                                        => 'الجنس',
        'gender'                                     => 'النوع',
        'day'                                        => 'اليوم',
        'month'                                      => 'الشهر',
        'year'                                       => 'السنة',
        'hour'                                       => 'ساعة',
        'minute'                                     => 'دقيقة',
        'second'                                     => 'ثانية',
        'title'                                      => 'اللقب',
        'content'                                    => 'المُحتوى',
        'description'                                => 'الوصف',
        'excerpt'                                    => 'المُلخص',
        'date'                                       => 'التاريخ',
        'time'                                       => 'الوقت',
        'available'                                  => 'مُتاح',
        'size'                                       => 'الحجم',
        'store_url'                                  => 'رابط المتجر',
        'settings_store_url'                         => 'رابط المتجر',
        'bank_name'                                  => 'اسم البنك',
        'account_name'                               => 'اسم صاحب الحساب',
        'iban_number'                                => 'رقم الآيبان',
        'account_number'                             => 'رقم الحساب',
        'paypal_account'                             => 'حساب Paypal',
        'details'                                    => 'التفاصيل',
        'type'                                       => 'النوع',
        'order_number'                               => 'رقم الطلب',
        'payment_method'                             => 'طريقة الدفع',
        'display_name'                               => 'اسم العرض',
    ],

    'credit_card' => [
        'card_cvc_invalid'              => '(CVC) مكون من ٣ أرقام فقط رقم التحقق',
        'card_expiration_year_invalid'  => 'سنة انتهاء البطاقة غير صحيح',
        'card_expiration_month_invalid' => 'شهر انتهاء البطاقة غير صحيح',
        'card_invalid'                  => 'حقل رقم البطاقة الائتمانية مكون من أرقام غير صالحة',
        'card_pattern_invalid'          => 'حقل رقم البطاقة الائتمانية مكون من أرقام غير صالحة',
        'card_length_invalid'           => 'حقل رقم البطاقة الائتمانية مكون من أرقام غير صالحة',
        'card_checksum_invalid'         => 'حقل رقم البطاقة الائتمانية مكون من أرقام غير صالحة',
    ],
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر.',
    ], 'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'file'    => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرفًا.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],

];
