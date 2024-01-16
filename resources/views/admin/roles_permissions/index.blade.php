@extends('admin.layouts.app')
@section('title', 'Roles List')
@section('head')
    <style>
        .table-bordered> :not(caption)>* {
            border-color: #dee2e6 !important;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="" method="get" id="RoleForm">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search Role" value="{{ $search }}">
                                <div class="input-group-append" onclick="document.getElementById('RoleForm').submit()">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                                </div>
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-info ml-2"><i class="fa fa-plus"></i> Add New Role</a>
                            </div>
                        </form>
                    </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Roles List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $key=>$role)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <button type="button" name="{{ $role->id }}" class="btn btn-danger btn-sm remove-role"><i class="fa fa-times"></i></button>
                                                <a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil text-white"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-danger text-center font-weight-bold">No Permissions...</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $roles->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
    <!-- Role Remove | Swal Notification-->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove-role', function() {
                let id = $(this).attr('name');
                Swal.fire({
                    title: "Are You Sure?",
                    text: "Are you sure you want to delete this role?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    confirmButtonColor: '#28A745',
                    cancelButtonText: 'No, cancel!',
                    cancelButtonColor: '#DC3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = `{{ URL::to('admin/roles/destroy/${id}') }}`;
                    }
                });
            });
        });
    </script>
@endsection
