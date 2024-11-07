@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('/js/user-modal.js') }}"></script>
@endpush

@section('content')

<div class="col container">
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-10 col-lg-11">
            <h2 class="mb-4 text-center">会員情報編集</h2>

            <hr class="mb-4">

            <form method="post" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('patch')
                <div class="form-group row mb-3">
                    <label for="name" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">氏名</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus placeholder="田中 太郎">
                    </div>
                </div>


                <div class="form-group row mb-3">
                    <label for="kana" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">フリガナ</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="text" class="form-control" id="kana" name="kana" value="{{ old('kana', $user->kana) }}" required pattern="\A[ァ-ヴー\s]+\z" title="フリガナは全角カタカナで入力してください。" placeholder="タナカ タロウ">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-md-5 col-form-label text-md-left fw-bold">
                        <div class="d-flex align-items-center">
                            <span class="me-1">メールアドレス</span>
                        </div>
                    </label>

                    <div class="col-md-7">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="tanaka.taro@example.com">
                    </div>
                </div>

                <hr class="my-4">

                <div class="form-group d-flex justify-content-center mb-4">
                    <button type="submit" class="btn text-white shadow-sm w-50 sk-btn">
                        更新
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection