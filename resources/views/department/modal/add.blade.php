<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة القسم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="margin-left: -44rem">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--                    @if($errors->any())--}}
                {{--                        <div class="alert alert-danger">--}}
                {{--                            <ul>--}}
                {{--                                @foreach($errors->all() as $error)--}}
                {{--                                    <li>{{ $error }}</li>--}}
                {{--                                @endforeach--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    @endif--}}
                <form action="{{ route('departmentSeeder.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">اسم القسم</label>
                        <input type="text" name="name" class="form-control" id="recipient-name"
                               placeholder="ادخل اسم القسم" required>
                    </div>
                    {{--                                        <div class="form-group">--}}
                    {{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
                    {{--                            <textarea class="form-control" id="message-text"></textarea>--}}
                    {{--                        </div>--}}


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-success swalDefaultSuccess">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--        <div class="container">--}}
{{--        <h2>Modal Example</h2>--}}
<!-- Trigger the modal with a button -->
<!-- Modal -->


{{--        <div class="modal fade" id="myModal" role="dialog">--}}
{{--            <div class="modal-dialog">--}}

{{--                <!-- Modal content-->--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                        <h4 class="modal-title">Modal Header</h4>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <p>Some text in the modal.</p>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


{{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">Recipient:</label>--}}
{{--                            <input type="text" class="form-control" id="recipient-name">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
{{--                            <textarea class="form-control" id="message-text"></textarea>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Send message</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    #####################################################################################################--}}
{{--    <div class="modal fade" id="modal-secondary">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content bg-secondary">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Secondary Modal</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <p>One fine body&hellip;</p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer justify-content-between">--}}
{{--                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-outline-light">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}
<!-- /.modal -->
