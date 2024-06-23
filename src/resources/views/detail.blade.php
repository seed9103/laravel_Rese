@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="card__content">
            <h1 class="card__name">{{ $restaurants->name }}</h1>
            <div class="card__img">
                <img src="{{ $restaurants->image }}" alt="{{ $restaurants->name }} Image">
            </div>
            <div class="tag">
                <div class="card__location">#{{ $restaurants->location }}</div>
                <div class="card__genre">#{{ $restaurants->genre }}</div>
            </div>
            <div class="card__description">{{ $restaurants->description }}</div>
        </div>
    </div>

    <div class="reservation">
        <h2>予約</h2>
        @if(Auth::check())
        <form action="/reservation" method="post">
        @csrf
        <div class="form-group">
            <input type="date" name="reservation_date" value="{{ old('reservation_date', date('Y-m-d')) }}" class="form-date">
            @error('reservation_date')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="time" name="reservation_time" value="{{ old('reservation_time', '10:00') }}" class="form-time">
            @error('reservation_time')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="number" name="num_people" value="{{ old('num_people', 1) }}" class="form-num">
            @error('num_people')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" name="restaurant_id" value="{{ $restaurants->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <button type="submit" class="reserve-button">予約する</button>
        </form>
        @else
        <p class="login-required">予約するにはログインしてください。</p>
        <a href="{{ route('login') }}" class="login-link">ログインする</a>
        @endif
    </div>
</div>

@if ($reservation && now()->isAfter(\Carbon\Carbon::parse($reservation->reservation_date)->endOfDay()))
<div class="review-form">
    <h2>レビューを投稿する</h2>
    <form action="/reservation/{{ $reservation->id }}/review" method="post">
        @csrf
        <input type="hidden" name="restaurant_id" value="{{ $reservation->restaurant_id }}">
        <div class="form-group">
            <label for="rating">評価</label>
            <select name="rating" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</div>
@endif
@endsection