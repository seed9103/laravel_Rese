@extends('layouts/app')

@section('content')
    <div class="container">
        <h1>予約情報を変更</h1>
        <form action="/reservation/{{ $reservation->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="reservation_date">予約日</label>
                <input type="date" name="reservation_date" value="{{ $reservation->reservation_date }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="reservation_time">予約時間</label>
                <input type="time" name="reservation_time" value="{{ $reservation->reservation_time }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="num_people">予約人数</label>
                <input type="number" name="num_people" value="{{ $reservation->num_people }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">予約を変更する</button>
        </form>
    </div>
@endsection