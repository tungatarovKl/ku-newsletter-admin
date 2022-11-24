@extends('base.commonTemplate')
@section('title')
    <title>User</title>
@endsection

@include('base.navBar')
@section('body')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <table class="table table-hover">
        <tbody>
        <tr>
            <th>Имя</th>
            <td> {{ $user->first_name }}</td>
        </tr>
        <tr>
            <th>Фамилия</th>
            <td> {{ $user->last_name }}</td>
        </tr>
        <tr>
            <th>Логин</th>
            <td> {{ $user->username }}</td>
        </tr>
        <tr>
            <th>Сменить пароль</th>
            <td>
                <form method="post" action="/users/{{ $user->id }}/setPassword" accept-charset="UTF-8">
                    {{csrf_field()}}
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    <button type="submit" class="btn btn-primary">Задать пароль</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    <a href="/users/{{ $user->id }}/delete"><button class="btn btn-danger btn-sm">Удалить пользователя</button></a>
@endsection