@extends('admin.layouts.app')
@section('title', 'Users List')
@section('head')
    <style>
        .table td,
        .table th {
            vertical-align: initial;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header"></section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="" method="get" id="userForm">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search User" value="{{ $search }}">
                                <div class="input-group-append" onclick="document.getElementById('userForm').submit()">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                                </div>
                                 @can('create-user')
                                    <a href="{{ route('admin.user-management.create') }}" class="btn btn-primary ml-2"><i class="fa fa-plus"></i> Add New Users</a>
                                    @endcan
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><b>Users</b></h4>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>PhoneNo</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            @canAny(['update-user', 'delete-user'])
                                            <th>Action</th>
                                            @endcanAny
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_no }}</td>
                                                <td>
                                                    <span class="text-success font-weight-bold">
                                                        @if ($user->roles->isNotEmpty())
                                                            {{ $user->roles[0]->name }}
                                                        @else
                                                            You don't have a role
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($user->is_block == 0)
                                                    <span class="badge bg-success">Active</span>
                                                    @else
                                                    <span class="badge bg-danger">InActive</span>
                                                    @endif
                                                </td>
                                                @canAny(['update-user', 'delete-user'])
                                                <td>
                                                    @can('update-user')
                                                    <a href="{{ route('admin.user-management.edit',$user->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil text-white"></i>
                                                    </a>
                                                    @endcan
                                                    @can('delete-user')
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm remove-user"
                                                        name="{{ $user->id }}"><i class="fa fa-times"></i>
                                                    </a>
                                                    @endcan
                                                </td>
                                                @endcanAny
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix rights">
                                {!! $users->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <!-- User Remove | Swal Notification-->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove-user', function() {
                let id = $(this).attr('name');
                Swal.fire({
                    title: "Are You Sure?",
                    text: "Are you sure you want to delete this user?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    confirmButtonColor: '#28A745',
                    cancelButtonText: 'No, cancel!',
                    cancelButtonColor: '#DC3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = `{{ URL::to('admin/user-management/destroy/${id}') }}`;
                    }
                });
            });
        });
    </script>
@endsection
