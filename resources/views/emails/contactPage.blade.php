<!DOCTYPE html>
<html>

<head>
    <title>{{config('app.name', 'Laravel')}}</title>
</head>

<body>
    <p>Name : {{ $details['name'] }}</p>
    <p>Email : {{ $details['emailUser'] }}</p>

    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>

    <p>Thank you</p>
</body>

</html>
