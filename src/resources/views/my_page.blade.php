@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="ログアウト">
</form>
@endsection

@section('content')
<div>
  <h1>{{ Auth::user()->name }}さん</h1>
</div>

<div class="content">
    <div class="flex__container">
        <div class="reservations">
            <h2>予約情報</h2>

        @if($reservations->isEmpty())
        <p>現在、予約情報はありません。</p>
        @else
        <div class="flex__item">
            @foreach($reservations as $reservation)
                <div class="reservation-card">
                    <p>Shop: {{ $reservation->restaurant->name }}</p>
                    <p>Date: {{ $reservation->reservation_date }}</p>
                    <p>Time: {{ date('H:i', strtotime($reservation->reservation_time)) }}</p>
                    <p>Number: {{ $reservation->num_people }}人</p>
                    <form action="/reservation/{{ $reservation->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか？')">×</button>
                    </form>
                    <a href="/reservation/{{ $reservation->id }}/edit" class="edit-button">変更する</a>
                </div>
            @endforeach
        </div>
        @endif
        </div>

        <div class="favorites">
            <h2>お気に入り店舗</h2>
            @if($favorites->isEmpty())
            <p>現在、お気に入りはありません。</p>
            @else
            <div class="flex__item">
            @foreach ($favorites as $favorite)
            <div class="favorite-card">
                <img src="{{ $favorite->restaurant->image }}" alt="{{ $favorite->restaurant->name }} Image">
                <h1 class="card__name">{{ $favorite->restaurant->name }}</h1>
                    <div class="card__location">#{{ $favorite->restaurant->location }}</div>
                    <div class="card__genre">#{{ $favorite->restaurant->genre }}</div>
                <div class="card__button">
                    <div class="detail__button">
                        <div class=detail__link-wrapper>
                            <a class="detail__link" href="/detail/{{ $favorite->restaurant->id }}">詳しく見る</a>
                        </div>
                    </div>
                </div>
                <form action="/favorite/{{ $favorite->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか？')">×</button>
                </form>
            
            </div>
            @endforeach
        </div>
    </div>
    @endif
    </div>
</div>
@endsection


