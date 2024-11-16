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
                            <a href="{{ route('users.create') }}">
                                <x-button type="button" class="text-xs">
                                    {{ __('إنشاء مستخدم جديد') }}
                                </x-button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{--                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
                            {{--                                <div class="flex flex-col">--}}
                            {{--                                    <div class="-my-2 overflow-x-auto scrollbar-none sm:-mx-6 lg:-mx-8">--}}
                            {{--                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
                            <x-flash-message/>
                            {{--                                            <div class="shadow-lg overflow-hidden border border-gray-300 sm:rounded-lg">--}}
                            <table id="example1"
                                   class="DataTables table table-hover min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-bald text-gray-500 uppercase tracking-wider">
                                        المستخدم
                                    </th>
                                    {{--                                    <th scope="col"--}}
                                    {{--                                        class="px-6 py-3 text-right text-xs font-bald text-gray-500 uppercase tracking-wider">--}}
                                    {{--                                        البريد الإلكتروني--}}
                                    {{--                                    </th>--}}
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-bald text-gray-500 uppercase tracking-wider">
                                        الدور
                                    </th>
                                    {{--                                                        <th scope="col"--}}
                                    {{--                                                            class="px-6 py-3 text-left text-xs font-bald text-gray-500 uppercase tracking-wider">--}}
                                    {{--                                                            الدور--}}
                                    {{--                                                        </th>--}}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{--                                            {{$user->name }}--}}
                                            <div class="flex items-center">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <a href="{{ route('users.show',$user->id) }}">
                                                            <img class="h-10 w-10 rounded-full border border-gray-300"
                                                                 src="/uploads/avatars/{{ $user->avatar }}"
                                                                 alt="profile">
                                                        </a>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"
                                                             style="color: #0a001f">
                                                            <a href="{{ route('users.show',$user->id) }}">{{$user->name }}</a>
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            <a href="{{ route('users.show',$user->id) }}">{{$user->email }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        {{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
                                        {{--                                            {{$user->email }}--}}
                                        {{--                                        </td>--}}
                                        {{--                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
                                        {{--                                                                <div class="flex items-center">--}}
                                        {{--                                                                    <div class="">--}}
                                        {{--                                                                        <div class="text-sm font-medium text-gray-900">--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                        <div class="text-sm text-gray-500">--}}
                                        {{--                                                                            {{ $user->stdsn ?? 'NA' }}--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                    </div>--}}
                                        {{--                                                                </div>--}}
                                        {{--                                                            </td>--}}
                                        {{--                                                            <td class="capitalize px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
                                        {{--                                                                {{ $user->spec->value }}--}}
                                        {{--                                                            </td>--}}
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                            @foreach($user->getRoleNames() as $v)
                                                <label
                                                    class=" px-2 py-0.5 bg-gray-100 rounded-full border border-gray-300">{{$v }}</label>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('users.edit',$user->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            No Results found
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            <div class="py-8">
                                {!! $users->links() !!}
                            </div>
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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

