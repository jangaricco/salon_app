@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さま   予約の変更・キャンセル</div>

                <div class="card-body">
                    <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">予約日</th>
                                    <th scope="col">時間</th>
                                    <th scope="col">メニュー</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ date('Y年n月j日',strtotime($reserve->updated_at)) }}</td>
                                    <td>{{ $start_at }}</td>
                                    <td>{{ $menu }}</td>
                                </tr>
                            </tbody>
                        </table>
                    <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 d-flex">
                        <form method="GET" action="{{ route('reservations.edit', ['id' => $reserve->reservation_id]) }}" class="mr-4">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                変更する
                            </button>
                        </form>
                        <form method="POST" action="{{ route('reservations.destroy', ['id' => $reserve->reservation_id]) }}" id="delete_{{ $reserve->reservation_id }}">
                            @csrf
                            <a href="#" class="btn btn-danger" data-id="{{ $reserve->reservation_id }}" onclick="deletePost(this);">キャンセル</a>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function deletePost(e) {
    'use strict';
    if(confirm('予約をキャンセルします。よろしいでしょうか？')) {
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>

@endsection

