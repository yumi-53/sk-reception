@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('/js/reception-date-clear.js') }}"></script>
@endpush

@section('content')

<div class="col container">
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-10 col-lg-11">
            <h2 class="mb-4 text-center">受付リスト</h2>

            <hr class="mb-4">

            <!-- 日付範囲フィルター -->
            <form id="filterForm" method="GET" action="{{ route('admin.reception.index') }}" class="mb-4">
                <div class="input-group">
                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                    <button type="submit" class="btn text-white shadow-sm sk-btn">フィルター</button>
                    <button type="button" class="btn text-white shadow-sm btn-secondary ms-1" id="clear-dates">クリア</button>
                </div>
            </form>

            
            <div>
                @if (empty(request('start_date')) || empty(request('end_date'))) 
                <p class="mb-4">本日の受付：計{{ number_format((float)$total) }}件
                @else
                <p class="mb-4">検索期間：計{{ number_format((float)$total) }}件
                @endif
                    <span class="fs-6">
                        @if ($total > 15)
                            （{{ 15 * $receptions->currentPage() - 14 }}～{{ 15 * $receptions->currentPage() }}件）
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
