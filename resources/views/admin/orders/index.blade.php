@extends('admin.layouts.app')
@section('title', 'Orders List')
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
                        <form action="" method="get" id="orderForm">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search By Name or Cell No" value="{{ $search }}">
                                <div class="input-group-append" onclick="document.getElementById('orderForm').submit()">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row mb-2">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn btn-primary pl-4 pr-4 order-btn btn-success"
                                                name="all"><b>ALL</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="received"><b>RECEIVED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="dispatch"><b>DISPATCHED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="cancel"><b>CANCELLED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="deliver"><b>DELIVERED</b></button>
                                        </div>
                                    </div>
                                    <div class="row orders-table-section" id="all-orders">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Order Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($allOrders as $key=>$order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price) }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                @if ($order->status->value == 'received')
                                                                    <span
                                                                        class="badge bg-primary">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'dispatched')
                                                                    <span
                                                                        class="badge bg-warning">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'cancelled')
                                                                    <span
                                                                        class="badge bg-danger">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'delivered')
                                                                    <span
                                                                        class="badge bg-success">{{ $order->status->value }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#orderProductsModal1{{ $key }}"
                                                                    class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-th-list"></i></a>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></a>


                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="orderProductsModal1{{ $key }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Order Products
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Product Name</th>
                                                                                            <th>Image</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Note</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($order->orderDetails as $orderDetails)
                                                                                            <tr>
                                                                                                <td>{{ $orderDetails->product->name }}
                                                                                                </td>
                                                                                                <td><img src="{{ URL::asset('storage/' . $orderDetails->product->front_img) }}"
                                                                                                        width="40px"></td>
                                                                                                <td>{{ $orderDetails->qty }}
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->price }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @isset($order->notes)
                                                                                                        {{ $order->notes }}
                                                                                                    @else
                                                                                                        N/P
                                                                                                    @endisset
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" align="center" class="text-danger">No
                                                                Record...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $allOrders->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                    <div class="row orders-table-section d-none" id="received-orders">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Order Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($receivedOrders as $key=>$order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price) }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                @if ($order->status->value == 'received')
                                                                    <span
                                                                        class="badge bg-primary">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'dispatched')
                                                                    <span
                                                                        class="badge bg-warning">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'cancelled')
                                                                    <span
                                                                        class="badge bg-danger">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'delivered')
                                                                    <span
                                                                        class="badge bg-success">{{ $order->status->value }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#orderProductsModal2{{ $key }}"
                                                                    class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-th-list"></i></a>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></a>


                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="orderProductsModal2{{ $key }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Order Products
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Product Name</th>
                                                                                            <th>Image</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Note</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($order->orderDetails as $orderDetails)
                                                                                            <tr>
                                                                                                <td>{{ $orderDetails->product->name }}
                                                                                                </td>
                                                                                                <td><img src="{{ URL::asset('storage/' . $orderDetails->product->front_img) }}"
                                                                                                        width="40px">
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->qty }}
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->price }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @isset($order->notes)
                                                                                                        {{ $order->notes }}
                                                                                                    @else
                                                                                                        N/P
                                                                                                    @endisset
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" align="center" class="text-danger">No
                                                                Record...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $receivedOrders->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                    <div class="row orders-table-section d-none" id="dispatch-orders">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Order Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($dispatchOrders as $key=>$order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price) }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                @if ($order->status->value == 'received')
                                                                    <span
                                                                        class="badge bg-primary">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'dispatched')
                                                                    <span
                                                                        class="badge bg-warning">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'cancelled')
                                                                    <span
                                                                        class="badge bg-danger">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'delivered')
                                                                    <span
                                                                        class="badge bg-success">{{ $order->status->value }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#orderProductsModal3{{ $key }}"
                                                                    class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-th-list"></i></a>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></a>


                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="orderProductsModal3{{ $key }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Order Products
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Product Name</th>
                                                                                            <th>Image</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Note</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($order->orderDetails as $orderDetails)
                                                                                            <tr>
                                                                                                <td>{{ $orderDetails->product->name }}
                                                                                                </td>
                                                                                                <td><img src="{{ URL::asset('storage/' . $orderDetails->product->front_img) }}"
                                                                                                        width="40px">
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->qty }}
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->price }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @isset($order->notes)
                                                                                                        {{ $order->notes }}
                                                                                                    @else
                                                                                                        N/P
                                                                                                    @endisset
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" align="center" class="text-danger">No
                                                                Record...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $dispatchOrders->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                    <div class="row orders-table-section d-none" id="cancel-orders">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Order Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($cancelOrders as $key=>$order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price) }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                @if ($order->status->value == 'received')
                                                                    <span
                                                                        class="badge bg-primary">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'dispatched')
                                                                    <span
                                                                        class="badge bg-warning">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'cancelled')
                                                                    <span
                                                                        class="badge bg-danger">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'delivered')
                                                                    <span
                                                                        class="badge bg-success">{{ $order->status->value }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#orderProductsModal4{{ $key }}"
                                                                    class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-th-list"></i></a>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></a>


                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="orderProductsModal4{{ $key }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Order Products
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Product Name</th>
                                                                                            <th>Image</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Note</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($order->orderDetails as $orderDetails)
                                                                                            <tr>
                                                                                                <td>{{ $orderDetails->product->name }}
                                                                                                </td>
                                                                                                <td><img src="{{ URL::asset('storage/' . $orderDetails->product->front_img) }}"
                                                                                                        width="40px">
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->qty }}
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->price }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @isset($order->notes)
                                                                                                        {{ $order->notes }}
                                                                                                    @else
                                                                                                        N/P
                                                                                                    @endisset
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" align="center" class="text-danger">No
                                                                Record...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $cancelOrders->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                    <div class="row orders-table-section d-none" id="deliver-orders">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Order#</th>
                                                        <th>Order Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($deliveredOrders as $key=>$order)
                                                        <tr>
                                                            <td>{{ $order->order_no }}</td>
                                                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price) }}
                                                            </td>
                                                            <td class="text-capitalize">
                                                                @if ($order->status->value == 'received')
                                                                    <span
                                                                        class="badge bg-primary">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'dispatched')
                                                                    <span
                                                                        class="badge bg-warning">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'cancelled')
                                                                    <span
                                                                        class="badge bg-danger">{{ $order->status->value }}</span>
                                                                @elseif ($order->status->value == 'delivered')
                                                                    <span
                                                                        class="badge bg-success">{{ $order->status->value }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#orderProductsModal5{{ $key }}"
                                                                    class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-th-list"></i></a>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></a>


                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="orderProductsModal5{{ $key }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Order Products
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table class="table table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Product Name</th>
                                                                                            <th>Image</th>
                                                                                            <th>Qty</th>
                                                                                            <th>Amount</th>
                                                                                            <th>Note</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($order->orderDetails as $orderDetails)
                                                                                            <tr>
                                                                                                <td>{{ $orderDetails->product->name }}
                                                                                                </td>
                                                                                                <td><img src="{{ URL::asset('storage/' . $orderDetails->product->front_img) }}"
                                                                                                        width="40px">
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->qty }}
                                                                                                </td>
                                                                                                <td>{{ $orderDetails->price }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @isset($order->notes)
                                                                                                        {{ $order->notes }}
                                                                                                    @else
                                                                                                        N/P
                                                                                                    @endisset
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" align="center" class="text-danger">No
                                                                Record...</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $deliveredOrders->links('pagination::bootstrap-5') !!}
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
    <!-- Show Diff Categories Orders -->
    <script>
        $(document).ready(function() {
            $('.order-btn').click(function() {
                var orderType = $(this).attr('name');
                if (!orderType) {
                    alert('Something went wrong');
                } else {
                    $('.order-btn').removeClass('btn-success');
                    $(this).addClass('btn-success');
                    $('.orders-table-section').addClass('d-none');
                    $('#' + orderType + '-orders').removeClass('d-none');
                }
            });
        });
    </script>
@endsection
