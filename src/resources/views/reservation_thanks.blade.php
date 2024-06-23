@extends('layouts/app')

@section('content')
<p>ご予約ありがとうございます</p>
<form action="/" method="get">
@csrf
<input class="link" type="submit" value="戻る">
@endsection