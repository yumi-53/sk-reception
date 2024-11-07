@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('/js/user-modal.js') }}"></script>
@endpush

@section('content')

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
                <p class="mb-0">計{{ number_format((float)$total) }}件</p>
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

            <div class="d-flex justify-content-center">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
