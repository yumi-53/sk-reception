<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
@if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
@endif
<a href="{{ route('admin.reception.create') }}">受付</a>
</body>
</html>
