@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-4 col-md-5 col-sm-7">
            <h2 class="mb-4 text-center">受付リスト</h2>

            <hr class="mb-4">

            <!-- 日付範囲フィルター -->
            <form method="GET" action="{{ route('admin.reception.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                    <button type="submit" class="btn text-white shadow-sm sk-btn">フィルター</button>
                </div>
            </form>

            
            <div>
                <p class="mb-4">計{{ number_format((float)$total) }}件</p>
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
                        <th scope="col">会員ID</th>
                        <th scope="col">氏名</th>
                        <th scope="col">フリガナ</th>
                        <th scope="col">受付日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receptions as $reception)
                        <tr>
                            <td>{{ $reception->user->id }}</td>
                            <td>{{ $reception->user->name }}</td>
                            <td>{{ $reception->user->kana }}</td>
                            <td>{{ date('Y年n月j日 G時i分', strtotime($reception->reception_data)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $receptions->appends(request()->query())->links() }}
            </div>

            <div class="form-group d-flex justify-content-center mb-4">
                <a href="{{ route('admin.reception.create') }}" class="btn text-white shadow-sm w-100 sk-btn">受付に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
