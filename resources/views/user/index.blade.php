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
    <div>
        <a href="{{ route('user.edit', $user) }}">編集</a>
    </div>
    
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        ログアウト
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <p>QRコードを生成（デフォルトは100）</p>
    {!! QrCode::size(200)->generate(url('admin/reception?id='.$user->id)) !!}

    <br>


    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    @if (session('error_message'))
        <p>{{ session('error_message') }}</p>
    @endif
    

</body>

</html>