<?php

return [

    /*
    |--------------------------------------------------------------------------
    | رسائل التحقق
    |--------------------------------------------------------------------------
    |
    | السطور التالية تحتوي على رسائل الخطأ الافتراضية المستخدمة
    | بواسطة فئة التحقق. بعض هذه القواعد لها إصدارات متعددة
    | مثل قواعد الحجم. لا تتردد في تعديل هذه الرسائل.
    |
    */

    'accepted' => 'يجب قبول الحقل :attribute.',
    'accepted_if' => 'يجب قبول الحقل :attribute عندما يكون :other يساوي :value.',
    'active_url' => 'الحقل :attribute ليس عنوان URL صالحًا.',
    'after' => 'يجب أن يكون الحقل :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون الحقل :attribute تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي الحقل :attribute على أحرف فقط.',
    'alpha_dash' => 'يجب أن يحتوي الحقل :attribute على أحرف وأرقام وشرطات فقط.',
    'alpha_num' => 'يجب أن يحتوي الحقل :attribute على أحرف وأرقام فقط.',
    'array' => 'يجب أن يكون الحقل :attribute مصفوفة.',
    'before' => 'يجب أن يكون الحقل :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون الحقل :attribute تاريخًا قبل أو يساوي :date.',
    'between' => [
        'numeric' => 'يجب أن يكون الحقل :attribute بين :min و :max.',
        'file' => 'يجب أن يكون الحقل :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute بين :min و :max حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute بين :min و :max عنصرًا.',
    ],
    'boolean' => 'يجب أن يكون الحقل :attribute صحيحًا أو خاطئًا.',
    'confirmed' => 'تأكيد الحقل :attribute غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'الحقل :attribute ليس تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون الحقل :attribute تاريخًا يساوي :date.',
    'date_format' => 'الحقل :attribute لا يتطابق مع الصيغة :format.',
    'declined' => 'يجب رفض الحقل :attribute.',
    'declined_if' => 'يجب رفض الحقل :attribute عندما يكون :other يساوي :value.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مختلفين.',
    'digits' => 'يجب أن يحتوي الحقل :attribute على :digits أرقام.',
    'digits_between' => 'يجب أن يحتوي الحقل :attribute بين :min و :max أرقام.',
    'dimensions' => 'الحقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'الحقل :attribute يحتوي على قيمة مكررة.',
    'email' => 'يجب أن يكون الحقل :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي الحقل :attribute بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'exists' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'file' => 'يجب أن يكون الحقل :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي الحقل :attribute على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أكبر من :value.',
        'file' => 'يجب أن يكون الحقل :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute أكبر من :value حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute على أكثر من :value عنصرًا.',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أكبر من أو يساوي :value.',
        'file' => 'يجب أن يكون الحقل :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute أكبر من أو يساوي :value حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute على :value عنصر أو أكثر.',
    ],
    'image' => 'يجب أن يكون الحقل :attribute صورة.',
    'in' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'in_array' => 'الحقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون الحقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون الحقل :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون الحقل :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون الحقل :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون الحقل :attribute سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من :value.',
        'file' => 'يجب أن يكون الحقل :attribute أقل من :value كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute أقل من :value حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute على أقل من :value عنصرًا.',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value.',
        'file' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value حرفًا.',
        'array' => 'يجب ألا يحتوي الحقل :attribute على أكثر من :value عنصرًا.',
    ],
    'mac_address' => 'يجب أن يكون الحقل :attribute عنوان MAC صالحًا.',
    'max' => [
        'numeric' => 'يجب ألا يزيد الحقل :attribute عن :max.',
        'file' => 'يجب ألا يزيد الحقل :attribute عن :max كيلوبايت.',
        'string' => 'يجب ألا يزيد الحقل :attribute عن :max حرفًا.',
        'array' => 'يجب ألا يحتوي الحقل :attribute على أكثر من :max عنصرًا.',
    ],
    'mimes' => 'يجب أن يكون الحقل :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون الحقل :attribute ملفًا من النوع: :values.',
    'min' => [
        'numeric' => 'يجب أن يكون الحقل :attribute على الأقل :min.',
        'file' => 'يجب أن يكون الحقل :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute على الأقل :min حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute على الأقل :min عنصرًا.',
    ],
    'multiple_of' => 'يجب أن يكون الحقل :attribute مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'not_regex' => 'صيغة الحقل :attribute غير صالحة.',
    'numeric' => 'يجب أن يكون الحقل :attribute رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب أن يكون الحقل :attribute موجودًا.',
    'prohibited' => 'الحقل :attribute محظور.',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other يساوي :value.',
    'prohibited_unless' => 'الحقل :attribute محظور إلا إذا كان :other ضمن :values.',
    'prohibits' => 'الحقل :attribute يحظر وجود :other.',
    'regex' => 'صيغة الحقل :attribute غير صالحة.',
    'required' => 'الحقل :attribute مطلوب.',
    'required_array_keys' => 'يجب أن يحتوي الحقل :attribute على إدخالات لـ: :values.',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_unless' => 'الحقل :attribute مطلوب إلا إذا كان :other ضمن :values.',
    'required_with' => 'الحقل :attribute مطلوب عند وجود :values.',
    'required_with_all' => 'الحقل :attribute مطلوب عند وجود :values.',
    'required_without' => 'الحقل :attribute مطلوب عند عدم وجود :values.',
    'required_without_all' => 'الحقل :attribute مطلوب عند عدم وجود أي من :values.',
    'same' => 'يجب أن يتطابق الحقلان :attribute و :other.',
    'size' => [
        'numeric' => 'يجب أن يكون الحقل :attribute مساويًا لـ :size.',
        'file' => 'يجب أن يكون الحقل :attribute مساويًا لـ :size كيلوبايت.',
        'string' => 'يجب أن يكون الحقل :attribute مساويًا لـ :size حرفًا.',
        'array' => 'يجب أن يحتوي الحقل :attribute على :size عنصرًا.',
    ],
    'starts_with' => 'يجب أن يبدأ الحقل :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون الحقل :attribute سلسلة نصية.',
    'timezone' => 'يجب أن يكون الحقل :attribute منطقة زمنية صالحة.',
    'unique' => 'قيمة الحقل :attribute مستخدمة مسبقًا.',
    'uploaded' => 'فشل تحميل الحقل :attribute.',
    'url' => 'يجب أن يكون الحقل :attribute عنوان URL صالحًا.',
    'uuid' => 'يجب أن يكون الحقل :attribute UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | رسائل التحقق المخصصة
    |--------------------------------------------------------------------------
    |
    | هنا يمكنك تحديد رسائل تحقق مخصصة للحقول باستخدام
    | اصطلاح "attribute.rule". هذا يسمح بتحديد رسالة
    | مخصصة لقاعدة تحقق محددة بسرعة.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة-مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | أسماء الحقول المخصصة
    |--------------------------------------------------------------------------
    |
    | السطور التالية تستخدم لاستبدال النصوص البديلة للحقول
    | بأسماء أكثر وضوحًا مثل "عنوان البريد الإلكتروني" بدلاً من
    | "email". هذا يساعد على جعل الرسائل أكثر تعبيرًا.
    |
    */

    'attributes' => [],

];
