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
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row mb-2">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn btn-primary pl-4 pr-4 order-btn btn-success" name="all"><b>ALL</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn" name="received"><b>RECEIVED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn" name="dispatch"><b>DISPATCHED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn" name="cancel"><b>CANCELLED</b></button>
                                            <button class="btn btn-primary pl-4 pr-4 order-btn" name="deliver"><b>DELIVERED</b></button>
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
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($allOrders as $order)
                                                        <tr>
                                                            <td>#{{ $order->order_no }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price, 2) }}
                                                            </td>
                                                            <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
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
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></button>
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
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Order Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($receivedOrders as $order)
                                                        <tr>
                                                            <td>#{{ $order->order_no }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price, 2) }}
                                                            </td>
                                                            <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" align="center" class="text-danger">No
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
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Order Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($dispatchOrders as $order)
                                                        <tr>
                                                            <td>#{{ $order->order_no }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price, 2) }}
                                                            </td>
                                                            <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" align="center" class="text-danger">No
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
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Order Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($cancelOrders as $order)
                                                        <tr>
                                                            <td>#{{ $order->order_no }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price, 2) }}
                                                            </td>
                                                            <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" align="center" class="text-danger">No
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
                                                        <th>Customer Name</th>
                                                        <th>Phone# 1 / Phone# 2</th>
                                                        <th>Total Price</th>
                                                        <th>Order Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($deliveredOrders as $order)
                                                        <tr>
                                                            <td>#{{ $order->order_no }}</td>
                                                            <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                                            <td>

                                                                {{ $order->phone1 }}
                                                                @if ($order->phone2 != null)
                                                                    {{ ' / ' . $order->phone2 }}
                                                                @else
                                                                    {{ ' / N-A' }}
                                                                @endif
                                                            </td>
                                                            <td>{{ SettingsHelper::info()->currency . number_format($order->order_details_sum_price, 2) }}
                                                            </td>
                                                            <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fa fa-eye"></i></a>
                                                                <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                                    class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-pencil text-white"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" align="center" class="text-danger">No
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
            $('.order-btn').click(function(){
                var orderType = $(this).attr('name');
                if(!orderType)
                {
                    alert('Something went wrong');
                }else{
                    $('.order-btn').removeClass('btn-success');
                    $(this).addClass('btn-success');
                    $('.orders-table-section').addClass('d-none');
                    $('#'+orderType+'-orders').removeClass('d-none');
                }
            });
        });
    </script>
@endsection
