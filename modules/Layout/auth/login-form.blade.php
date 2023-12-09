<form class="form bravo-form-login themeForm" method="POST" action="{{ route('login') }}">
    <input type="hidden" name="redirect" value="{{ request()->query('redirect') }}">
    @csrf

    <div class="form-group">
        <label class="formlabel fontsize13 robotoregular graytext font-weight-bold">Email
            <span class=" required">*</span>
        </label>
        <input type="email" class="form-control" name="email" autocomplete="off"
            placeholder="{{ __('Email address') }}">
        <i class="input-icon field-icon icofont-mail"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>

    <div class="form-group password">
        <label class="formlabel fontsize13 robotoregular graytext font-weight-bold">Password
            <span class=" required">*</span></label>
        <input type="password" class="form-control" name="password" autocomplete="off"
            placeholder="{{ __('Password') }}">
        <i class="input-icon field-icon icofont-ui-password"></i>
        <a href="javascript:;" class="togglePassField"><i class="input-icon icofont-eye"></i></a>
        <span class="invalid-feedback error error-password"></span>
    </div>

    <div class="error message-error invalid-feedback"></div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary form-submit">
            {{ __('Login') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>

    <div class="fulwidthm forget-signup">
        <div class=" loginrow   robotoregular fontsize12 graytext mgnB15">
            <a href="{{ route('password.request') }}" class="greentext frgtpaswrdclick font-weight-bold"
                onclick="forgotpassword()">{{ __('Forgot Password?') }}</a>
        </div>
        <div class=" loginrow graytext mgnB15 icon-center">
            <i class="greentext ">|</i>
        </div>
        <div class="loginrow   robotoregular fontsize12 graytext mgnB15">
            <a href="javascript:;" class="greentext signupclickmain font-weight-bold">{{ __('Sign Up') }}</a>
        </div>
    </div>


    @if (setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="socialAuthStages">
            <div class="loginrow orPlx fulwidthm left josfinsanregular fontsize16 graytext mgnB15 text-center">
                <span>or</span>
            </div>
            <div class="fontsize12 graytext text-center mb-3">Login Through</div>
            <div id="wrapper" style="text-align: center;">
                <div style="display: inline-block; vertical-align: top;">
                    <a href="{{ route('social.login', 'facebook') }}">
                        <div class="text left pr-3">
                            <img src="/images/facebook.png">
                            <p class="robotoregular fontsize11 graytext text-uppercase mt-2">Facebook
                            </p>
                        </div>
                    </a>
                </div>
                <div style="display: inline-block; vertical-align: top;">
                    <a href="{{ route('social.login', 'google') }}">
                        <div class="text-center left">
                            <img src="/images/google.png">
                            <p class="robotoregular fontsize11 graytext text-uppercase mt-2">Google+</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif
</form>
