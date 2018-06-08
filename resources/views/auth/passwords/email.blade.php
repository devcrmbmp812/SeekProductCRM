@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                         {{ csrf_field() }}

                        <div class="form-group has-icon-left form-control-email">
                            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required placeholder="Enter your email address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        {{ __('Send Password Reset Link') }}
                            </button>                       
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
