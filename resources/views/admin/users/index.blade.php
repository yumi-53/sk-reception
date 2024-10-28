<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<table>
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    @if (session('error_message'))
        <p>{{ session('error_message') }}</p>
    @endif

    <thead>
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>フリガナ</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->kana }}</td>
                <td><a href="{{ route('admin.users.edit', $user) }}">編集</a></td>
                <td>削除</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}

</body>
</html>
