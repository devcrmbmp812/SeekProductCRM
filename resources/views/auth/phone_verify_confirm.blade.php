@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function(){
        var base = '{{URL::to("/phone_picker/")}}' + "/data.json";
        $("#phoneField").CcPicker({
            "countryCode":"us",
            dataUrl: base
        });
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify your phone</div>
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
                    <form id="ccform" method="POST" action="{{ route('phone_verify_confirm') }}">
                       {!! csrf_field() !!}
                        <div class="form-group form-group has-icon-left form-control-name">
                            <input id="phone_code" type="text" class="form-control form-control-lg" name="phone_code" value="{{ old('phone_code') }}" required autofocus placeholder="Verification Code" maxlength="4">
                            @if ($errors->has('phone_code'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_code') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-submit">
                            <button id="cc_submit" class="btn btn-primary btn-block btn-lg">
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
