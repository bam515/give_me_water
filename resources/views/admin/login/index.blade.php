@extends('admin.login.layout')
@section('content')
    @php
        if (isset($_COOKIE['admin_login_id']) && isset($_COOKIE['admin_login_pass'])) {
            $loginID = $_COOKIE['admin_login_id'];
            $password = $_COOKIE['admin_login_pass'];
            $isRemember = 'checked';
        } else {
            $loginID = '';
            $password = '';
            $isRemember = '';
        }
    @endphp
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" id="login-form" method="post" action="{{ route('admin.login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   value="{{ $loginID }}"
                                                   id="login_id" name="login_id" placeholder="Enter ID">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   value="{{ $password }}"
                                                   id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input"
                                                       {{ $isRemember }} name="remember"
                                                       id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
