@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-4 col-md-5 col-sm-7">
            <h2 class="mb-4 text-center">会員情報編集</h2>

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

    <form method="post" action="{{ route('user.update', $user) }}">
        @csrf
        @method('patch')
        <div class="form-group row mb-3">
            <label for="name" class="col-md-5 col-form-label text-md-left fw-bold">
                <div class="d-flex align-items-center">
                    <span class="me-1">氏名</span>
                </div>
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required autocomplete="name" placeholder="田中 太郎">
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="kana" class="col-md-5 col-form-label text-md-left fw-bold">
                <div class="d-flex align-items-center">
                    <span class="me-1">フリガナ</span>
                </div>
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="kana" id="kana" value="{{ old('kana', $user->kana) }}" required pattern="^[ァ-ヴー\s]+$" title="フリガナは全角カタカナで入力してください。" placeholder="タナカ タロウ">
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="kana" class="col-md-5 col-form-label text-md-left fw-bold">
                <div class="d-flex align-items-center">
                    <span class="me-1">メールアドレス</span>
                </div>
            </label>
            <div class="col-md-7">
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="taro.tanaka@example.com">
            </div>
        </div>

        <hr class="my-4">

        <div class="form-group d-flex justify-content-center mb-4">
            <button type="submit" class="btn text-white shadow-sm w-100 sk-btn">
                更新
            </button>
        </div>
    </form>
@endsection