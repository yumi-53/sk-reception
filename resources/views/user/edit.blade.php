<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h1>会員情報編集</h1>

    <form method="post" action="{{ route('user.update', $user) }}">
        @csrf
        @method('patch')
        <label for="name">氏名</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autocomplete="name" placeholder="田中 太郎">
    
        <label for="kana">フリガナ</label>
        <input type="text" name="kana" id="kana" value="{{ old('kana', $user->kana) }}" required pattern="\A[ァ-ヴー\s]+\z" title="フリガナは全角カタカナで入力してください。" placeholder="タナカ タロウ">
        
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="taro.tanaka@example.com">

        <button type="submit">更新</button>
    </form>

</body>

</html>