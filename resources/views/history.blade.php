@extends('base.commonTemplate')

@section('title')
<title>Login</title>
@endsection

@include('base.navBar')

@section('body')
    <table class="table table-hover">

        <thead>

        <th>Логин</th>

        <th>Текст сообщения</th>

        <th>Время отправки</th>

        </thead>

        <tbody>
    @foreach ($messages as $message)
        <tr>
            <td>{{ $message->sender }}</td>
            <td>{{ $message->message_text }}</td>
            <td>{{ $message->created_at }} (UTC)</td>
        </tr>
    @endforeach
@endsection