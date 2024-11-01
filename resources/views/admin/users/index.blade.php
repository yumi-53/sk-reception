<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="{{ asset('/js/user-modal.js') }}"></script>
</head>
<body>
<table>
    @if (session('flash_message'))
        <p>{{ session('flash_message') }}</p>
    @endif

    @if (session('error_message'))
        <p>{{ session('error_message') }}</p>
    @endif

    <!-- ユーザー削除用モーダル -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-footer">
                    <form action="" method="post" name="deleteUserForm">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn text-white shadow-sm">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <td><a href="#" class="link-secondary" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-category-id="{{ $user->id }}" data-category-name="{{ $user->name }}">削除</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}

</body>
</html>
