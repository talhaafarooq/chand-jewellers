<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Delivered</title>
</head>

<body>
    <h4>Order# {{ $data['orderNo'] }}</h4>
    <p>Thank You for Choosing {{ SettingsHelper::info()->name }}!</p>
    <p> We are getting your order ready to be shipped. Your order has been delivered.
        We hope you are enjoying your order and would love to hear what you think of your purchase. Your review will
        help many buyers to make the right choice.</p>

    <p>View Your Order Or <a href="{{ SettingsHelper::info()->website }}">Visit our website</a></p>
    <p>For any query, feel free to contact us at: {{ SettingsHelper::info()->phone1 }} (10am to 6pm)</p>
</body>

</html>
