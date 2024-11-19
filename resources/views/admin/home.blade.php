@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('/js/reception-modal.js') }}"></script>
@endpush

@section('content')

<!-- 受付取消モーダル -->
<div class="modal fade" id="cancelReceptionModal" tabindex="-1" aria-labelledby="cancelReceptionModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelReceptionModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-footer">
                <form action="" method="post" name="cancelReceptionForm">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn text-white shadow-sm sk-btn">取消</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col container">
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-10 col-lg-11">
            <h2 class="mb-4 text-center">本日の受付</h2>
            
            <table class="table table-hover mb-4">
                <thead>
                    <tr>
                        <th scope="col">会員ID</th>
                        <th scope="col">氏名</th>
                        <th scope="col">フリガナ</th>
                        <th scope="col">受付日時</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receptions as $reception)
                        <tr>
                            <td>{{ $reception->user->id }}</td>
                            <td>{{ $reception->user->name }}</td>
                            <td>{{ $reception->user->kana }}</td>
                            <td>{{ date('Y年n月j日 G時i分', strtotime($reception->reception_data)) }}</td>
                            <td>
                                <a href="#" class="link-secondary" data-bs-toggle="modal" data-bs-target="#cancelReceptionModal" data-reception-id="{{ $reception->id }}" data-reception-name="{{ $reception->user->name }}">取消</a>
                            </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $receptions->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
