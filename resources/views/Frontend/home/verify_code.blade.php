<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

لطفا کد تایید اعتبار را وارد نمایید
<form action="{{route('accept.verify')}}" method="post">
    @csrf
    <input type="text" value="" name="accept_code">
    <input type="text" value="{{$id}}" name="id">

    <button type="submit">submit code</button>
</form>
@if(Session::has('notmatch'))
    {{Session('notmatch')}}
@endif

@if(Session::has('used_code'))
    {{Session('used_code')}}
@endif
</body>
</html>
