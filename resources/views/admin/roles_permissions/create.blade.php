@extends('admin.layouts.app')
@section('title', 'Role Management/Create New Role')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><b>Role Management</b> / <small>Create New Role</small></h4>
                            </div>
                            <form action="{{ URL::to('admin/roles') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="role_name">Role Name *</label>
                                            <input type="text" name="role_name" id="role_name" class="form-control"
                                                placeholder="Role Name" value="{{ old('role_name') }}" required>
                                            @error('role_name')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                            <h5><b>Role Permissions *</b></h5>
                                            <!-- Access All permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Administrator Access</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <label for="selectAll">
                                                                <input type="checkbox" name="all" id="selectAll">
                                                                Select All
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            @error('permissions')
                                                                @foreach ($message->all() as $error)
                                                                    <font color="red">{{ $error }}</font>
                                                                @endforeach
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Categories permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Categories</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="category_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_create" value="create-category">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_read" value="view-categories">
                                                                        Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_update" value="update-category">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_delete" value="delete-category">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- SubCategories permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Sub Categories</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="sub_category_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_create"
                                                                            value="create-subcategory">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_read"
                                                                            value="view-subcategories">
                                                                        Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_update"
                                                                            value="update-subcategory">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_delete"
                                                                            value="delete-subcategory">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Products permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Products</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="products_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_create" value="create-product">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_read" value="view-products"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_update" value="update-product">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_delete" value="delete-product">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Orders permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Orders</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="order_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_create" value="create-order">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_read" value="view-orders"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_update" value="update-order">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_delete" value="delete-order">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Website Subscribers permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Subscribers</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_create"
                                                                            value="create-website-subscriber">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_read"
                                                                            value="view-website-subscribers"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_update"
                                                                            value="update-website-subscriber">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_delete"
                                                                            value="delete-website-subscriber">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Website Contacts permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Website Contacts</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="website_contacts_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_create"
                                                                            value="create-website-contact">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_read"
                                                                            value="view-website-contacts"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_update"
                                                                            value="update-website-contact">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_delete"
                                                                            value="delete-website-contact">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Website Visitors permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Website Visitors</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="website_visitors_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_create"
                                                                            value="create-website-visitor">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_read"
                                                                            value="view-website-visitors"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_update"
                                                                            value="update-website-visitor">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_delete"
                                                                            value="delete-website-visitor">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Products Feedbacks permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Products Feedbacks</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_create"
                                                                            value="create-website-feedback">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_read"
                                                                            value="view-website-feedbacks"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_update"
                                                                            value="update-website-feedback">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_delete"
                                                                            value="delete-website-feedback">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Roles management permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Roles management</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="role_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_create" value="create-role">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_read" value="view-roles"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_update" value="update-role">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_delete" value="delete-role">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Users management permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Users management</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="user_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_create" value="create-user">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_read" value="view-users"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_update" value="update-user">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_delete" value="delete-user">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Settings permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>Settings</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="settings_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_create" value="create-setting">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_read" value="view-setting"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_update" value="update-setting">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_delete" value="delete-setting">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- About Us permissions -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <h5>About Us</h5>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label for="about_create">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_create" value="create-about">
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_read" value="view-about"> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_update" value="update-about">
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_delete" value="delete-about">
                                                                        Delete
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="action"
                                        value="create">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#role_name').keydown(function(e) {
                if (e.key === '-') {
                    e.preventDefault();
                }
            });
            $('#selectAll').change(function() {
                // Check or uncheck all checkboxes with name 'permissions[]'
                $('input[name="permissions[]"]').prop('checked', $(this).prop('checked'));
            });

            // If any checkbox with name 'permissions[]' is unchecked, uncheck 'selectAll'
            $('input[name="permissions[]"]').change(function() {
                if (!$('input[name="permissions[]"]:not(:checked)').length) {
                    $('#selectAll').prop('checked', true);
                } else {
                    $('#selectAll').prop('checked', false);
                }
            });
        });
    </script>
@endsection
