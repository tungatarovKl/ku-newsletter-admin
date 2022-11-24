@extends('base.commonTemplate')

@section('title')
    <title>Newsletter</title>
@endsection

@include('base.navBar')

@section('body')
    <div class="p-3 mb-2 bg-light text-dark">
    <h3>Привет, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h3>
    <h2>Тут занимаются Рассылкой</h2>
    </div>
    @isset($imgUrl)
        <img src="{{ $imgUrl }}" style="max-height: 350px;"/>
    @endisset
@endsection