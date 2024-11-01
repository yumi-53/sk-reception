<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRコードのテスト</title>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <video id="video" autoplay muted playsinline></video>
    <canvas id="camera-canvas"></canvas>
    <canvas id="rect-canvas"></canvas>
    <div id="qr-msg">QRコード: 見つかりません</div>
    <form method="post" action="{{ route('admin.reception.store') }}" name="login">
        @csrf
        <input type="hidden" id="user_id" name="user_id" value="">
    </form>
    <script src="{{ asset('/js/jsQR.js') }}"></script>
    <script src="{{ asset('/js/reception.js') }}"></script>
</body>
</html>
