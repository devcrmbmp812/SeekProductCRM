@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify your mail</div>
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
                    <form method="POST" action="{{ route('mail_verify') }}">
                       {!! csrf_field() !!}
                        <div class="form-group form-group has-icon-left form-control-name">
                            <input id="code" type="text" class="form-control form-control-lg" name="code" value="{{ old('code') }}" required autofocus placeholder="Verification Code" maxlength="4">

                            @if ($errors->has('code'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                Confirm
                            </button>                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
