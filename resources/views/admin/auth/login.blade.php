@extends('admin.auth.layouts.master')
@section('css')
@stop
@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{asset("/storage/uploads/settings/login.png")}}" alt="auth-login-cover"
                    class="img-fluid my-5 auth-illustration"
                    data-app-light-img="illustrations/auth-login-illustration-light.png"
                    data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

                <img src="{{ asset('/') }}dashboard/assets/img/illustrations/bg-shape-image-light.png"
                    alt="auth-login-cover" class="platform-bg"
                    data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="javascript:void(0)" class="app-brand-link gap-2">
                        <img src="{{asset("/storage/uploads/settings/logo.png")}}" alt="logo" width="200">
                    </a>
                </div>
                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">مرحبآ بك في لوحة التحكم</h3>
                <p class="mb-4">{{ __('site.desc_login') }}</p>

                <form class="mb-3 formAjax form-horizontal needs-validation" action="{{route("login")}}" method="POST"
                    novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="input-email">البريد الإلكتروني : </label>
                        <input type="email" class="form-control @error('email') border border-danger @enderror" required
                            name="email" id="input-email" value="" placeholder="البريد الإلكتروني">

                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="mb-3 form-password-toggle">
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <label for="input-password">كلمة المرور : </label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control @error('password') border border-danger @enderror"
                                        id="input-password" required value="" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password-password" />
                                    <span id="password-password" class="input-group-text cursor-pointer"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me">{{__('site.remember')}}</label>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary d-grid w-100 submit-button">{{__('site.sing_in')}}</button>
                            <div class="btn btn-primary d-grid w-100 d-none uploadProgress"><i
                                    class="fas fa-spinner"></i></div>
                        </div>


                       
                    </div>
                </form>
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@stop