@extends('admin.layouts.app')
@section('title', 'Orders Report')
@section('head')
    <!-- Report CSS -->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/reports/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/reports/css/rome.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/reports/css/style.css') }}">
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
                                <h3 class="card-title">Orders Report</h3>
                            </div>
                            <form action="{{ route('admin.find-report') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_from">From</label>
                                                <input type="text" name="from_date" class="form-control" id="input_from"
                                                    placeholder="Start Date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="input_from">To</label>
                                                <input type="text" name="to_date" class="form-control" id="input_to"
                                                    placeholder="End Date" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success pl-3 pr-3">Find Report</button>
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
    <!-- Report JS -->
    <script src="{{ URL::asset('dashboard/reports/js/rome.js') }}"></script>
    <script src="{{ URL::asset('dashboard/reports/js/main.js') }}"></script>
@endsection
