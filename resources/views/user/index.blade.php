<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <p>{{ $user->name }}さん</p>
    <p>会員情報</p>
    <a href="{{ route('user.edit', $user) }}">編集</a>
    <p>QRコード表示</p>

    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    @if (session('error_message'))
        <p>{{ session('error_message') }}</p>
    @endif

</body>

</html>