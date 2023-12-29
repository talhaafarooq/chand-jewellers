@php
    use App\Models\Settings;
    $settings = Settings::select('website', 'phone1')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h4>Order# {{ $data['order_no'] }}</h4>
    <p>Thank You for Your Purchase!
        We are getting your order ready to be shipped. We will notify you when it has been dispatched.
        Tracking details will be shared soon.</p>
    <p>View Your Order Or <a href="{{ $settings->website }}">Visit our website</a></p>
    <p>For any query, feel free to contact us at: {{ $settings->phone1 }} (10am to 6pm)</p>
</body>

</html>
