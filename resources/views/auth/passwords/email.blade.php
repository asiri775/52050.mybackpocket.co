@extends('layouts.common_home')
@section('content')
<div class="container container-fixed-lg">
    <div class="row justify-content-center bravo-login-form-page bravo-login-page">
        <div class="col-md-5">
            <div class="">
                <h4 class="form-title">Reset Password</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form bravo-form-register" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="formlabel fontsize13 robotoregular graytext font-weight-bold">Email Address
                                <span class=" required">*</span></label>
                                <input  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                <i class="input-icon field-icon icofont-mail"></i>
                                <span class="invalid-feedback error error-email"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-submit">
                                Send Password Reset Link
                                <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
