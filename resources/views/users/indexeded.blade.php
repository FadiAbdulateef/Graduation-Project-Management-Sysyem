@extends('layouts.master')
@section('title')
    AdminLTE 3 | Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/myfile/file.css')}}">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            @include('message.messages_alert')
                            <div class="card-header">
                                <a href="{{ route('users.create') }}">
                                    <button type="button" class="btn btn-primary text-xs">
                                        {{ __('إنشاء مستخدم جديد') }}
                                    </button>
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="DataTables table table-hover table-bordered table-striped">
                                    {{--                            <table id="example1" class="DataTables table table-hover table-striped">--}}
                                    <thead>
                                    <tr>
                                        <th> رقم</th>
                                        <th> الاسم</th>
                                        <th> الدور</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>

                                                <div>
                                                    {{$user->name }}
                                                </div>
                                                <div>
                                                    {{$user->email }}
                                                </div>
                                            </td>
                                            {{--                                        </td>  <td>--}}
                                            {{--                                            <div class="ml-4" style="color: #0a001f">--}}
                                            {{--                                                <div class="text-sm font-medium text-gray-900">--}}
                                            {{--                                                    <a href="{{ route('users.show',$user->id) }}">{{$user->name }}</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div class="text-sm text-gray-500">--}}
                                            {{--                                                    <a href="{{ route('users.show',$user->id) }}">{{$user->email }}</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            <td class="text-center">
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="text-xs">{{$v }}</label>
                                                @endforeach
                                                {{--                                            @foreach($roles as $role)--}}
                                                {{--                                                <label>{{$user->role->name}}</label>--}}
                                                {{--                                            @endforeach--}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                {{--                                            <x-modal id="deleteUserModal" size="modal-sm" title="Delete User" body="Are you sure you want to delete {{ $user->first_name }}'s account? All of their data will be permanently removed. This action cannot be undone." footer="<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' class='btn btn-danger'>Delete</button>">--}}
                                                {{--                                                <x-slot name="trigger">--}}
                                                {{--                                                    <x-button type="button" class="bg-red-600 hover:bg-red-500" data-toggle="modal" data-target="#deleteUserModal" value="Click Here">Delete User</x-button>--}}
                                                {{--                                                </x-slot>--}}
                                                {{--                                            </x-modal>--}}
                                                {{--                                            <button pla type="button" id="#deleteUserModal{{$user->id}}" class="btn btn-primary" data-toggle="modal"--}}
                                                {{--                                                    data-target="#exampleModal" data-whatever="@fat">إضافة مرحلة--}}
                                                {{--                                            </button>--}}
                                                <a href="{{ route('users.edit',$user->id) }}"
                                                   class="text-indigo-600 hover:text-indigo-900">Edit - </a>
                                                <a class="text-indigo-600 hover:text-indigo-900" data-effect="effect-scale"
                                                   data-toggle="modal" href="#delete{{$user->id}}"> - Delete<i
                                                        class="las la-trash"></i></a>
{{--                                                <a class="text-indigo-600 hover:text-indigo-900" data-effect="effect-scale"--}}
{{--                                                   data-toggle="modal" href="#delete{{$user->id}}"> - Delete<i--}}
{{--                                                        class="las la-trash"></i></a>--}}
                                            </td>
                                        </tr>
                                        @include('users.modal.delete')
                                    @endforeach
                                    </tbody>
                                    @include('message.messages_alert')
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
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
        var tabs = document.getElementById("tab16");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab15");
        tabs7.classList.add("menu-open");
        var tab = document.getElementById("tab17");
        tab.classList.add("active");
    </script>
@endsection
