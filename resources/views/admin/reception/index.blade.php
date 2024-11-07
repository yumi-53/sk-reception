@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-4 col-md-5 col-sm-7">
            <h3 class="mb-4 text-center">QRコードでログイン</h3>

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

            <div class="form-group d-flex justify-content-center mb-4">
                <a href="{{ route('admin.reception.create') }}" class="btn text-white shadow-sm w-100 sk-btn">受付に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
