<?php

return [

    /*
    |--------------------------------------------------------------------------
    | رسائل التحقق الافتراضية
    |--------------------------------------------------------------------------
    |
    | تحتوي الأسطر التالية على رسائل الخطأ الافتراضية المستخدمة من قبل
    | فئة Validator. بعض هذه القواعد لها إصدارات متعددة مثل قواعد الحجم.
    | لا تتردد في تعديل هذه الرسائل حسب الحاجة لتتناسب مع تطبيقك.
    |
    */

    'accepted'             => 'يجب قبول :attribute.',
    'accepted_if'          => 'يجب قبول :attribute عندما يكون :other يساوي :value.',
    'active_url'           => ':attribute ليس عنوان URL صالحاً.',
    'after'                => 'يجب أن يكون :attribute تاريخاً بعد :date.',
    'after_or_equal'       => 'يجب أن يكون :attribute تاريخاً مساوياً أو بعد :date.',
    'alpha'                => 'يجب أن يحتوي :attribute على أحرف فقط.',
    'alpha_dash'           => 'يجب أن يحتوي :attribute على أحرف، أرقام، شرطات وشرطات سفلية فقط.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
    'array'                => 'يجب أن يكون :attribute مصفوفة.',
    'before'               => 'يجب أن يكون :attribute تاريخاً قبل :date.',
    'before_or_equal'      => 'يجب أن يكون :attribute تاريخاً مساوياً أو قبل :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم ملف :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون طول :attribute بين :min و :max أحرف.',
        'array'   => 'يجب أن يحتوي :attribute بين :min و :max عناصر.',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute صحيحة أو خاطئة.',
    'confirmed'            => 'تأكيد :attribute غير متطابق.',
    'current_password'     => 'كلمة المرور غير صحيحة.',
    'date'                 => ':attribute ليس تاريخاً صالحاً.',
    'date_equals'          => 'يجب أن يكون :attribute تاريخاً مساوياً لـ :date.',
    'date_format'          => ':attribute لا يطابق التنسيق :format.',
    'declined'             => 'يجب رفض :attribute.',
    'different'            => 'يجب أن يكون :attribute مختلفاً عن :other.',
    'digits'               => 'يجب أن يحتوي :attribute على :digits أرقام.',
    'digits_between'       => 'يجب أن يحتوي :attribute بين :min و :max أرقام.',
    'email'                => 'يجب أن يكون :attribute بريدًا إلكترونيًا صحيحًا.',
    'ends_with'            => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
    'exists'               => ':attribute المختار غير صالح.',
    'file'                 => 'يجب أن يكون :attribute ملفًا.',
    'filled'               => 'يجب إدخال قيمة في :attribute.',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم ملف :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول :attribute أكبر من :value أحرف.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عناصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من أو تساوي :value.',
        'file'    => 'يجب أن يكون حجم ملف :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يكون طول :attribute أكبر من أو يساوي :value أحرف.',
        'array'   => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر.',
    ],
    'image'                => 'يجب أن يكون :attribute صورة.',
    'in'                   => ':attribute المختار غير صالح.',
    'integer'              => 'يجب أن يكون :attribute عدداً صحيحاً.',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صالحاً.',
    'json'                 => 'يجب أن يكون :attribute نص JSON صالح.',
    'max'                  => [
        'numeric' => 'يجب ألا تكون قيمة :attribute أكبر من :max.',
        'file'    => 'يجب ألا يكون حجم ملف :attribute أكبر من :max كيلوبايت.',
        'string'  => 'يجب ألا يكون طول :attribute أكبر من :max أحرف.',
        'array'   => 'يجب ألا يحتوي :attribute على أكثر من :max عناصر.',
    ],
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
        'file'    => 'يجب أن يكون حجم ملف :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يكون طول :attribute على الأقل :min أحرف.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل :min عناصر.',
    ],
    'not_in'               => ':attribute المختار غير صالح.',
    'numeric'              => 'يجب أن يكون :attribute رقماً.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'required'             => 'حقل :attribute مطلوب.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute تساوي :size.',
        'file'    => 'يجب أن يكون حجم ملف :attribute :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :size أحرف.',
        'array'   => 'يجب أن يحتوي :attribute على :size عناصر.',
    ],
    'string'               => 'يجب أن يكون :attribute نصاً.',
    'unique'               => ':attribute مُستخدم بالفعل.',
    'url'                  => 'يجب أن يكون :attribute رابطاً صالحاً.',

    /*
    |--------------------------------------------------------------------------
    | أسماء الخصائص المخصصة
    |--------------------------------------------------------------------------
    |
    | هنا يمكنك تحديد أسماء الحقول بحيث تظهر بأسماء مفهومة للمستخدم
    | بدلاً من أسماء قواعد البيانات.
    |
    */

    'attributes' => [
        'name'    => 'الاسم',
        'email'   => 'البريد الإلكتروني',
        'message' => 'الرسالة',
        'title'   => 'العنوان',
        'link'    => 'الرابط',
        'description' => 'الوصف',
        'photo'   => 'الصورة',
        'password'=> 'كلمة المرور',
    ],

];
