<div class="modal fade" id="modal-lgg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل الدور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -82rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--                    <x-flash-message />--}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('roles.update',$role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="ml-2 mt-2">
                            <div>
                                <x-label for="name" class="text-lg" :value="__('الدور')"/>
                                <x-input id="name" class="w-full block mt-3 font-size-small" type="text" name="name"
                                         value="{{ $role->name }}"/>
                            </div>
                            <div class="mt-3">
                                <x-label for="permission" class="text-lg" :value="__('صلاحيات الدور')"/>
                                @foreach($permissions->chunk(4) as $chunk)
                                    <div class="grid grid-row-3 gap-2 mt-4">
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                            @foreach ($chunk as $permission)
                                                <div>
                                                    <label class="inline-flex items-center mt-2">
                                                        <input name="permission[]" type="checkbox"
                                                               value="{{ $permission->id }}"
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
