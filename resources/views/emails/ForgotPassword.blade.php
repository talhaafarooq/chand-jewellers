<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password Mail</title>
</head>

<body>
    <h3>Dear# {{ $user->first_name.' '.$user->last_name }}</h3>
    <p>A sign in attempt requires further verification because we did not recognize your device. To complete the sign in, enter the verification code on the unrecognized device.</p>
    <p>Verification code: {{ $code }}</p>
    <p>For any query, feel free to contact us at: {{ SettingsHelper::info()->phone1 }} (10am to 6pm)</p>
    <p> <a href="{{ SettingsHelper::info()->website }}">Visit our website</a></p>
    <p>Thanks,</p>
    <p>Team {{ SettingsHelper::info()->name }}</p>
</body>

</html>
