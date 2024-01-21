@extends('admin.layouts.app')
@section('title', 'Website Contact-Us')
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
                                                <th>Cell NO</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                @can('update-website-contact')
                                                <th>Status</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($contactUsList as $contact)
                                                <tr>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>
                                                        @isset($contact->cell_no)
                                                            {{ $contact->cell_no }}
                                                        @else
                                                            N/A
                                                        @endisset
                                                    </td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    @can('update-website-contact')
                                                    <td>
                                                        @if ($contact->complete == 0)
                                                            <a href="{{ route('admin.update-contact-status', $contact->id) }}"
                                                                class="btn btn-success">Complete</a>
                                                        @else
                                                            <a href="{{ route('admin.update-contact-status', $contact->id) }}"
                                                                class="btn btn-danger">InComplete</a>
                                                        @endif
                                                    </td>
                                                    @endcan
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
