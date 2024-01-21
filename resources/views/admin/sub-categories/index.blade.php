@extends('admin.layouts.app')
@section('title', 'Sub-Categories List')
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
                        <form action="" method="get" id="subCategoryForm">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search Sub-Category" value="{{ $search }}">
                                <div class="input-group-append" onclick="document.getElementById('subCategoryForm').submit()">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                                </div>
                                @can('create-subcategory')
                                <a href="{{ route('admin.sub-categories.create') }}" class="btn btn-info ml-2"><i class="fa fa-plus"></i> Add New Sub Category</a>
                                @endcan
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub Categories Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        @canAny(['update-subcategory','delete-product'])
                                                        <th>Actions</th>
                                                        @endcanAny
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                @forelse ($subCategories as $subCategory)
                                                <tr>
                                                    <td>{{ $subCategory->name }}</td>
                                                    <td>{{ $subCategory->category->name }}</td>
                                                    @canAny(['update-subcategory','delete-product'])
                                                    <td>
                                                        @can('delete-product')
                                                        <button type="button" name="{{ $subCategory->id }}" class="btn btn-danger btn-sm remove-subcategory"><i class="fa fa-times"></i></button>
                                                        @endcan
                                                        @can('update-subcategory')
                                                        <a href="{{ route('admin.sub-categories.edit',$subCategory->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil text-white"></i></button>
                                                        @endcan
                                                    </td>
                                                    @endcanAny
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3" align="center" class="text-danger">No Record...</td>
                                                </tr>
                                                @endforelse
                                               </tbody>
                                            </table>
                                            {!! $subCategories->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <!-- Sub-Category Remove | Swal Notification-->
<script>
    $(document).ready(function() {
        $(document).on('click', '.remove-subcategory', function() {
            let id = $(this).attr('name');
            Swal.fire({
                title: "Are You Sure?",
                text: "Are you sure you want to delete this sub-category?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#28A745',
                cancelButtonText: 'No, cancel!',
                cancelButtonColor: '#DC3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `{{ URL::to('admin/sub-categories/destroy/${id}') }}`;
                }
            });
        });
    });

</script>
@endsection
