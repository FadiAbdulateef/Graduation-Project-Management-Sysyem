@include('supervisor.modal.edit')
@include('supervisor.modal.delete')
<tr>
<td>{{$supervisor->id}}</td>
<td>{{$supervisor->first_name}} {{$supervisor->last_name}}</td>
{{--                                            <td>{{$supervisor->last_name}}</td>--}}
<td>{{$supervisor->email}}</td>
<td>{{$supervisor->department->name}}</td>
<td>@if($supervisor->is_external==0)
داخلي
@else
خارجي
@endif
</td>
<td>{{$supervisor->for_year}}</td>
<td>{{$supervisor->created_at }}</td>
<td>
<div class="btn-group">
<button type="button" class="btn btn-default">العمليات</button>
<button type="button"
class="btn btn-default dropdown-toggle dropdown-icon"
data-toggle="dropdown" aria-expanded="false">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu" role="menu" style="">
<button type="button" class="btn btn-block btn-outline-primary"
data-effect="effect-scale"
data-toggle="modal" href="#edit{{$supervisor->id}}">
تعديل
</button>
<button type="button" class="btn btn-block btn-outline-danger"
data-effect="effect-scale"
data-toggle="modal" href="#delete{{$supervisor->id}}">
حذف
</button>
</div>
</div>
{{--                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"--}}
{{--                                        data-toggle="modal" href="#edit{{$supervisor->id}}">تعديل<i--}}
{{--                                                    class="las la-pen"></i></a>--}}
{{--                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--                                        data-toggle="modal" href="#delete{{$supervisor->id}}">حذف<i--}}
{{--                                                    class="las la-trash"></i></a>--}}
</td>
</tr>

