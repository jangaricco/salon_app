@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者画面です。</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <h4 class="mb-4">今月はパーマ89％オフキャンペーン中です！</h4>

                    <a href="#" class="btn btn-success">マイページへ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
