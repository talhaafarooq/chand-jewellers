@extends('admin.layouts.app')
@section('title', 'Out Of Stock Products')
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
                                <h3 class="card-title">Out Of Stock Products</h3>
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
                                                        <th>Sku</th>
                                                        <th>Category / Sub Category</th>
                                                        <th>Old Price / New Price</th>
                                                        <th>Alert Qty</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                @forelse ($totalOutOfStocksProducts as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->sku }}</td>
                                                    <td>{{ $product->category->name }} / {{ $product->subCategory->name }}</td>
                                                    <td>{{ $product->old_price }} / {{ $product->new_price }}</td>
                                                    <td>{{ $product->alert_qty }}</td>
                                                    <td>
                                                        @if ($product->status==0)
                                                        <span class="badge bg-success">Active</span>
                                                        @else
                                                        <span class="badge bg-danger">InActive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" name="{{ $product->id }}" class="btn btn-danger btn-sm remove-product"><i class="fa fa-times"></i></button>
                                                        <a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil text-white"></i></button>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" align="center" class="text-danger">No Record...</td>
                                                </tr>
                                                @endforelse
                                               </tbody>
                                            </table>
                                            {!! $totalOutOfStocksProducts->links('pagination::bootstrap-5') !!}
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