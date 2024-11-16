@extends('layouts.master')
@section('title')
    AdminLTE 3 | Dashboard
@endsection

@section('css')

@endsection

@section('title_Dashboard')
    الداشبورد
@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
    لوحة التحكم
@endsection

@section('content')
    <section class="content">
        <div class="card-header">
            <div class="max-w-7xl mx-auto">
                <x-flash-message class="mb-4" :errors="$errors"/>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2 max-w-7xl">
                    <div class=" overflow-hidden shadow-lg rounded-3xl">
                        <div class=" card border-b border-gray-200">
                            <img src="{{URL::asset('assets/img/default.jpg')}} "
                                 class="w-full md:h-96 md:w-96 rounded-full border-2 border-gray-300">
                            <div
                                class="flex flex-col md:flex-row container justify-between border-b border-gray-300 py-4">
                                <h3 class=" text-xl  leading-tight mt-2  items-center">
                                    {{ $user->name }}
                                </h3>
                                <div class="text-xs text-blue-500 mt-3 md:ml-4">
                                    <div class="container flex flex-row justify-between md:w-36">
                                        <div>
                                            اخر تسجيل دخول :
                                        </div>
                                        <div>
                                            @if($user->last_login_at)
                                                {{ $user->last_login_at->diffForHumans() }}
                                            @else
                                                never
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div
                                class="grid grid-cols-2 grid-rows-1 border-b border-gray-300 w-full py-4 items-center">
                                <div class="text-xs">
                                    {{ $user->email }}
                                </div>
                                <div class="text-xs  flex justify-end">
                                    {{ $user->stdsn }}
                                </div>
                            </div>
                            <div class="grid grid-cols-2 grid-rows-1 border-gray-500 w-full justify-center">
                                <div class="text-xs text-gray-800 mt-3">
                                    <h5>الدور</h5>
                                </div>
                                <div class="text-xs mt-3 flex justify-center">
                                    @foreach($userRole as $v)
                                        <h5>{{$v}}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-2 order-md-2 items-center justify-start">
                    <div class="max-w-7xl w-full md:w-96 mt-3">
                        <div class="bg-white overflow-hidden shadow-lg rounded-3xl">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-2  items-center">
                                    {{ __('مشروع التخرج') }}
                                </h2>
                                <div
                                    class=" md:flex-row justify-between py-4 border-b border-gray-300">
                                    <div class="text-sm text-gray-800">
                                       المشروع الحالي
                                    </div>
                                    <div class="text-sm text-gray-500">
{{--                                        @if($user->graduate->project||$user->supervisor->project)--}}

{{--                                            <a class="text-indigo-500 hover:text-indigo-700"--}}
{{--                                               href="{{ route('projects.show',$user->graduate->project) }}">--}}
{{--                                                {{ $user->graduate->project->title }}--}}
{{--                                            </a>--}}

{{--                                        @else--}}
                                            none
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" px-10 flex items-end justify-end">
                <a href="{{ route('profile.edit','') }}">
                    <x-button dir="rtl" type="button">
                        {{ __('Edit Profile') }}
                    </x-button>
                </a>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection

