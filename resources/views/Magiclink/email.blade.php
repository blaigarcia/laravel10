@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Get Magic Link for passwordless login</div>

                <div class="card-body">

                    <form class="pt-3" action="{{ route('login.send.magiclink') }}" method="post">
                        @csrf



                        <div class="row  mb-3">
                            <div class="row mb-0">
                                <div class="row col-md-8 offset-md-2">
                                <label for="email" class="col-md-8 ">Enter your registered email</label>
                            </div>
                            </div>



                            <div class="row mb-0">
                            <div class="row justify-content-center col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="row justify-content-center col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Send
                                </button>
                            </div>
                        </div>


                    </form>

                    @if (isset($_GET['send']))
                        <div class="alert alert-success">
                            @if ($_GET['send'] == 'success')
                                Magiclink was sent!
                            @endif
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
</div>






@endsection
