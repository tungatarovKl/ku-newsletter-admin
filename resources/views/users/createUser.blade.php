@extends('base.commonTemplate')
@section('title')
    <title>Create User</title>
@endsection

@include('base.navBar')

@section('body')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create user</div>
                        <div class="card-body">
                            <form method="post" action="{{route('createUserPOST')}}" accept-charset="UTF-8">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="firstName" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="firstName" class="form-control" name="firstName" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="lastName" class="form-control" name="lastName" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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