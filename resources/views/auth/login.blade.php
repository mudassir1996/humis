@extends('layouts.app_auth')

@section('content')
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pr-md-0">
                        <div class="auth-left-wrapper">

                        </div>
                    </div>
                    <div class="col-md-8 pl-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a href="#" class="noble-ui-logo d-block mb-4">
                                {{-- HUMIS --}}
                                <img src="{{asset('assets/images/al-buraq-logo.png')}}" width="300px"/>
                            </a>
                            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                            <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        Remember me
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" value="Login"
                                        class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">

                                </div>
                                {{-- <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
