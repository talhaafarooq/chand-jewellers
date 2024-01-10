@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ number_format($totalCategories) }}</h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ number_format($totalSubCategories) }}</h3>
                                <p>Sub Categories</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.sub-categories.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ number_format($totalProducts) }}</h3>
                                <p>Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.products.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ number_format($totalOrders) }}</h3>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.orders.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ number_format($totalNewOrders) }}</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.orders.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ number_format($totalSubscribers) }}</h3>
                                <p>Total Subscribers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.subscribers.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ number_format($totalContatUs) }}</h3>
                                <p>Total Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.contact-us.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ number_format($totalVisitors) }}</h3>
                                <p>Total Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('admin.visitors.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row mb-2">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="all"><b>ALL</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn btn-success"
                                                name="received"><b>RECEIVED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="dispatch"><b>DISPATCHED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="cancel"><b>CANCELLED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn"
                                                name="deliver"><b>DELIVERED</b></button>
                                        </div>
                                    </div>
                                    <div class="row orders-table-section d-none" id="all-orders">
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
                                                        <th>Address</th>
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
                                                            <td>{{ $order->address1 }}</td>
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
                                    <div class="row orders-table-section" id="received-orders">
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
                                                        <th>Address</th>
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
                                                            <td>{{ $order->address1 }}</td>
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
                                                        <th>Address</th>
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
                                                            <td>{{ $order->address1 }}</td>
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
                                                        <th>Address</th>
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
                                                            <td>{{ $order->address1 }}</td>
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
                                                        <th>Address</th>
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
                                                            <td>{{ $order->address1 }}</td>
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
