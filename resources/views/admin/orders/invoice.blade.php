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
                    <h4 class="text-7 mb-0">Invoice</h4>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6"><strong>Date:</strong> {{ date('d/m/Y') }}</div>
                <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> {{ date('dmy') }}</div>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                    <address>
                        {{ SettingsHelper::info()->name }}<br />
                        {{ SettingsHelper::info()->address1 }}<br />
                        {{ SettingsHelper::info()->city }}, {{ SettingsHelper::info()->state }}, Pakistan<br />
                        {{ SettingsHelper::info()->email }}
                    </address>
                </div>
                <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                    <address>
                        {{ $order->fname.' '.$order->lname }}<br />
                        {{ $order->address1 }}<br />
                        {{ $order->city }}, {{ $order->state }}, Pakistan<br />
                        {{ $order->email }}
                    </address>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light">
                            <td class="col-4"><strong>Product</strong></td>
                            <td class="col-2"><strong>Carrat</strong></td>
                            <td class="col-2 text-center"><strong>Weight</strong></td>
                            <td class="col-1 text-center"><strong>Rate</strong></td>
                            <td class="col-2 text-end"><strong>Qty</strong></td>
                            <td class="col-2 text-end"><strong>Amount</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $order)
                        <tr>
                            <td class="col-4">{{ $order->product->name }}</td>
                            <td class="col-2 text-1">{{ $order->karats }}</td>
                            <td class="col-2 text-center">{{ $order->weight }}</td>
                            <td class="col-1 text-center">{{ SettingsHelper::info()->currency.number_format($order->price,2) }}</td>
                            <td class="col-2 text-end">{{ $order->qty }}</td>
                            <td class="col-2 text-end">{{ SettingsHelper::info()->currency.number_format($order->total,2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table border border-top-0 mb-0">
                    <tr class="bg-light">
                        <td class="text-end"><strong>Sub Total:</strong></td>
                        <td class="col-sm-2 text-end">{{ SettingsHelper::info()->currency.number_format($subTotal,2) }}</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>Tax:</strong></td>
                        <td class="col-sm-2 text-end">{{ SettingsHelper::info()->currency.number_format(SettingsHelper::info()->shipping,2) }}</td>
                    </tr>
                    <tr class="bg-light">
                        <td class="text-end"><strong>Total:</strong></td>
                        <td class="col-sm-2 text-end">{{ SettingsHelper::info()->currency.number_format(SettingsHelper::info()->shipping+$subTotal,2) }}</td>
                    </tr>
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
