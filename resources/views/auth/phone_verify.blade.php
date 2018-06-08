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
                    <form id="ccform" method="POST" action="{{ route('phone_verify') }}">
                       {!! csrf_field() !!}
                        <div class="form-group form-group has-icon-left form-control-name">
                            <input type="hidden" id="prefix" name="prefix">
                            <input type="text" class="form-control-lg phone-field" id="phoneField" name="phoneField" value="{{ old('phoneField') }}" required autofocus placeholder="Phone Number">
                            @if ($errors->has('phoneField'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phoneField') }}</strong>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#cc_submit").click(function(){
            $("#prefix").val($(".cc-picker-code").html());
            $("#ccform").submit();
        });
    });
</script>
@endsection
