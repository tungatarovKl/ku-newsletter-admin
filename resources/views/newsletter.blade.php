@extends('base.commonTemplate')

@section('title')
    <title>Send message</title>
@endsection

@include('base.navBar')

@section('body')
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif

<form method="post" action="{{route('sendMessage')}}" accept-charset="UTF-8">
    
    {{csrf_field()}}
    <div class="form-group">
        <label for="messageText">Текст сообщения:</label>
        <textarea class="form-control" id="messageText" rows="3" type="text" name="messageText"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
@endsection
