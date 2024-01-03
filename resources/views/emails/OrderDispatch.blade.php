<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Dispatch</title>
</head>

<body>
    <h4>Order# {{ $data['orderNo'] }}</h4>
    <p>Your order has been dispatched by {{ SettingsHelper::info()->name }}. Keep your mobile phone active.
        {{ $data['tracking_company'] }} Tracking number: {{ $data['tracking_no'] }}</p>

    <p>View Your Order Or <a href="{{ SettingsHelper::info()->website }}">Visit our website</a></p>
    <p>For any query, feel free to contact us at: {{ SettingsHelper::info()->phone1 }} (10am to 6pm)</p>
</body>

</html>
