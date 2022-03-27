@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê nhân viên
            </div>
           {{-- <div class="row w3-res-tb">
                --}}{{--<div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>--}}{{--
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>--}}
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        {{--<th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>--}}

                        <th>Tên nhân viên</th>
                        <th>Email đăng nhập</th>
                        <th>Số điện thoại</th>
                        <th>Mật khẩu</th>
                        <th>Admin</th>
                        <th>Nhân viên</th>

                        {{--<th>User</th>--}}

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $key => $staff)
                        <form action="{{url('/staff-roles')}}" method="POST">
                            @csrf
                            <tr>

                               {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>--}}

                                <td>{{ $staff->admin_name }}</td>
                                <td>{{ $staff->admin_email }}
                                    <input type="hidden" name="admin_email" value="{{ $staff->admin_email }}">
                                    <input type="hidden" name="admin_id" value="{{ $staff->admin_id }}">
                                </td>
                                <td>{{ $staff->admin_phone }}</td>
                                <td>{{ $staff->admin_password }}</td>


                                <td><input type="checkbox" name="admin_role"  {{$staff->hasRole('admin') ? 'checked' : ''}}></td>{{-- khi có quyền admin sẽ check còn lại thì ko--}}
                                <td><input type="checkbox" name="staff_role" {{$staff->hasRole('nhân viên') ? 'checked' : ''}}></td>

                                {{--<td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>--}}

                                <td>


                                    <p>
                                        <input type="submit" value="Cấp quyền" class="btn btn-sm btn-default">
                                    </p>
                                    <br>
                                    <p>
                                        <a class="btn btn-danger" href="{{url('/delete-staff/'.$staff->admin_id)}}">Xóa</a>

                                    </p>

                                </td>

                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {!!$admin->links()!!}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
