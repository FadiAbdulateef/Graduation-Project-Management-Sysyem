@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">

@endsection

@section('title_Dashboard')

   الادوار
@endsection
@section('title_Home')
    الرئيسية
@endsection

@section('title_Dashboard_v1')
    لوحة التحكم
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
{{--                            <form method="POST" action="{{ route('roles.destroy',$role->id) }}">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <x-modal>--}}
{{--                                    <x-slot name="trigger">--}}
{{--                                        <x-button type="button" class="bg-red-600 hover:bg-red-500" @click.prevent="showModal = true"--}}
{{--                                                  value="Click Here">حذف الدور</x-button>--}}
{{--                                    </x-slot>--}}
{{--                                    <x-slot name="title">--}}
{{--                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">--}}
{{--                                            حذف دور--}}
{{--                                        </h3>--}}
{{--                                    </x-slot>--}}
{{--                                    <x-slot name="content">--}}
{{--                                        <p class="text-sm text-gray-500">--}}
{{--                                            Are you sure you want to delete {{ $role->name }} Role? This action cannot be undone.--}}
{{--                                        </p>--}}
{{--                                    </x-slot>--}}
{{--                                </x-modal>--}}
{{--                            </form>--}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <x-flash-message class="mb-4" :errors="$errors" />
                                        <form method="POST" action="{{ route('roles.update',$role->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="ml-2 mt-2">
                                                <div>
                                                    <x-label for="name" class="text-lg" :value="__('الدور')" />
                                                    <x-input id="name" class="w-full block mt-3 font-size-small" type="text" name="name"
                                                             value="{{ $role->name }}" />
                                                </div>
                                                <div class="mt-3">
                                                    <x-label for="permission" class="text-lg" :value="__('صلاحيات الدور')" />
                                                    @foreach($permissions->chunk(4) as $chunk)
                                                        <div class="grid grid-row-3 gap-2 mt-4">
                                                            <div class="grid grid-cols-4 md:grid-cols-4 gap-2">
                                                                @foreach ($chunk as $permission)
                                                                    <div>
                                                                        <label class="inline-flex items-center mt-2">
                                                                            <input name="permission[]" type="checkbox" value="{{ $permission->id }}"
                                                                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                                                {{ in_array($permission->id,$rolePermissions) ? 'checked' : '' }}>
                                                                            <span class="ml-2 text-sm text-gray-600">{{ (trans('permissions.'.$permission->name)) }}
                                                                              </span>
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex items-center justify-end mt-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                تعديل
                                                            </button>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
{{--        @include('Scope.modal.add')--}}
    </section>

@endsection

@section('scripts')
    <script>

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
