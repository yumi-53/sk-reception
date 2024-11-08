@extends('layouts.app')
@push('scripts')
    <script src="{{ asset('/js/jsQR.js') }}"></script>
    <script src="{{ asset('/js/reception.js') }}"></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-4 col-md-5 col-sm-7">
            <h2 class="mb-4 text-center">QRコードでログイン</h2>
            <div id="wrapper" class="row justify-content-center">
                <video id="video" autoplay muted playsinline ></video>
                <canvas id="camera-canvas"></canvas>
                <canvas id="rect-canvas"></canvas>
                <div id="qr-msg" class="mb-3 text-center">QRコードが見つかりません。QRコードを読み込んでください。</div>
                <form method="post" action="{{ route('admin.reception.store') }}" name="login">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="">
                </form>


            </div>
        </div>
    </div>
</div>
@endsection
