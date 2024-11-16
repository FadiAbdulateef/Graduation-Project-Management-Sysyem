@extends('layouts.master')
@section('title')
    نظام إدارة مشاريع التخرج
@endsection

@section('css')

@endsection

@section('title_Dashboard')
    الداشبورد
@endsection

@section('title_Home')
    إدارة المستخدمين
@endsection

@section('title_Dashboard_v1')
   تعديل مستخدم
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-semibold md:text-xl text-gray-800 leading-tight">
                                {{ __('تعديل المستخدم') }}
                            </h2>
                        </div>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <x-flash-message class="mb-4" :errors="$errors"/>
                                        <form method="POST" action="{{ route('users.update',$user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <div class="grid grid-rows-2 gap-2">
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <div>
                                                            <x-label for="first_name" :value="__('الاسم الأول')"/>
                                                            <x-input id="first_name" class="block mt-1 w-full"
                                                                     type="text"
                                                                     name="first_name"
                                                                     placeholder="الاسم الأول"
                                                                     value="{{ $user->first_name }}"
                                                                     autofocus/>
                                                        </div>
                                                        <div>
                                                            <x-label for="last_name" :value="__('الاسم الاخير')"/>
                                                            <x-input id="last_name" class="block mt-1 w-full"
                                                                     type="text"
                                                                     name="last_name"
                                                                     placeholder="الاسم الاخير"
                                                                     value="{{ $user->last_name }}"
                                                                     autofocus/>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <div>
                                                            <x-label for="serial_number" :value="__('الرقم الجامعي')"/>
                                                            <x-input id="serial_number" class="block mt-1 w-full"
                                                                     type="number"
                                                                     min="1000000" placeholder="الرقم الجامعي"
                                                                     name="serial_number"
                                                                     value="{{ $user->stdsn }}" autofocus/>
                                                        </div>
                                                        <div>
                                                            <x-label for="email" :value="__('البريد الإلكتروني')"/>
                                                            <x-input id="email" class="block mt-1 w-full" type="email"
                                                                     name="email"
                                                                     placeholder="البريد الإلكتروني" value="{{ $user->email }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <div>
                                                            <x-label for="roles" :value="__('Role')"/>
                                                            <x-multi-select-dropdown placeholder="Select Roles"
                                                                                     name="roles[]">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role }}" {{ in_array($role,$userRole) ? 'selected' : ''
                                                }}>{{ $role }}</option>
                                                                @endforeach
                                                            </x-multi-select-dropdown>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <div>
                                                            <x-label for="password" :value="__('كلمة المرور الجديدة')"/>
                                                            <x-input id="password" class="block mt-1 w-full"
                                                                     type="password"
                                                                     name="password"
                                                                     placeholder="كلمة المرور الجديدة"/>
                                                        </div>
                                                        <div>
                                                            <x-label for="confirm-password"
                                                                     :value="__('أكد كلمة المرور')"/>
                                                            <x-input id="confirm_password" class="block mt-1 w-full"
                                                                     type="password"
                                                                     placeholder="تأكيد كلمة المرور"
                                                                     name="confirm-password"/>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-button class="ml-3" style="background-color: #0000C0">
                                                        {{ __('تحديث') }}
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
    </section>
@endsection

@section('scripts')

@endsection

