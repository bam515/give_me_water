@extends('user.login.layout')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                         class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="post" >
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="login_id" name="login_id" class="form-control form-control-lg" />
                            <label class="form-label" for="login_id">아이디</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="password">비밀번호</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            {{--<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3"> 로그인 유지 </label>
                            </div>--}}
                            <a href="#!">비밀번호를 잊어버리셨나요?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">로그인</button>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <button type="button" class="btn btn-primary btn-lg btn-block"
                                onclick="location.href='{{ route('join.index') }}'">회원가입</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
