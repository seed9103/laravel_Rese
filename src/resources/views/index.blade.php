@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('search-form')
<div class="search__container">
  <form action="/search" method="get" class="search__form">
    <select name="area" id="area">
      <option value="">All area</option>
      @foreach($areas as $area)
      <option value="{{ $area }}">{{ $area }}</option>
      @endforeach
    </select>

    <div class="divider"></div>

    <select name="genre" id="genre">
      <option value="">All genre</option>
      @foreach($genres as $genre)
      <option value="{{ $genre }}">{{ $genre }}</option>
      @endforeach
    </select>

    <div class="divider"></div>

    <span class="search__icon">
        <i class="fas fa-search"></i> 
      </span>
    <input type="text" name="keyword" placeholder=Search...>
  </form>
</div>
@endsection

@section('content')
<div class="flex__item">
    @foreach ($restaurants as $restaurant)
    <div class="restaurant__card">
      <div class="card__img">
        <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}の画像">
      </div>
      <div class="card__content">
        <h1 class="card__name">{{ $restaurant->name }}</h1>
        <div class="tag">
          <div class="card__location">#{{ $restaurant->location }}</div>
          <div class="card__genre">#{{ $restaurant->genre }}</div>
        </div>
        <div class="card__button">
          <div class="detail__button">
            <div class="detail__link-wrapper">
              <a class="detail__link" href="/detail/{{ $restaurant->id }}">詳しくみる</a>
            </div>
            @if(Auth::check())
              <form action="/favorite/toggle" method="post">
              @csrf
                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                <button class="favorite-button" type="submit">
                  @if(Auth::user()->favorites && Auth::user()->favorites->contains('restaurant_id', $restaurant->id))
                  <i class="fas fa-heart" style="color: red;"></i>
                  @else
                  <i class="far fa-heart"></i>
                  @endif
                </button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
