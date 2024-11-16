@extends('layouts.master')
@section('title')
    ادارة مشاريع التخرج
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/myfile/file.css')}}">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/toast/toast.min.css')}}">

@endsection

@section('title_Dashboard')

@endsection

@section('title_Home')
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
@endsection

@section('title_Dashboard_v1')
إدارة المستخدمين
@endsection

@section('content')
    @include('message.messages_alert')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('users.create') }}">
                                <button type="button" class="btn btn-primary text-xs">
                                    {{ __('إنشاء مستخدم جديد') }}
                                </button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--                            <table id="example1" class="DataTable table table-hover">--}}
                            <table id="example1" class="DataTables table table-hover table-rounded table-head-fixed">
                                <thead>
                                <tr>
                                    {{--                                    <th> رقم</th>--}}
                                    <th> الاسم</th>
                                    <th> الدور</th>
                                    <th> الحاله</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        {{--                                        <td>{{$user->id}}</td>--}}
                                        <td>
                                            <div class="flex items-center">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @if(!$user->avatar)
                                                            <a href="{{ route('users.show',$user->id) }}">
                                                                <img
                                                                    class="h-10 w-10 rounded-full border border-gray-300"
                                                                    src="{{ $user->avatar }}"
                                                                    alt="profile">
                                                            </a>
                                                        @else
{{--                                                            <a href="{{ route('users.show',$user->id) }}">--}}
                                                            <a href="#">
                                                                <img
                                                                    class="h-10 w-10 rounded-full border border-gray-300"
                                                                    src="{{URL::asset('assets/img/user-solid.svg')}}"
                                                                    alt="profile"/>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"
                                                             style="color: #0a001f">
                                                            {{$user->first_name }} {{$user->last_name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{$user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                            <div>--}}
                                            {{--                                                {{$user->name }}--}}
                                            {{--                                            </div>--}}
                                            {{--                                            <div>--}}
                                            {{--                                                {{$user->email }}--}}
                                            {{--                                            </div>--}}
                                        </td>
                                        <td class="text-sm">
                                            @foreach($user->getRoleNames() as $v)
                                                <label>{{$v }}</label>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('user.status',$user->id) }}"
                                               class="btn btn-sm btn-{{ $user->status ? 'success' : 'danger' }}">
                                                {{ $user->status ? 'مفعل' : 'غير مفعل' }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">العمليات</button>
                                                <button type="button"
                                                        class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a href="{{ route('users.edit',$user->id) }}">
                                                        <button type="button" class="btn btn-block btn-outline-primary"
                                                                data-effect="effect-scale"
                                                                data-toggle="modal"
                                                                href="{{ route('users.edit',$user->id) }}">تعديل
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-block btn-outline-danger"
                                                            data-effect="effect-scale"
                                                            data-toggle="modal" href="#delete{{$user->id}}">حذف
                                                    </button>
                                                </div>
                                            </div>
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
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>--}}
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true, "ordering": false,
                // "buttons": [["text"=>"إضافة قسم" ,"class" => "btn btn-primary"]];
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
        // $(function () {
        //     var Toast = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 3000
        //     });
        //     $('.swalDefaultSuccess').click(function () {
        //         Toast.fire({
        //             icon: 'success',
        //             title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        // });
        var tabs = document.getElementById("tab16");
        tabs.classList.add("active");
        var tabs = document.getElementById("tab18");
        tabs.classList.add("active");
        var tabs7 = document.getElementById("tab15");
        tabs7.classList.add("menu-open");
    </script>

@endsection
