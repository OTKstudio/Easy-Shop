<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bienvenue USERS : {{ Auth::guard('web')->user()->name }}</h1>
    <a href="{{ route('user.logout') }}"
onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
    <form action="{{ route('user.logout') }}" method="POST" id="logout-form">@csrf</form>
</body>
</html>