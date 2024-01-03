@extends('admin.layouts.app')
@section('title', 'Website Visitors List')
@section('head')
    <style>
        .visitor-title{
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
                                <div class="pull-left">
                                    <h4 class="h4 visitor-title">Visitors</h4>
                                </div>
                                <div class="pull-right">
                                    <span class="btn btn-outline-primary ml-auto add-new-btn"><b>Today Visitor: {{ $todayVisitors }}</b></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Region.Name</th>
                                            <th>IP.Address</th>
                                            <th>Visit.Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($visitors as $key=>$visitor)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $visitor->country }}</td>
                                                <td>{{ $visitor->city }}</td>
                                                <td>{{ $visitor->region_name }}</td>
                                                <td>{{ $visitor->ip_address }}</td>
                                                <td>{{ $visitor->visit }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" align="center" class="text-danger font-weight-bold">No Visitor...</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {!! $visitors->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
