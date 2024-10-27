<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1 class="mb-4 text-center">ログイン</h1>
    @if ($errors->any())
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-group mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>
        </div>
        <div class="form-group mb-3">
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="パスワード">
        </div>
        <div class="form-group mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        次回から自動的にログインする
                    </label>
                </div>
        </div>
        <div class="form-group d-flex justify-content-center mb-4">
            <button type="submit" class="btn text-white shadow-sm w-100 nagoyameshi-btn">ログイン</button>
        </div>
    </form>

    </body>
</html>

