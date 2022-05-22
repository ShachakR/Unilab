<div>
    @csrf

    <div id="failed_register_alert" class="alert-danger-custom hide" role="alert">
        Username or Email taken.
    </div>

    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

        <div class="col-md-6">
            <input id="register_username" type="text" class="form-control" name="username"
                value="{{ old('username') }}" autocomplete="username" autofocus>
            <div id="invalid-username" class="invalid-input-text hide"> Invalid Username </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="register_email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                autocomplete="email">
            <div id="invalid-register-email" class="invalid-input-text hide"> Invalid Email </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6 register-password-div">
            <input id="register_password" type="password" class="form-control" name="password"
                autocomplete="new-password">
            <div id="invalid-register-password" class="invalid-input-text hide"> Invalid Password
                <a type="button" class="material-icons-outlined tooltip-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-html="true" title='                    
                    <div class="password-tooltip"> <span>Should contain:</span>
                        <span>at least one digit</span>
                        <span>at least one lower case</span>
                        <span>at least one upper case</span>
                        <span>at least 8 characters</span>
                    </div>
                    '>
                    help_outline
                </a>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm"
            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                autocomplete="new-password">
            <div id="invalid-password-confirm" class="invalid-input-text hide"> Password does not match </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4 mt-2">
            <button id="register_btn" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</div>
<script src="{{ URL::asset('/js/auth/register.js') }}"></script>
