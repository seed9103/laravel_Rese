@extends('layouts/app')

@section('content')
<p>会員登録ありがとうございます</p>
<form action="/login" method="get">
@csrf
<input class="link" type="submit" value="ログイン">
@endsection