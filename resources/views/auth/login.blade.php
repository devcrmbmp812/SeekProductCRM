@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                         {{ csrf_field() }}

                        <div class="form-group has-icon-left form-control-name">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autofocus placeholder="Username or Email">

                                @if ($errors->has('email'))
                                    {{$errors->first('email')}}
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        

                        <div class="form-group has-icon-left form-control-password">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-lg" name="password" required placeholder="Please Enter Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                            </div>
                        </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        {{ __('Login') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                            </a>                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
