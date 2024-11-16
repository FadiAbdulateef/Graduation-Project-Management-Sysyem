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
    @can('setting-control')
        <a href="{{ route('welcome')}}">الرئيسية</a>
    @endcan
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
                            <div class="card-header">
{{--                                <a href="{{ route('roles.create') }}">--}}
                                <button pla type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">إضافة دور
                                </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="DataTables table table-hover  border border-gray-300 sm:rounded-lg min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="relative px-6 py-3">الدور</th>

                                    <th scope="col" class="relative px-6 py-3">
                                        العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                    <tr>
                                        <td>    {{ $role->name }}</td>
                                        <td>

{{--                                            @can('role-edit')--}}
                                                <a  href="{{ route('roles.edit',$role->id) }}">
                                                    <button type="button" class="btn btn-block  btn-outline-primary "
                                                            data-effect="effect-scale"
                                                            data-toggle="modal"  href="{{ route('roles.edit',$role->id) }}" >تفاصيل
                                                    </button>
                                                </a>
{{--                                            @endcan--}}

{{--                                                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
{{--                                                                                    data-toggle="modal" href="{{ route('roles.edit',$role->id) }}">تعديل</a>--}}
{{--                                                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--                                                                                    data-toggle="modal" href="#delete{{$scope->id}}">حذف<i--}}
{{--                                                                                                class="las la-trash"></i></a>--}}
                                        </td>
                                    </tr>
{{--                                    @include('roles.edit')--}}
{{--                                    @include('Scope.modal.delete')--}}
                                    @include('message.messages_alert')
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @include('roles.create')
    </section>

@endsection

@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": false, "lengthChange": true, "autoWidth": true,"ordering": true,
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
