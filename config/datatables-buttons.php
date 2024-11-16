<?php
return [
    /*
     * الأسماء المستعارة المستخدمة بواسطة المولد.
     */
    'namespace' => [
        /*
         * مسار الأساس / الدليل لإنشاء الملف الجديد.
         * يتم إلحاق هذا المسار بالمسار الافتراضي لـ Laravel.
         * الاستخدام: php artisan datatables:make User
         * النتيجة: App\DataTables\UserDataTable
         * مع النموذج: App\User (النموذج الافتراضي)
         * اسم ملف التصدير: users_timestamp
         */
        'base' => 'DataTables',

        /*
         * مسار الأساس / الدليل حيث توجد نماذجك.
         * يتم إلحاق هذا المسار بالمسار الافتراضي لـ Laravel.
         * الاستخدام: php artisan datatables:make Post --model
         * النتيجة: App\DataTables\PostDataTable
         * مع النموذج: App\Post
         * اسم ملف التصدير: posts_timestamp
         */
        'model' => 'App\\Models',
    ],

    /*
     * تعيين مجلد قالب مخصص.
     */
//    'stub' => '/resources/custom_stub',

    /*
     * مولد PDF ليتم استخدامه عند تحويل الجدول إلى PDF.
     * المولدات المتاحة: excel, snappy
     * حزمة Snappy: barryvdh/laravel-snappy
     * حزمة Excel: maatwebsite/excel
     */
    'pdf_generator' => 'snappy',

    /*
     * خيارات Snappy PDF.
     */
    'snappy' => [
        'options' => [
            'no-outline' => true,
            'margin-left' => '0',
            'margin-right' => '0',
            'margin-top' => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape', // اتجاه الصفحة: أفقي
    ],

    /*
     * معلمات منشئ HTML الافتراضية.
     */
    'parameters' => [
        'dom' => 'Bfrtip', // إعداد DOM الافتراضي
        'order' => [[0, 'desc']], // الترتيب الافتراضي: العمود الأول بترتيب تنازلي
        'buttons' => [
            'excel', // زر تصدير إلى Excel
            'csv', // زر تصدير إلى CSV
            'pdf', // زر تصدير إلى PDF
            'print', // زر الطباعة
            'reset', // زر إعادة التعيين
            'reload', // زر إعادة التحميل
        ],
    ],

    /*
     * القيم الافتراضية لأوامر المولد.
     */
    'generator' => [
        /*
         * الأعمدة الافتراضية للتوليد عندما لا يتم تعيينها.
         */
        'columns' => 'id,name,email,status,created_at,updated_at',

        /*
         * الأزرار الافتراضية للتوليد عندما لا يتم تعيينها.
         */
        'buttons' => 'excel,csv,pdf,print,reset,reload',

        /*
         * DOM الافتراضي للتوليد عندما لا يتم تعيينه.
         */
        'dom' => 'Bfrtip',
    ],
];





//return [
//    /*
//     * Namespaces used by the generator.
//     */
//    'namespace' => [
//        /*
//         * Base namespace/directory to create the new file.
//         * This is appended on default Laravel namespace.
//         * Usage: php artisan datatables:make User
//         * Output: App\DataTables\UserDataTable
//         * With Model: App\User (default model)
//         * Export filename: users_timestamp
//         */
//        'base' => 'DataTables',
//
//        /*
//         * Base namespace/directory where your model's are located.
//         * This is appended on default Laravel namespace.
//         * Usage: php artisan datatables:make Post --model
//         * Output: App\DataTables\PostDataTable
//         * With Model: App\Post
//         * Export filename: posts_timestamp
//         */
//        'model' => '',
//    ],
//
//    /*
//     * Set Custom stub folder
//     */
//    //'stub' => '/resources/custom_stub',
//
//    /*
//     * PDF generator to be used when converting the table to pdf.
//     * Available generators: excel, snappy
//     * Snappy package: barryvdh/laravel-snappy
//     * Excel package: maatwebsite/excel
//     */
//    'pdf_generator' => 'snappy',
//
//    /*
//     * Snappy PDF options.
//     */
//    'snappy' => [
//        'options' => [
//            'no-outline' => true,
//            'margin-left' => '0',
//            'margin-right' => '0',
//            'margin-top' => '10mm',
//            'margin-bottom' => '10mm',
//        ],
//        'orientation' => 'landscape',
//    ],
//
//    /*
//     * Default html builder parameters.
//     */
//    'parameters' => [
//        'dom' => 'Bfrtip',
//        'order' => [[0, 'desc']],
//        'buttons' => [
//            'excel',
//            'csv',
//            'pdf',
//            'print',
//            'reset',
//            'reload',
//        ],
//    ],
//
//    /*
//     * Generator command default options value.
//     */
//    'generator' => [
//        /*
//         * Default columns to generate when not set.
//         */
//        'columns' => 'id,add your columns,created_at,updated_at',
//
//        /*
//         * Default buttons to generate when not set.
//         */
//        'buttons' => 'excel,csv,pdf,print,reset,reload',
//
//        /*
//         * Default DOM to generate when not set.
//         */
//        'dom' => 'Bfrtip',
//    ],
//];
