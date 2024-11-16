<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة دور </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -82rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--                    <x-flash-message />--}}
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="ml-2 mt-2">
                        <div>
                            <x-label for="name" class="text-lg" :value="__('اسم الدور')"/>
                            <x-input id="name" class="w-full block mt-3 font-size-small" type="text" name="name"
                                     placeholder="اسم الدور" autofocus/>
                        </div>
                        <div class="mt-3">
                            <x-label for="permissions" class="text-lg" :value="__('صلاحيات الدور')"/>
                            @foreach($permissions->chunk(4) as $chunk)
                                <div class="grid grid-row-3 gap-2 mt-4">
                                    <div class="grid grid-cols-4 md:grid-cols-4 gap-2">
                                        @foreach ($chunk as $permission)
                                            <div >
                                                <label class="inline-flex items-center">
                                                    <input id="permission[]" type="checkbox" name="permission[]"
                                                           value="{{ $permission->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm
                                                focus:border-indigo-300 focus:ring focus:ring-indigo-200
                                                focus:ring-opacity-50">
                                                    <span
                                                        class="ml-2 text-sm text-gray-600">{{ (trans('permissions.'.$permission->name)) }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>


                    <div class="modal-footer justify-end-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success swalDefaultSuccess">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
