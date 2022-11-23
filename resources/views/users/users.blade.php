@extends('base.commonTemplate')

@section('title')
<title>Login</title>
@endsection

@include('base.navBar')

@section('body')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="/users/create"><button class="btn btn-secondary">Новый пользователь</button></a>
    <table class="table table-hover">

        <thead>

        <th>Логин</th>

        <th>Имя</th>

        <th>Фамилия</th>

        </thead>

        <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
        </tr>
    @endforeach
@endsection