@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">予約の変更・キャンセル</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reservations.update', ['id' => $reserve->reservation_id]) }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="menu" class="col-md-4 col-form-label text-md-right" >Menu</label>
                            <div class="col-md-6 md-4 pt-2">
                                <input type="radio" name="menu" value="0" @if($reserve->menu === 0) checked @endif>カット + ブロー 3,800円</input><br>
                                <input type="radio" name="menu" value="1" @if($reserve->menu === 1) checked @endif>カット + カラー 5,900円</input><br>
                                <input type="radio" name="menu" value="2" @if($reserve->menu === 2) checked @endif>カット + パーマ 8,400円</input><br>
                                <input type="radio" name="menu" value="3" @if($reserve->menu === 3) checked @endif>来店後相談</input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_at" class="col-md-4 col-form-label text-md-right">本日の予約時間</label>
                            <div class="col-md-6 md-4 pt-2">
                               <select name="start_at">
                                    <option value="">選択してください</option>
                                    <option value="0" @if($reserve->start_at === 0) selected @endif>10:00～</option>
                                    <option value="1" @if($reserve->start_at === 1) selected @endif>10:30～</option>
                                    <option value="2" @if($reserve->start_at === 2) selected @endif>11:00～</option>
                                    <option value="3" @if($reserve->start_at === 3) selected @endif>11:30～</option>
                                    <option value="4" @if($reserve->start_at === 4) selected @endif>12:00～</option>
                                    <option value="5" @if($reserve->start_at === 5) selected @endif>12:30～</option>
                                    <option value="6" @if($reserve->start_at === 6) selected @endif>13:00～</option>
                                    <option value="7" @if($reserve->start_at === 7) selected @endif>13:30～</option>
                                    <option value="8" @if($reserve->start_at === 8) selected @endif>14:00～</option>
                                    <option value="9" @if($reserve->start_at === 9) selected @endif>14:30～</option>
                                    <option value="10" @if($reserve->start_at === 10) selected @endif>15:00～</option>
                                    <option value="11" @if($reserve->start_at === 11) selected @endif>15:30～</option>
                                    <option value="12" @if($reserve->start_at === 12) selected @endif>16:00～</option>
                                    <option value="13" @if($reserve->start_at === 13) selected @endif>16:30～</option>
                                    <option value="14" @if($reserve->start_at === 14) selected @endif>17:00～</option>
                                    <option value="15" @if($reserve->start_at === 15) selected @endif>17:30～</option>
                                    <option value="16" @if($reserve->start_at === 16) selected @endif>18:00～</option>
                                    <option value="17" @if($reserve->start_at === 17) selected @endif>18:30～</option>
                               </select>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新する
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

