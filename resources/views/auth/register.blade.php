@extends('layouts.app')

@section('content')
<div class="container pt-4 pb-5 nagoyameshi-container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <h2 class="mb-4 text-center">新規会員登録</h2>

            <hr class="mb-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
            @csrf
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">氏名</span>
                            <span class="badge bg-danger">必須</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="田中 太郎">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="kana" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">フリガナ</span>
                            <span class="badge bg-danger">必須</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana') }}" required pattern="\A[ァ-ヴー\s]+\z" title="フリガナは全角カタカナで入力してください。" placeholder="タナカ タロウ">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">メールアドレス</span>
                            <span class="badge bg-danger">必須</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="tanaka.taro@example.com">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">パスワード</span>
                            <span class="badge bg-danger">必須</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">パスワード（確認用）</span>
                            <span class="badge bg-danger">必須</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-group d-flex justify-content-center mb-4">
                    <button type="submit" class="btn text-white shadow-sm w-50 sk-btn">
                        登録
                    </button>
                </div>
            </form>

            <div class="text-center">
                <a href="{{ route('login') }}">
                    すでに登録済みの方はこちら
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
