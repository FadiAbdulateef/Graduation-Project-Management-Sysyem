{{--<form method="POST" action="{{ route('users.destroy', $user->id) }}">--}}
{{--    @csrf--}}
{{--    @method('DELETE')--}}
{{--    <x-modal>--}}
{{--        <x-slot name="trigger">--}}
{{--            <x-button type="button" class="bg-red-600 hover:bg-red-500" @click="showModal = true"--}}
{{--                      value="Click Here">Delete User--}}
{{--            </x-button>--}}
{{--        </x-slot>--}}
{{--        <x-slot name="title">--}}
{{--            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">--}}
{{--                Delete User--}}
{{--            </h3>--}}
{{--        </x-slot>--}}
{{--        <x-slot name="content">--}}
{{--            <p class="text-sm text-gray-500">--}}
{{--                Are you sure you want to delete {{ $user->first_name }}'s account? All of their--}}
{{--                data will be permanently removed. This action cannot be undone.--}}
{{--            </p>--}}
{{--        </x-slot>--}}
{{--    </x-modal>--}}
{{--</form>--}}

<div class="modal fade" id="delete{{ ($user->id) }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف القسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('message.messages_alert')
                <form action="{{ route('users.destroy', $user->id)}}" method="post" autocomplete="off">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">
                            هل انت متأكد من أنك تريد حذف الحساب {{ $user->first_name }} ؟ سيتم إزالة كل البيانات الخاصة به بشكل دائم.
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success swalDefaultSuccess">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
