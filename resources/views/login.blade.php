@extends('base.commonTemplate')

@section('title')
    <title>Login</title>
@endsection

@section('body')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Log in</div>
                            <div class="card-body">
                                <form method="post" action="{{route('loginPOST')}}" accept-charset="UTF-8">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Логин</label>
                                        <div class="col-md-6">
                                            <input type="text" id="username" class="form-control" name="username" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Log in
                                        </button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection