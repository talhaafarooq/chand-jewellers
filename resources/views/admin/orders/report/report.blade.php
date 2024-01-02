<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('dashboard/invoice') }}/images/favicon.png" rel="icon" />
    <title>{{ SettingsHelper::info()->name }} - Invoice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/invoice') }}/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/invoice') }}/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('dashboard/invoice') }}/stylesheet.css" />
    <style>
        .invoice-container {
            max-width: 1000px !important;
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="{{ URL::asset('dashboard/invoice') }}/logo.png" title="Koice"
                        alt="Koice" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="text-7 mb-0">Report</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>From:</strong> {{ date('d F, Y', strtotime($fromDate)) }}</div>
                <div class="col-sm-6 text-sm-end"> <strong>To:</strong> {{ date('d F, Y', strtotime($toDate)) }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-start order-sm-1"> <strong>Report By:</strong>
                    <address>
                        {{ SettingsHelper::info()->name }}<br />
                        {{ SettingsHelper::info()->address1 }}<br />
                        {{ SettingsHelper::info()->city }}, {{ SettingsHelper::info()->state }}, Pakistan<br />
                        {{ SettingsHelper::info()->email }}
                    </address>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light" align="center">
                            <td class="col-2"><b>Sr.</b></td>
                            <td class="col-2"><b>Order#</b></td>
                            <td class="col-2"><b>T.Products</b></td>
                            <td class="col-2"><b>Qty</b></td>
                            <td class="col-4"><b>Amount</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr align="center">
                                <td class="col-2">{{ ++$key }}</td>
                                <td class="col-2">{{ $order->order_no }}</td>
                                <td class="col-2">{{ $order->orderDetails->count('order_id') }}</td>
                                <td class="col-2">{{ number_format($order->orderDetails->sum('qty'), 2) }}</td>
                                <td class="col-4">
                                    {{ SettingsHelper::info()->currency . number_format($order->orderDetails->sum('total'), 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                signature.</p>
            <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                    class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print &
                    Download</a> </div>
        </footer>
    </div>
</body>

</html>
