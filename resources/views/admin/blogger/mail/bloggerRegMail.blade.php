<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card" style="width: 100%;height: 100vh">
        <h3>Hello {{$mailData->name}}</h3>
        <h4>Hello {{$mailData->email}}</h4>
        <br>
        <br>
        <a href="{{route('admin.blogger.account.compare',$mailData->token)}}">Create Account</a>
        <br>
        <br>
        or,
        <br>
        <br>
        <p>Click here, <a href="{{route('admin.blogger.account.compare',$mailData->token)}}">{{route('admin.blogger.account.compare',$mailData->token)}}</a></p>
        <br>
        <br>
        <p>This email will expire in 60 minute</p>
    </div>
</body>
</html>
