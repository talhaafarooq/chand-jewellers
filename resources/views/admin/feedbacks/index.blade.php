@extends('admin.layouts.app')
@section('title', 'Products Feedbacks')
@section('head')
    <style>
        .visitor-title {
            position: relative;
            top: 7px;
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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products Feedbacks</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Rating</th>
                                            <th>Product</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($feedbacks as $feedback)
                                            <tr>
                                                <td>{{ $feedback->name }}</td>
                                                <td>{{ $feedback->email }}</td>
                                                <td>{{ $feedback->website }}</td>
                                                <td>{{ $feedback->rating }}</td>
                                                <td><b>{{ $feedback->product->name }}</b></td>
                                                <td>{{ $feedback->message }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" align="center" class="text-danger font-weight-bold">No
                                                    Feedback...</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                {!! $feedbacks->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
