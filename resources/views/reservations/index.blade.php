@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="mb-4">ようこそ、{{ Auth::user()->name }}さま！</h2>
                    
                    <div class="d-flex">
                        <form method="GET" action="{{ route('reservations.create') }}" class="p-4">
                            <button type="submit" class="btn btn-success">
                                新規予約
                            </button>
                        </form>
                        <form method="GET" action="{{ route('reservations.show', ['id' => $reservations->reservation_id]) }}" class="p-4">
                            <button type="submit" class="btn btn-success">
                                予約の確認・変更
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
