@extends('admin.layouts.app')
@section('title', 'Role Management/Edit Role')
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
                                <h4><b>Role Management</b> / <small>Edit Role</small></h4>
                            </div>
                            <form action="{{ route('admin.roles.update',$edit->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="role_name">Role Name *</label>
                                            <input type="text" name="role_name" id="role_name" class="form-control"
                                                placeholder="Role Name" value="{{ $edit->name }}" required>
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
                                                                            id="category_create" value="create-category" {{ in_array('create-category', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_read" value="view-categories" {{ in_array('view-categories', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_update" value="update-category" {{ in_array('update-category', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="category_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="category_delete" value="delete-category" {{ in_array('delete-category', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            value="create-subcategory" {{ in_array('create-subcategory', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_read"
                                                                            value="view-subcategories" {{ in_array('view-subcategories', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_update"
                                                                            value="update-subcategory" {{ in_array('update-subcategory', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="sub_category_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="sub_category_delete"
                                                                            value="delete-subcategory" {{ in_array('delete-subcategory', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="products_create" value="create-product" {{ in_array('create-product', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_read" value="view-products" {{ in_array('view-products', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_update" value="update-product" {{ in_array('update-product', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="products_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="products_delete" value="delete-product" {{ in_array('delete-product', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="order_create" value="create-order" {{ in_array('create-order', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_read" value="view-orders" {{ in_array('view-orders', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_update" value="update-order" {{ in_array('update-order', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="order_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="order_delete" value="delete-order" {{ in_array('delete-order', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            value="create-website-subscriber" {{ in_array('create-website-subscriber', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_read"
                                                                            value="view-website-subscribers" {{ in_array('view-website-subscribers', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_update"
                                                                            value="update-website-subscriber" {{ in_array('update-website-subscriber', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_subscriber_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_subscriber_delete"
                                                                            value="delete-website-subscriber" {{ in_array('delete-website-subscriber', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            value="create-website-contact" {{ in_array('create-website-contact', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_read"
                                                                            value="view-website-contacts" {{ in_array('view-website-contacts', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_update"
                                                                            value="update-website-contact" {{ in_array('update-website-contact', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_contacts_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_contacts_delete"
                                                                            value="delete-website-contact" {{ in_array('delete-website-contact', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            value="create-website-visitor" {{ in_array('create-website-visitor', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_read"
                                                                            value="view-website-visitors" {{ in_array('view-website-visitors', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_update"
                                                                            value="update-website-visitor" {{ in_array('update-website-visitor', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_visitors_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_visitors_delete"
                                                                            value="delete-website-visitor" {{ in_array('delete-website-visitor', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            value="create-website-feedback" {{ in_array('create-website-feedback', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_read"
                                                                            value="view-website-feedbacks" {{ in_array('view-website-feedbacks', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_update"
                                                                            value="update-website-feedback" {{ in_array('update-website-feedback', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="website_feedbacks_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="website_feedbacks_delete"
                                                                            value="delete-website-feedback" {{ in_array('delete-website-feedback', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="role_create" value="create-role" {{ in_array('create-role', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_read" value="view-roles" {{ in_array('view-roles', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_update" value="update-role" {{ in_array('update-role', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="role_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="role_delete" value="delete-role" {{ in_array('delete-role', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="user_create" value="create-user" {{ in_array('create-user', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_read" value="view-users" {{ in_array('view-users', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_update" value="update-user" {{ in_array('update-user', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="user_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="user_delete" value="delete-user" {{ in_array('delete-user', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="settings_create" value="create-setting" {{ in_array('create-setting', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_read" value="view-setting" {{ in_array('view-setting', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_update" value="update-setting" {{ in_array('update-setting', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="settings_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="settings_delete" value="delete-setting" {{ in_array('delete-setting', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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
                                                                            id="about_create" value="create-about" {{ in_array('create-about', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Create
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_read">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_read" value="view-about" {{ in_array('view-about', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}> Read
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_update">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_update" value="update-about" {{ in_array('update-about', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                                        Update
                                                                    </label>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="about_delete">
                                                                        <input type="checkbox" name="permissions[]"
                                                                            id="about_delete" value="delete-about" {{ in_array('delete-about', $edit->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
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

