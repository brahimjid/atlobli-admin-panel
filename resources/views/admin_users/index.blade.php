@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor restaurantTitle">{{trans('lang.admin_plural')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('lang.admin_plural')}}</li>
            </ol>
        </div>
        <div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                            <li class="nav-item">
                                <a class="nav-link active" href="{!! url()->current() !!}"><i
                                        class="fa fa-list mr-2"></i>{{trans('lang.admin_table')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('admin.users.create') !!}"><i
                                        class="fa fa-plus mr-2"></i>{{trans('lang.create_admin')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive m-t-10">
                            <table id="adminTable"
                                class="display nowrap table table-hover table-striped table-bordered table table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <?php if (in_array('admin.users.delete', json_decode(@session('user_permissions'),true))) { ?>
                                        <th class="delete-all"><input type="checkbox" id="is_active"><label
                                                class="col-3 control-label" for="is_active">
                                                <a id="deleteAll" class="do_not_delete" href="javascript:void(0)"><i
                                                        class="mdi mdi-delete"></i> {{trans('lang.all')}}</a></label></th>
                                        <?php } ?>
                                        <th>{{trans('lang.name')}}</th>
                                        <th>{{trans('lang.email')}}</th>
                                        <th>{{trans('lang.role')}}</th>
                                        <th>{{trans('lang.actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody id="append_list1">
                                    @foreach($users as $user)
                                    <tr>
                                        <?php if (in_array('admin.users.delete', json_decode(@session('user_permissions'),true))) { ?>
                                        <td class="delete-all"><input type="checkbox" id="is_open_{{$user->id}}"
                                                class="is_open" dataid="{{$user->id}}"><label
                                                class="col-3 control-label" for="is_open_{{$user->id}}"></label>
                                        </td>
                                        <?php } ?>
                                        <td>
                                            <a href="{{route('admin.users.edit', ['id' => $user->id])}}">{{
                                                $user->name}}</a>
                                        </td>
                                        <td>
                                            {{ $user->email}}
                                        </td>
                                        <td>
                                            {{ $user->roleName}}
                                        </td>
                                        <td class="action-btn">
                                            <a href="{{route('admin.users.edit', ['id' => $user->id])}}"><i
                                                    class="mdi mdi-lead-pencil" title="Edit"></i></a>
                                             @if($user->id != 1)
                                            <?php if (in_array('admin.users.delete', json_decode(@session('user_permissions'),true))) { ?>
                                            <a href="{{route('admin.users.delete', ['id' => $user->id])}}" class="delete-btn"><i
                                                    class="mdi mdi-delete"></i></a>
                                             <?php } ?>     
                                             @endif  
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var user_permissions = '<?php echo @session("user_permissions")?>';
    user_permissions = Object.values(JSON.parse(user_permissions));
    var checkDeletePermission = false;
    if ($.inArray('admin.users.delete', user_permissions) >= 0) {
        checkDeletePermission = true;
    }
    if (checkDeletePermission) {
        $('#adminTable').DataTable({
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 4] },
            ],
            "language": {
                "zeroRecords": "{{trans("lang.no_record_found")}}",
                "emptyTable": "{{trans("lang.no_record_found")}}"
                        },
            responsive: true
        });
    }
    else
    {
        $('#adminTable').DataTable({
            order: [],
            columnDefs: [
                { orderable: false, targets: [3] },
            ],
            "language": {
                "zeroRecords": "{{trans("lang.no_record_found")}}",
                "emptyTable": "{{trans("lang.no_record_found")}}"
                        },
            responsive: true
        });
    }
    $("#is_active").click(function () {
        $("#adminTable .is_open").prop('checked', $(this).prop('checked'));
    });
    $("#deleteAll").click(function () {
        if ($('#adminTable .is_open:checked').length) {
            if (confirm('Are You Sure want to Delete Selected Data ?')) {
                var arrayUsers = [];
                $('#adminTable .is_open:checked').each(function () {
                    var dataId = $(this).attr('dataId');
                    arrayUsers.push(dataId);
                });
                arrayUsers = JSON.stringify(arrayUsers);
                var url = "{{url('admin-users/delete', 'id')}}";
                url = url.replace('id', arrayUsers);
                $(this).attr('href', url);
            }
        } else {
            alert('Please Select Any One Record .');
        }
    });
</script>
@endsection