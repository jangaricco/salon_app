@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規予約</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="menu" class="col-md-4 col-form-label text-md-right">Menu</label>
                            <div class="col-md-6 md-4 pt-2">
                                <input type="radio" name="menu" value="0">カット + ブロー 3,800円</input><br>
                                <input type="radio" name="menu" value="1">カット + カラー 5,900円</input><br>
                                <input type="radio" name="menu" value="2">カット + パーマ 8,400円</input><br>
                                <input type="radio" name="menu" value="3">来店後相談</input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_at" class="col-md-4 col-form-label text-md-right">本日の予約時間</label>
                            <div class="col-md-6 md-4 pt-2">
                               <select name="start_at">
                                    <option value="">選択してください</option>
                                    <option value="0">10:00～</option>
                                    <option value="1">10:30～</option>
                                    <option value="2">11:00～</option>
                                    <option value="3">11:30～</option>
                                    <option value="4">12:00～</option>
                                    <option value="5">12:30～</option>
                                    <option value="6">13:00～</option>
                                    <option value="7">13:30～</option>
                                    <option value="8">14:00～</option>
                                    <option value="9">14:30～</option>
                                    <option value="10">15:00～</option>
                                    <option value="11">15:30～</option>
                                    <option value="12">16:00～</option>
                                    <option value="13">16:30～</option>
                                    <option value="14">17:00～</option>
                                    <option value="15">17:30～</option>
                                    <option value="16">18:00～</option>
                                    <option value="17">18:30～</option>
                               </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    予約する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

