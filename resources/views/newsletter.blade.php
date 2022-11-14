@extends('base.commonTemplate')

@section('title')
    <title>Newsletter</title>
@endsection

@section('body')
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
        <button type="button" class="close" data-dismiss="alert">x</button>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
        <button type="button" class="close" data-dismiss="alert">x</button>
    </div>
@endif

<form method="post" action="{{route('submitText')}}" accept-charset="UTF-8">
    
    {{csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" type="text" name="userInfo"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
