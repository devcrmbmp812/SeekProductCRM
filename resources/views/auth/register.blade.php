@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                       {!! csrf_field() !!}

                        <div class="form-group form-group has-icon-left form-control-name">
                            <input id="surname" type="text" class="form-control form-control-lg" name="surname" value="{{ old('surname') }}" required autofocus placeholder="First name">

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group form-group has-icon-left form-control-name">
                            <input id="lasname" type="text" class="form-control form-control-lg" name="lasname" value="{{ old('lasname') }}" required autofocus placeholder="Last name">

                                @if ($errors->has('lasname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lasname') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-group has-icon-left form-control-email">
                            <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required placeholder="Enter email address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-group has-icon-left form-control-password">
                            <input id="password" type="password" class="form-control form-control-lg" name="password" required placeholder="Enter password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group form-group has-icon-left form-control-password">
                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required placeholder="Confirm password">
                        </div>

                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        {{ __('Register') }}
                            </button>                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
