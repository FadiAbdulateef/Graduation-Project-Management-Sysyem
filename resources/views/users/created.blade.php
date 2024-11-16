@extends('layouts.master')
@section('title')
   نظام إدارة مشاريع التخرج
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
{{--    <link rel="stylesheet" href="{{ asset('H:\Graduation Projects Menegmante System\public\css\app.css')  }}">--}}
@endsection

@section('title_Dashboard')
    الداشبورد
@endsection

@section('title_Home')
    إدارة المستخدمين
@endsection

@section('title_Dashboard_v1')
إضافة مستخدم
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-semibold md:text-xl text-gray-800 leading-tight">
                                {{ __('مستخدم جديد') }}
                            </h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <x-flash-message class="mb-4" :errors="$errors"/>
                                            <form method="POST" action="{{ route('users.store') }}">
                                                @csrf
                                                <div>
                                                    <div class="grid grid-rows-2 gap-2">
                                                        <div class="grid grid-cols-2 gap-2">
                                                            <div>
                                                                <x-label for="first_name" :value="__('الاسم الأول')"/>
                                                                <x-input id="first_name" class="block mt-1 w-full"
                                                                         type="text" name="first_name"
                                                                         placeholder="الاسم الأول"
                                                                         value="{{ old('first_name') }}" autofocus required/>
                                                            </div>
                                                            <div>
                                                                <x-label for="last_name" :value="__('الاسم الاخير')"/>
                                                                <x-input id="last_name" class="block mt-1 w-full"
                                                                         type="text" name="last_name"
                                                                         placeholder="الاسم الاخير" required
                                                                         :value="old('last_name')"/>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-2">
                                                            <div>
                                                                <x-label for="serial_number"
                                                                         :value="__('الرقم الجامعي')"/>
                                                                <x-input id="serial_number" class="block mt-1 w-full"
                                                                         type="number"
                                                                         name="serial_number"
                                                                         placeholder="الرقم الجامعي"
                                                                         :value="old('serial_number')"/>
                                                            </div>
                                                            <div>
                                                                <x-label for="email" :value="__('البريد الإلكتروني')"/>
                                                                <x-input id="email" class="block mt-1 w-full"
                                                                         type="email" name="email" required
                                                                         placeholder="البريد الإلكتروني" :value="old('email')"/>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-2">
                                                            <div>
                                                                <x-label for="roles" :value="__('الدور')"/>
{{--                                                                <x-select name="spec" id="spec"--}}
{{--                                                                          class="capitalize block mt-1 w-full">--}}
{{--                                                                    @foreach ($departments as $departmentSeeder)--}}
{{--                                                                        <option class="capitalize"--}}
{{--                                                                                value="{{ $departmentSeeder->value }}" {{ $departmentSeeder->value ==--}}
{{--                                                old('departmentSeeder') ? 'selected' : '' }}>{{ $departmentSeeder->name }}--}}
{{--                                                                        </option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </x-select>--}}
                                                                <x-multi-select-dropdown placeholder="اختر دور"
                                                                                         name="roles[]">
                                                                    @foreach ($roles as $role)
                                                                        <option
                                                                            value="{{ $role }}" {{ in_array($role,old('roles') ?? []) ? 'selected' : '' }}>
                                                                            {{$role }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-multi-select-dropdown>
                                                            </div>
                                                            <div>
{{--                                                                <!-- هذا الكود ينشئ علامة label عادية باستخدام العنصر label -->--}}
{{--                                                                <!-- السمة for تحدد الاسم الذي يرتبط به الحقل -->--}}
{{--                                                                <!-- النص الذي يظهر على العلامة هو نفس النص الذي تم ترجمته باستخدام الدالة __ -->--}}
{{--                                                                <label for="department_id">{{ __('القسم') }}</label>--}}

{{--                                                                <!-- هذا الكود ينشئ حقل اختيار عادي باستخدام العنصر select -->--}}
{{--                                                                <!-- السمات name و id و class تحدد نفس المعاملات التي تم استخدامها في العنصر x-select -->--}}
{{--                                                                <select name="department_id" id="department_id" class="capitalize block mt-1 w-full">--}}

{{--                                                                    <!-- هذا الكود يستخدم نفس الدورة التكرارية foreach loop لعرض كل قسم كخيار في الحقل -->--}}
{{--                                                                    <!-- المتغير $departments يحتوي على مجموعة من الأقسام المتاحة -->--}}
{{--                                                                    <!-- في كل تكرار، يتم تخزين قسم واحد في المتغير $departmentSeeder -->--}}
{{--                                                                    @foreach ($departments as $departmentSeeder)--}}

{{--                                                                        <!-- هذا الكود ينشئ عنصر option لكل قسم -->--}}
{{--                                                                        <!-- السمات value و selected تحدد نفس المعاملات التي تم استخدامها في العنصر option السابق -->--}}
{{--                                                                        <!-- القيمة {{ $departmentSeeder->value }} تعرض قيمة القسم من المتغير $departmentSeeder -->--}}
{{--                                                                        <!-- الدالة old تستخدم للتحقق ما إذا كان القسم محدداً سابقاً أم لا -->--}}
{{--                                                                        <!-- إذا كان القسم محدداً سابقاً، يتم إضافة السمة selected للخيار -->--}}
{{--                                                                        <!-- القيمة {{ $departmentSeeder->name }} تعرض اسم القسم من المتغير $departmentSeeder -->--}}
{{--                                                                        <option class="capitalize" value="{{ $departmentSeeder->value }}" {{ $departmentSeeder->value == old('departmentSeeder') ? 'selected' : '' }}>{{ $departmentSeeder->name }}</option>--}}

{{--                                                                        <!-- هذا الكود ينهي الدورة التكرارية -->--}}
{{--                                                                    @endforeach--}}

{{--                                                                    <!-- هذا الكود يغلق الحقل -->--}}
{{--                                                                </select>--}}

                                                                {{--                                                                <x-label for="department_id" :value="__('القسم')"/>--}}
{{--                                                                <x-select name="department_id" id="department_id" class="capitalize block mt-1 w-full" required style="background-color: #f0f0f0; border: 1px solid #cccccc; font-family: Arial, sans-serif;">--}}
{{--                                                                    <option value="" disabled selected>اختر القسم</option>--}}
{{--                                                                    @foreach ($departments as $departmentSeeder)--}}
{{--                                                                        <option class="capitalize" value="{{ $departmentSeeder->value }}" {{ $departmentSeeder->value == old('departmentSeeder') ? 'selected' : '' }}>{{ $departmentSeeder->name }}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </x-select>--}}

                                                                {{--                                                                <x-select name="department_id" id="department_id"--}}
{{--                                                                          class="capitalize block mt-1 w-full">--}}
{{--                                                                    @foreach ($departments as $departmentSeeder)--}}
{{--                                                                        <option class="capitalize"--}}
{{--                                                                                value="{{ $departmentSeeder->value }}" {{ $departmentSeeder->value ==--}}
{{--                                                old('departmentSeeder') ? 'selected' : '' }}>{{ $departmentSeeder->name }}--}}
{{--                                                                        </option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </x-select>--}}
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 gap-2">
                                                            <div>
                                                                <x-label for="password" :value="__('كلمة المرور')"/>
                                                                <x-input id="password" class="block mt-1 w-full"
                                                                         type="password"
                                                                         placeholder="كلمة المرور" name="password" required/>
                                                            </div>
                                                            <div>
                                                                <x-label for="confirm-password"
                                                                         :value="__('تأكيد كلمة المرور')"/>
                                                                <x-input id="confirm_password" class="block mt-1 w-full"
                                                                         type="password"
                                                                         placeholder="تأكيد كلمة المرور"
                                                                         name="confirm-password" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end mt-4">
                                                        <x-button type="submit" style="background-color: #0000C0">
                                                            {{ __('إنشاء') }}
                                                        </x-button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true, "ordering": true,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

        });
        $(function () {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.swalDefaultSuccess').click(function () {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>
@endsection

