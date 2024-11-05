
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7">
            <h2 class="mb-4 text-center">QRコードでログイン</h2>
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

            <div class="mb-4 text-center">
            {!! QrCode::size(200)->generate(url('admin/reception?id='.$user->id)) !!}
            </div>

            <p class="mb-3 text-center">QRコードをスタッフに提示してください。</p>


        </div>
    </div>
</div>
@endsection