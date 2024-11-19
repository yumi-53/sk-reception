@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('/js/user-modal.js') }}"></script>
    <script src="{{ asset('/js/reception-modal.js') }}"></script>
@endpush

@section('content')
<!-- カテゴリの編集用モーダル -->
<div class="modal fade" id="createReceptionModal" tabindex="-1" aria-labelledby="createReceptionModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createReceptionModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-footer">
            <form method="post" action="{{ route('admin.reception.store') }}" name="createReceptionForm">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="">
                    <button type="submit" class="btn text-white shadow-sm sk-btn">受付</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ユーザーの削除用モーダル -->
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
                    @method('DELETE')
                    <button type="submit" class="btn text-white shadow-sm sk-btn">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col container">
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-10 col-lg-11">
            <h2 class="mb-4 text-center">会員一覧</h2>
            
            <hr class="mb-4">

            <!-- keyword -->
            <div class="d-flex justify-content-between align-items-end">
                <form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="氏名・フリガナで検索" name="keyword" value="{{ $keyword }}">
                        <button type="submit" class="btn text-white shadow-sm sk-btn">検索</button>
                    </div>
                </form>
            </div>

            <div>
                <p class="mb-4">計{{ number_format((float)$total) }}件   
                    <span class="fs-6">
                        @if ($total > 15)
                            （{{ 15 * $users->currentPage() - 14 }}～{{ 15 * $users->currentPage() }}件）
                        @endif
                    </span>
                </p>
            </div>


            @if (session('flash_message'))
            <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ session('flash_message') }}</p>
            </div>
            @endif

            @if (session('error_message'))
            <div class="alert alert-info" role="alert">
                <p class="mb-0">{{ session('error_message') }}</p>
            </div>
            @endif

            <table class="table table-hover mb-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">氏名</th>
                        <th scope="col">フリガナ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->kana }}</td>
                            <td><a href="#" class="link-secondary" data-bs-toggle="modal" data-bs-target="#createReceptionModal" data-reception-id="{{ $user->id }}" data-reception-name="{{ $user->name }}">受付</a></td>
                            <td><a href="{{ route('admin.users.edit', $user) }}">編集</a></td>
                            <td><a href="#" class="link-secondary" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">削除</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
