{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Edit User') }}--}}
{{--        </h2>--}}
{{--        <form method="POST" action="{{route('users.destroy', $user->id)}}">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <x-modal>--}}
{{--                <x-slot name="trigger">--}}
{{--                    <x-button type="button" class="bg-red-600 hover:bg-red-500" @click="showModal = true"--}}
{{--                        value="Click Here">Delete User</x-button>--}}
{{--                </x-slot>--}}
{{--                <x-slot name="title">--}}
{{--                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">--}}
{{--                        Delete User--}}
{{--                    </h3>--}}
{{--                </x-slot>--}}
{{--                <x-slot name="content">--}}
{{--                    <p class="text-sm text-gray-500">--}}
{{--                        Are you sure you want to delete {{ $user->first_name }}'s account? All of their--}}
{{--                        data will be permanently removed. This action cannot be undone.--}}
{{--                    </p>--}}
{{--                </x-slot>--}}
{{--            </x-modal>--}}
{{--        </form>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <x-flash-message class="mb-4" :errors="$errors" />--}}
{{--                    <form method="POST" action="{{ route('users.update',$user->id) }}">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}
{{--                        <div>--}}
{{--                            <div class="grid grid-rows-2 gap-2">--}}
{{--                                <div class="grid grid-cols-2 gap-2">--}}
{{--                                    <div>--}}
{{--                                        <x-label for="first_name" :value="__('First Name')" />--}}
{{--                                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"--}}
{{--                                            placeholder="First name" value="{{ $user->first_name }}" autofocus />--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <x-label for="last_name" :value="__('Last Name')" />--}}
{{--                                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"--}}
{{--                                            placeholder="Last name" value="{{ $user->last_name }}" autofocus />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="grid grid-cols-2 gap-2">--}}
{{--                                    <div>--}}
{{--                                        <x-label for="serial_number" :value="__('Serial Number')" />--}}
{{--                                        <x-input id="serial_number" class="block mt-1 w-full" type="number"--}}
{{--                                            min="1000000" placeholder="Serial Number" name="serial_number"--}}
{{--                                            value="{{ $user->stdsn }}" autofocus />--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <x-label for="email" :value="__('Email')" />--}}
{{--                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email"--}}
{{--                                            placeholder="Email" value="{{ $user->email }}" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="grid grid-cols-2 gap-2">--}}
{{--                                    <div>--}}
{{--                                        <x-label for="roles" :value="__('Role')" />--}}
{{--                                        <x-multi-select-dropdown placeholder="Select Roles" name="roles[]">--}}
{{--                                            @foreach ($roles as $role)--}}
{{--                                            <option value="{{ $role }}" {{ in_array($role,$userRole) ? 'selected' : ''--}}
{{--                                                }}>{{ $role }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </x-multi-select-dropdown>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <x-label for="spec" :value="__('Specialization')" />--}}
{{--                                        <select name="spec" id="spec"--}}
{{--                                            class="capitalize rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-800 w-full mt-1">--}}
{{--                                            @foreach ($specs as $spec)--}}
{{--                                            <option @selected($user->spec->value === $spec->value ) class="capitalize"--}}
{{--                                                value="{{ $spec->value }}">{{ $spec->value }}--}}
{{--                                            </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="grid grid-cols-2 gap-2">--}}
{{--                                    <div>--}}
{{--                                        <x-label for="password" :value="__('New password')" />--}}
{{--                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"--}}
{{--                                            placeholder="Enter Password" />--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <x-label for="confirm-password" :value="__('Confirm password')" />--}}
{{--                                        <x-input id="confirm_password" class="block mt-1 w-full" type="password"--}}
{{--                                            placeholder="Repeat Password" name="confirm-password" />--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center justify-end mt-4">--}}
{{--                                <x-button class="ml-3">--}}
{{--                                    {{ __('Update') }}--}}
{{--                                </x-button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit User') }}
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -33rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
{{--                    <div class="form-group">--}}
                        <div class="grid grid-rows-2 gap-2">
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <input type="hidden" name="id" value="{{ $user->id }}" class="form-control"
                                           id="recipient-name">
                                    <label for="first_name" class="col-form-label">اسم الاول</label>
{{--                                    <x-label for="first_name" :value="__('First Name')" />--}}
                                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                             placeholder="First name" value="{{ $user->first_name }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="last_name" :value="__('Last Name')" />
                                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                             placeholder="Last name" value="{{ $user->last_name }}" autofocus />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <x-label for="serial_number" :value="__('Serial Number')" />
                                    <x-input id="serial_number" class="block mt-1 w-full" type="number"
                                             min="1000000" placeholder="Serial Number" name="serial_number"
                                             value="{{ $user->stdsn }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             placeholder="Email" value="{{ $user->email }}" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <x-label for="roles" :value="__('Role')" />
                                    <x-multi-select-dropdown placeholder="Select Roles" name="roles[]">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" {{ in_array($role,$userRole) ? 'selected' : ''
                                                }}>{{ $role }}</option>
                                        @endforeach
                                    </x-multi-select-dropdown>
                                </div>
{{--                                <div>--}}
{{--                                    <x-label for="spec" :value="__('Specialization')" />--}}
{{--                                    <select name="spec" id="spec"--}}
{{--                                            class="capitalize rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm text-gray-800 w-full mt-1">--}}
{{--                                        @foreach ($specs as $spec)--}}
{{--                                            <option @selected($user->spec->value === $spec->value ) class="capitalize"--}}
{{--                                                    value="{{ $spec->value }}">{{ $spec->value }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <x-label for="password" :value="__('New password')" />
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                             placeholder="Enter Password" />
                                </div>
                                <div>
                                    <x-label for="confirm-password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="block mt-1 w-full" type="password"
                                             placeholder="Repeat Password" name="confirm-password" />
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="hidden" name="id" value="{{ $supervisor->id }}" class="form-control"--}}
{{--                                   id="recipient-name">--}}
{{--                            <label for="recipient-name" class="col-form-label">اسم المشرف</label>--}}
{{--                            <input type="text" name="name" value="{{ $supervisor->name }}" class="form-control"--}}
{{--                                   id="recipient-name" placeholder="ادخل اسم المشرف">--}}
{{--                            <label for="recipient-name" class="col-form-label">الإيميل</label>--}}
{{--                            <input type="email" name="email" value="{{ $supervisor->email }}" class="form-control"--}}
{{--                                   id="recipient-name" placeholder="الإيميل">--}}
{{--                            <label for="recipient-name" class="col-form-label">اسم القسم</label>--}}
{{--                            <select name="department_id" class="form-control select2" style="width: 100%;">--}}
{{--                                <option selected value="{{$supervisor->departmentSeeder->id}}">{{$supervisor->departmentSeeder->name}}</option>--}}
{{--                                @foreach($departments as $departmentSeeder)--}}
{{--                                    <option value="{{$departmentSeeder->id}}">{{$departmentSeeder->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <label for="recipient-name" class="col-form-label">نوع المشرف</label>--}}
{{--                            <select name="is_external" selected="{{ $supervisor->is_external }}"--}}
{{--                                    class="form-control select2" style="width: 100%;">--}}
{{--                                --}}{{--                                                             <option selected="selected">----------</option>--}}
{{--                                --}}{{--                                                            @foreach($supervisors as $supervisor)--}}
{{--                                <option value="0">داخلي</option>--}}
{{--                                <option value="1">خارجي</option>--}}
{{--                                --}}{{--                                                            @endforeach--}}
{{--                            </select>--}}
{{--                            <label for="recipient-name" class="col-form-label">العام الدراسي </label>--}}
{{--                            <input type="date" name="for_year" value="{{ $supervisor->for_year }}" class="form-control"--}}
{{--                                   id="recipient-name">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>--}}
{{--                            <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>

</div>

