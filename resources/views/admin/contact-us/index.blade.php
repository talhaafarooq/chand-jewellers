@extends('admin.layouts.app')
@section('title', 'Website Contact-Us')
@section('head')
    <style>
        .table-bordered > :not(caption) > * {
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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Contact-Us</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contactUsList as $contact)
                                                <tr>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>
                                                        @if ($contact->complete == 0)
                                                            <a href="{{ route('admin.update-contact-status',$contact->id) }}" class="btn btn-danger">InComplete</a>
                                                            @else
                                                            <a href="{{ route('admin.update-contact-status',$contact->id) }}" class="btn btn-success">Complete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" align="center" class="text-danger">No Record...</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {!! $contactUsList->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
